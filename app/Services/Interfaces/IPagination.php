<?php

namespace App\Services\Interfaces;

use App\Services\Libs\Pagination;

interface IPagination{

    /**
     * create instance of class
     * @return Pagination
     */
    public static function getInstance():Pagination;

    /**
     * @param $rows
     * @param $page
     * @param $limit
     * @return $this
     */
    public function setParams($rows, $page, $limit) :Pagination;

    /**
     * create table with paginated results
     * @return string
     */
    public function rows() :string;

    /**
     * echo current page number
     * @return integer
     */
    public function page() :int;

    /**
     * echo current page number
     * @return integer
     */
    public function totalPages() :int;

    /**
     * print pagination  pages
     * @return string
     */
    public function pages() :string ;
}
