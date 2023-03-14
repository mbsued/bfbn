<?php

namespace OliverBauer\Bfbn\Domain\Finishers;

use OliverBauer\Bfbn\Domain\Model\HtmlTemplate;
use OliverBauer\Bfbn\Domain\Model\PdfTemplate;
use OliverBauer\Bfbn\Domain\Repository\HtmlTemplateRepository;
use OliverBauer\Bfbn\Domain\Repository\PdfTemplateRepository;
use OliverBauer\Bfbn\Service\PdfService;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Form\Domain\Model\FormDefinition;
use TYPO3\CMS\Form\Domain\Model\FormElements\FormElementInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class PdfFinisher extends \TYPO3\CMS\Form\Domain\Finishers\AbstractFinisher
{
    /**
     * htmlTemplateRepository
     *
     * @var HtmlTemplateRepository
     */
    private $htmlTemplateRepository = null;

    /**
     * pdfTemplateRepository
     *
     * @var PdfTemplateRepository
     */
    private $pdfTemplateRepository = null;

    /**
     * Pdf Service
     *
     * @var \OliverBauer\Bfbn\Service\PdfService
     */
    private $pdfService;

    /**
     * @param \OliverBauer\Bfbn\Domain\Repository\HtmlTemplateRepository $htmlTemplateRepository
     */
    public function injectHtmlTemplateRepository(HtmlTemplateRepository $htmlTemplateRepository)
    {
        $this->htmlTemplateRepository = $htmlTemplateRepository;
    }

    /**
     * @param \OliverBauer\Bfbn\Domain\Repository\PdfTemplateRepository $pdfTemplateRepository
     */
    public function injectPdfTemplateRepository(PdfTemplateRepository $pdfTemplateRepository)
    {
        $this->pdfTemplateRepository = $pdfTemplateRepository;
    }

    /**
     * @param PdfService $pdfService
     */
    public function injectPdfService(PdfService $pdfService)
    {
        $this->pdfService = $pdfService;
    }

    protected function executeInternal()
    {
        $pdfTemplateUid = (int)$this->parseOption('pdfTemplate');
				
        /** @var PdfTemplate $pdfTemplate */
        $pdfTemplate = $this->pdfTemplateRepository->findByUid($pdfTemplateUid);		
		/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($pdfTemplate->getFile()->getOriginalResource()->getPublicUrl()); */
        if ($pdfTemplate && $pdfTemplate->getUid() && \nn\t3::File()->exists($pdfTemplate->getFile()->getOriginalResource()->getPublicUrl())) {						
            $pdfTemplateFile = $pdfTemplate->getFile()->getOriginalResource()->getPublicUrl();
            $pdfFileName = $pdfTemplate->getFile()->getOriginalResource()->getName();
        } else {
            $pdfTemplateFile = null;
            $pdfFileName = null;
        }

        $htmlTemplateUid = (int)$this->parseOption('htmlTemplate');
        /** @var HtmlTemplate $pdfTemplate */
        $htmlTemplate = $this->htmlTemplateRepository->findByUid($htmlTemplateUid);
		/** print \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($htmlTemplate);	*/	
        $htmlTemplateFile =
            $htmlTemplate && $htmlTemplate->getUid() && \nn\t3::File()->exists($htmlTemplate->getFile()->getOriginalResource()->getPublicUrl())
                ? $htmlTemplate->getFile()->getOriginalResource()->getPublicUrl()
                : null;

        $mpdf = $this->pdfService->generate($pdfTemplateFile, $htmlTemplateFile, $this->parseForm());

        $this->finisherContext->getFinisherVariableProvider()->add(
            $this->shortFinisherIdentifier,
            'mpdf',
            $mpdf
        );

        $this->finisherContext->getFinisherVariableProvider()->add(
            $this->shortFinisherIdentifier,
            'filename',
            $pdfFileName
        );

        $this->finisherContext->getFinisherVariableProvider()->add(
            $this->shortFinisherIdentifier,
            'isPdfAttachedToReceiver',
            (bool)$this->parseOption('isPdfAttachedToReceiver')
        );

        $this->finisherContext->getFinisherVariableProvider()->add(
            $this->shortFinisherIdentifier,
            'isPdfAttachedToUser',
            (bool)$this->parseOption('isPdfAttachedToUser')
        );

        $this->finisherContext->getFinisherVariableProvider()->add(
            $this->shortFinisherIdentifier,
            'openPdfNewWindows',
            (bool)$this->parseOption('openPdfNewWindows')
        );
    }

    private function parseForm(): array
    {
        $formValues = [];
        $formDefinition = $this->finisherContext->getFormRuntime()->getFormDefinition();
        if ($formDefinition instanceof FormDefinition) {
            foreach ($this->finisherContext->getFormValues() as $fieldName => $fieldValue) {
                $fieldElement = $formDefinition->getElementByIdentifier($fieldName);
                if ($fieldElement instanceof FormElementInterface && $fieldElement->getType() !== 'Honeypot') {
                    if ($fieldValue instanceof FileReference) {
                        $formValues[$fieldName] = $fieldValue->getOriginalResource()->getCombinedIdentifier();
                    } else {
                        $formValues[$fieldName] = $fieldValue;
                    }
                }
            }
        }

        return $formValues;
    }
}
