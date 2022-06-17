<?php

namespace App\Services\Libs;

use App\Services\Interfaces\IPagination;

class Pagination implements IPagination
{
     private $rows, $page, $limit;

    /**
     * create instance of class
     * @return Pagination
     */
    public static function getInstance(): Pagination
    {
        return new Pagination();
    }

    /**
     * @param $rows
     * @param int $page
     * @param int $limit
     * @return $this
     */
    public function setParams($rows, $page = 1, $limit = 10): Pagination
    {
        $this->rows  = $rows;
        $this->page  = $page;
        $this->limit = $limit;
        return $this;
    }

    /**
     * create table with paginated results
     * @return string
     */
    public function rows():string
    {
        $totalPages = $this->totalPages();
        $this->page = max($this->page, 1);
        $this->page = min($this->page, $totalPages);
        $offset     = ($this->page - 1) * $this->limit;

        if ($offset < 0) $offset = 0;

       $rows  =  array_slice($this->rows, $offset, $this->limit);
       $table = '';
       $table.= '<table class="table">';
       $table.= '<tbody>';

       foreach ($rows as $index => $row)
       {
           $iterator  = $this->page() > 1 ? ($this->page() * $this->limit + $index + 1) - $this->limit : $index + 1  ;
           $table.= '<tr>';
           $table.= '<td>'.$iterator.'</td>';
           $table.= '<td>'.$row.'</td>';
           $table.= '</tr>';
       }

       $table.= '</tbody>';
       $table.= '</table>';
       $table.= '<br>';
       $table.= '<div class="d-flex justify-content-center">';
       $table.= $this->pages();
       $table.= '</div>';
       return $table;
    }

    /**
     * echo current page number
     * @return integer
     */
    public function totalPages():int
    {
        $total      = count($this->rows);
        return ceil($total / $this->limit);
    }

    /**
     * echo current page number
     * @return integer
     */
    public function page() :int
    {
        return $this->page;
    }

    /**
     * print pagination  pages
     * @return string
     */
    public function pages(): string
    {
        $link = ''.baseUrl.'%d';
        $pagerContainer = '<div class="pagerContainer">';
        if( $this->totalPages() !== 0 ) {
            if( $this->page() === 1 ) {
                $pagerContainer .= '';
            }
            else {
                $pagerContainer .= sprintf( '<a class="paginationLink" data-route="'.$link.'" > |< </a>', 1 );
                $pagerContainer .= sprintf( '<a class="paginationLink" data-route="'.$link.'" > &#171; </a>', $this->page() - 1 );
            }
            if( $this->page() === $this->totalPages() ) {
                $pagerContainer .= '';
            }
            else {
                $pagerContainer .= sprintf( '<a  class="paginationLink" data-route="'.$link.'" > &#187; </a>', $this->page() + 1 );
                $pagerContainer .= sprintf( '<a class="paginationLink" data-route="'.$link.'" > >| </a>', count($this->rows) );
            }
        }
        $pagerContainer .= '</div>';
        return $pagerContainer;
    }
}