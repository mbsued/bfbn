<?php
namespace MbFosbos\Bfbn\Ajax;

use Mpdf\Output\Destination;
use Mpdf\Mpdf;
use Mpdf\MpdfException;
use setasign\Fpdi\PdfParser\CrossReference\CrossReferenceException;
use setasign\Fpdi\PdfParser\PdfParserException;
use setasign\Fpdi\PdfParser\Type\PdfTypeException;
use MbFosbos\Bfbn\Service\PdfService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Http\Response;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * PdfResponse
 */
class PdfResponse
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     * @throws MpdfException
     * @throws CrossReferenceException
     * @throws PdfParserException
     * @throws PdfTypeException
     */
    public function processRequest(ServerRequestInterface $request)
    {
        $response = GeneralUtility::makeInstance(Response::class);
		$param = $request->getQueryParams();
        $mpdf = null;
        if (isset($param['file']) && $param['file']) {
            $mpdf = $this->pdf($param['file']);
        }
         if ($mpdf) {
            $filename = $this->filename = $request->getParsedBody()['filename'] ?? $request->getQueryParams()['filename'] ?? null;
            $mpdf->Output($filename, Destination::INLINE);
        } else {
            $response->getBody()->write('<h1>Fehler</h1><p>Die Datei wurde vom Server gelöscht, bevor sie geöffnet wurde<br />Sie kann nicht erneut geladen oder gespeichert werden ohne vorher nochmals das Formular abzusenden.</p>');
            return $response->withStatus(404);
        }

        return $response;
    }

    /**
     * @param $uploadedTempFileName
     * @return Mpdf|null
     * @throws CrossReferenceException
     * @throws PdfParserException
     * @throws PdfTypeException
     */
    private function pdf($uploadedTempFileName)
    {
        $uploadedTempFile = Environment::getVarPath() . '/transient/' . $uploadedTempFileName;
        $uploadedTempFile = GeneralUtility::fixWindowsFilePath($uploadedTempFile);
        if (
            GeneralUtility::validPathStr($uploadedTempFile)
            && @is_file($uploadedTempFile)
        ) {
            $mpdf = new Mpdf(['fontDir' => ExtensionManagementUtility::extPath('bfbn') . 'Resources/Public/Fonts', 'tempDir' => Environment::getVarPath()]);
			
            $mpdf->SetDocTemplate($uploadedTempFile);
			$pagecount = $mpdf->SetSourceFile($uploadedTempFile);
			
			for ($i = 1; $i <= $pagecount; $i++) {
				$import_page = $mpdf->ImportPage($i);
				$mpdf->useTemplate($import_page);
				if ($i < $pagecount) {
					$mpdf->AddPage();
				}
			}	

            // Delete tmp file
            @unlink($uploadedTempFile);
            return $mpdf;
        }

        return null;
    }
}
