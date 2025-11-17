<?php

declare(strict_types=1);

namespace MbFosbos\Bfbn\Event\Listener;

use TYPO3\CMS\Core\Attribute\AsEventListener;
use TYPO3\CMS\Core\Resource\Event\BeforeFileProcessingEvent;
use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Core\Resource\FileInterface;
use TYPO3\CMS\Core\Resource\FileReference;
use TYPO3\CMS\Core\Resource\ProcessedFile;

/**
 * Forces WebP output for supported image types during file processing,
 * unless a specific output format is already configured.
 *
 * Note: For the best performance, the fileExtension should be set explicitly
 * wherever image processing is triggered. This listener ensures fallback
 * behavior and may cause additional processing on first use or cache rebuild.
 */
#[AsEventListener(
    identifier: 'bfbn/before-file-processing',
)]
final readonly class BeforeFileProcessingEventListener
{
    /**
     * MIME types suitable for WebP conversion.
     *
     * Keys are used for fast lookup via isset().
     *
     * @var array<string, bool>
     */
    private const array SUPPORTED_MIME_TYPES = [
        'image/jpeg' => true,
        'image/png' => true,
        'image/gif' => true,
        'image/bmp' => true,
        'image/tiff' => true,
    ];

    /**
     * Applies WebP conversion if no fileExtension is configured.
     */
    public function __invoke(BeforeFileProcessingEvent $event): void
    {
        $configuration = $event->getConfiguration();

        if (!empty($configuration['fileExtension'])) {
            return;
        }

        $fileInterface = $event->getFile();
        if (!$this->isWebpConvertible($fileInterface)) {
            return;
        }

        $file = $this->resolveFile($fileInterface);
        $configuration['fileExtension'] = 'webp';

        $newProcessedFile = new ProcessedFile(
            $file,
            $event->getTaskType(),
            $configuration
        );
        $event->setProcessedFile($newProcessedFile);
    }

    /**
     * Checks if the file MIME type allows WebP conversion.
     */
    private function isWebpConvertible(FileInterface $file): bool
    {
        return isset(self::SUPPORTED_MIME_TYPES[$file->getMimeType()]);
    }

    /**
     * Returns the original file from a reference or the file itself.
     * Ensures the return type is always a File.
     */
    private function resolveFile(FileInterface $file): File
    {
        if ($file instanceof FileReference) {
            return $file->getOriginalFile();
        }

        assert($file instanceof File);
        return $file;
    }
}