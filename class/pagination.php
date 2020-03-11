<?php

class Pagination{
    public $per_page;
    public $current_page;
    public $total_records;

    /**
     * Pagination constructor.
     * @param $per_page
     * @param $current_page
     * @param $total_records
     */
    public function __construct ( $per_page = 10 , $current_page = 1 , $total_records = 0 )
    {
        $this->per_page = (int)$per_page;
        $this->current_page = (int)$current_page;
        $this->total_records = (int)$total_records;
    }

    public function offset(){
        return $this->per_page * ( $this->current_page -1);

    }

    public function total_pages(){
        return ceil($this->total_records / $this->per_page);
    }

    public function next_page(){
        $next = $this->current_page + 1;
        return ($next <= $this->total_pages() ) ? $next : false;
    }

    public function previous_page(){
        $prev = $this->current_page - 1;
        return ($prev > 0 ) ? $prev : false;
    }

    public function previous_link($url="") {
        $link = "";
        if($this->previous_page() != false) {
            $link .= "<a href=\"{$url}?page={$this->previous_page()}#anchor\" >";
            $link .= "&laquo;</a>";
        }
        return $link;
    }

    public function next_link($url="") {
        $link = "";
        if($this->next_page() != false) {
            $link .= "<a href=\"{$url}?page={$this->next_page()}#anchor\">";
            $link .= "&raquo;</a>";
        }
        return $link;
    }

    public function number_links($url="") {
        $output = "";
        for($i=1; $i <= $this->total_pages(); $i++) {
            if($i == $this->current_page) {
                $output .= "<span>{$i}</span>";
            }
//            else if ($i == $this->total_pages()) {
//                $output .= "<span class=\"more-page\">...</span>";
//                $output .= "<a href='index.php?page={$this->total_pages()}'>{$this->total_pages()} </a>";
//            }
            else {
                $output .= "<a href=\"{$url}?page={$i}#anchor\">{$i}</a>";
            }
        }

        return $output;
    }

    public function page_links($url) {
        $output = "";
        if($this->total_pages() > 1) {
            $output .= "<div class=\"col-12 mt-5 text-center\">";
            $output .= "<div class=\"custom-pagination\">";
            $output .= $this->previous_link($url);
            $output .= $this->number_links($url);
            $output .= $this->next_link($url);
            $output .= "</div>";
            $output .= "</div>";
        }
        return $output;
    }


}