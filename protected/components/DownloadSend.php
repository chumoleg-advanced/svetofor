<?php

class DownloadSend
{
    /**
     * Отправка заголовков браузеру на скачивание файла
     *
     * @param $extension - расширение файла
     * @param $fileName
     */
    public static function send($extension, $fileName)
    {
        switch ($extension) {
            case 'pdf':
                $contentType = 'application/pdf';
                break;
            case 'xls':
            case 'xlsx':
                $contentType = 'application/vnd.ms-excel';
                break;
            case 'csv':
                $contentType = 'text/csv';
                break;
            case 'doc':
                $contentType = 'application/msword';
                break;
            default:
                $contentType = 'application/force-download';
                break;
        }

        header("Content-Type: {$contentType}");
        header('Content-Disposition: attachment; filename="' . $fileName . "." . strtolower($extension) . '"');
    }
}