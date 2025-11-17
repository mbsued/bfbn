<?php

namespace MbFosbos\Bfbn\Service;

use Mpdf\MpdfException;
use \Mpdf\Mpdf;
use setasign\Fpdi\PdfParser\CrossReference\CrossReferenceException;
use setasign\Fpdi\PdfParser\PdfParserException;
use setasign\Fpdi\PdfParser\Type\PdfTypeException;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Fluid\View\StandaloneView;
use TYPO3\CMS\Core\View\ViewFactoryData;
use TYPO3\CMS\Core\View\ViewFactoryInterface;

class PdfService
{
    const PDF_NAME = 'form.pdf';
    const PDF_TEMP_PREFIX = 'form-tempfile-';
    const PDF_TEMP_SUFFIX = '-generated';

    public function __construct(
        private readonly ViewFactoryInterface $viewFactory,
    ) {}

    /**
     * @param $pdfFile
     * @param $htmlFile
     * @param array $values
     * @return Mpdf
     * @throws MpdfException
     * @throws CrossReferenceException
     * @throws PdfParserException
     * @throws PdfTypeException
     */
    public function generate(
        $pdfFile,
        $htmlFile,
        $values = []
    )
	
    {
		
        if (!$pdfFile) {
            return null;
        }

        if (!$htmlFile) {
            return null;
        }

        $mpdf = new Mpdf(['fontDir' => ExtensionManagementUtility::extPath('bfbn') . 'Resources/Public/Fonts', 'tempDir' => Environment::getVarPath()]);
		 
		$mpdf->SetDocTemplate($pdfFile,true);	
		$pagecount = $mpdf->SetSourceFile($pdfFile);
        for ($i=1; $i<=$pagecount; $i++) {
          if ($i == 1) {
            $htmlParsed = $this->parse($htmlFile, $values);
            $mpdf->WriteHTML($htmlParsed);
          }
          $import_page = $mpdf->importPage($i);
          $mpdf->useTemplate($import_page);
          if ($i < $pagecount) $mpdf->AddPage();
        }
        return $mpdf;
    }
	

    /**
     * @param $htmlFile
     * @param $values
     * @return mixed
     */
    private function parse($htmlFile, $values)
    {

        $viewFactoryData = new ViewFactoryData(
            templatePathAndFilename: $htmlFile,
        );
        $view = $this->viewFactory->create($viewFactoryData);
		$view->assignMultiple($values);
        return $view->render();			
    }
}
