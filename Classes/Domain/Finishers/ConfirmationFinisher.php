<?php

declare(strict_types=1);

namespace MbFosbos\Bfbn\Domain\Finishers;

use Mpdf\Output\Destination;
use Mpdf\Mpdf;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\PathUtility;
use TYPO3\CMS\Core\View\ViewFactoryData;
use TYPO3\CMS\Core\View\ViewFactoryInterface;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface as ExtbaseConfigurationManagerInterface;
use TYPO3\CMS\Fluid\View\FluidViewAdapter;
use TYPO3\CMS\Form\Domain\Finishers\Exception\FinisherException;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use MbFosbos\Bfbn\Service\PdfService;

/**
 * @inheritDoc
 */
 
class ConfirmationFinisher extends \TYPO3\CMS\Form\Domain\Finishers\ConfirmationFinisher
{
    /**
     * @inheritDoc
     */
	 
    public function __construct(
        private readonly ExtbaseConfigurationManagerInterface $extbaseConfigurationManager,
        private readonly ViewFactoryInterface $viewFactory,
    ) {}
	
    protected function executeInternal(): string
    {
		$options = $this->options;
        if (!isset($options['templateName']) || !is_string($options['templateName'])) {
            throw new FinisherException(
                'The option "templateName" must be set for the ConfirmationFinisher.',
                1521573955
            );
        }	
		
        $contentElementUid = $this->parseOption('contentElementUid');
        $typoscriptObjectPath = $this->parseOption('typoscriptObjectPath');
        $typoscriptObjectPath = is_string($typoscriptObjectPath) ? $typoscriptObjectPath : '';
        if (!empty($contentElementUid)) {
            $pathSegments = GeneralUtility::trimExplode('.', $typoscriptObjectPath);
            $lastSegment = array_pop($pathSegments);
            $setup = $this->extbaseConfigurationManager->getConfiguration(ExtbaseConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);
            foreach ($pathSegments as $segment) {
                if (!array_key_exists($segment . '.', $setup)) {
                    throw new FinisherException(
                        sprintf('TypoScript object path "%s" does not exist', $typoscriptObjectPath),
                        1489238980
                    );
                }
                $setup = $setup[$segment . '.'];
            }
			$contentObjectRenderer = GeneralUtility::makeInstance(ContentObjectRenderer::class);
            $contentObjectRenderer->setRequest($this->finisherContext->getRequest()->withoutAttribute('extbase'));
            $contentObjectRenderer->start([$contentElementUid]);
            $contentObjectRenderer->setCurrentVal((string)$contentElementUid);
            $message = $contentObjectRenderer->cObjGetSingle($setup[$lastSegment], $setup[$lastSegment . '.'], $lastSegment);
        } else {
            $message = $this->parseOption('message');
        }

        //Extended
        $tempPdfFile = '';
        if ($this->finisherContext->getFinisherVariableProvider()->offsetExists('Pdf')) {
            $openPdfNewWindows = $this->finisherContext->getFinisherVariableProvider()->get(
                'Pdf',
                'openPdfNewWindows',
                false
            );

            if ($openPdfNewWindows) {
                /** @var Mpdf $mpdf */
                $mpdf = $this->finisherContext->getFinisherVariableProvider()->get(
                    'Pdf',
                    'mpdf',
                    null
                );

                if ($mpdf) {
                    $tempPdfFile = GeneralUtility::tempnam(PdfService::PDF_TEMP_PREFIX, PdfService::PDF_TEMP_SUFFIX);
					$mpdf->Output($tempPdfFile, Destination::FILE); 
                }
            }
			$filename = $this->finisherContext->getFinisherVariableProvider()->get(
                'Pdf',
                'filename',
                PdfService::PDF_NAME
            );
        }

		$filename = isset($filename) ? $filename : '';
        $langId = isset($langId) ? $langId: '';
		
		$context = GeneralUtility::makeInstance(Context::class);
        $langId = $context->getPropertyFromAspect('language', 'id');

        $formRuntime = $this->finisherContext->getFormRuntime();
        $viewFactoryData = new ViewFactoryData(
            templateRootPaths: is_array($options['templateRootPaths'] ?? false) ? $options['templateRootPaths'] : [],
            partialRootPaths: is_array($options['partialRootPaths'] ?? false) ? $options['partialRootPaths'] : [],
            layoutRootPaths: is_array($options['layoutRootPaths'] ?? false) ? $options['layoutRootPaths'] : [],
            request: $this->finisherContext->getRequest(),
        );
        $view = $this->viewFactory->create($viewFactoryData);
        if ($view instanceof FluidViewAdapter) {
            $view->getRenderingContext()->getViewHelperVariableContainer()
                ->addOrUpdate(RenderRenderableViewHelper::class, 'formRuntime', $formRuntime);
        }
        if (isset($this->options['variables']) && is_array($this->options['variables'])) {
            $view->assignMultiple($this->options['variables']);
        }
        $view->assignMultiple([
            'form' => $formRuntime,
            'finisherVariableProvider' => $this->finisherContext->getFinisherVariableProvider(),
            'message' => $message,
			'tempPdfFile' => $tempPdfFile ? PathUtility::basename($tempPdfFile) : '',
            'isPreparedMessage' => !empty($contentElementUid),
			'langId' => $langId,
			'filename' => $filename
        ]);
        return $view->render($options['templateName']);
        
    }
}
