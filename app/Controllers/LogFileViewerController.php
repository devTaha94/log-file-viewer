<?php

namespace App\Controllers;

use App\Middleware\RedirectIfNotAuthMiddleware;
use App\Services\Libs\Pagination;
use App\Services\Libs\ReadLogFile;

class LogFileViewerController
{
    /**
     * LogFileViewerController constructor.
     */
    public function __construct()
    {
        RedirectIfNotAuthMiddleware::handle();
    }

    /**
     * display view and results of log file
     * @param int $page
     * @throws \JsonException
     */
    public function index($page = 1): void
    {
        if($this->isAjax()) {
            $path = $_REQUEST['filePath'];
            $arrayOfLogFileLines = ReadLogFile::readLogFileLines($path);
            $paginationData  = Pagination::getInstance()->setParams($arrayOfLogFileLines,$page['page'])->rows();
            echo json_encode($paginationData, JSON_THROW_ON_ERROR);
            exit;
        }
        require_once APP_ROOT . '/views/index.php';
    }

    /**
     * check if http call is ajax or not
     * @return bool
     */
    private function isAjax(): bool
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }
}

