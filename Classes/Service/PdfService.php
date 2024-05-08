<?php

namespace MbFosbos\Bfbn\Service;

use \Mpdf\Mpdf;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;

class PdfService
{
    const PDF_NAME = 'form.pdf';
    const PDF_TEMP_PREFIX = 'form-tempfile-';
    const PDF_TEMP_SUFFIX = '-generated';


    /**
     * @param $pdfFile
     * @param $htmlFile
     * @param array $values
     * @return Mpdf
     * @throws \Mpdf\MpdfException
     * @throws \setasign\Fpdi\PdfParser\CrossReference\CrossReferenceException
     * @throws \setasign\Fpdi\PdfParser\PdfParserException
     * @throws \setasign\Fpdi\PdfParser\Type\PdfTypeException
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

        $mpdf = new \Mpdf\Mpdf(['fontDir' => ExtensionManagementUtility::extPath('bfbn') . 'Resources/Public/Fonts',]);
		 
		$template = \nn\t3::File()->absPath(ltrim($pdfFile,'/'));
		$mpdf->SetDocTemplate($template,true);	
		$htmlParsed = $this->parse($htmlFile, $values);
		$mpdf->WriteHTML($htmlParsed);
        return $mpdf;
    }

    /**
     * @param $htmlFile
     * @param $values
     * @return mixed
     */
    private function parse($htmlFile, $values)
    {
 		
		return \nn\t3::Template()->render(ltrim($htmlFile, '/'), $values); 
		
    }
}
