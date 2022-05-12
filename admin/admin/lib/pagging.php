<?php

function get_pagging($num_page, $page, $base_url = "") {
    $str_pagging = "<ul id='list-paging' class='fl-right'>";
    if($page > 1){
        $str_prev = $page - 1;
        $str_pagging .= "<li><a href = \"{$base_url}&page={$str_prev}\">Trước</a></li>";
    }
    for($i = 1; $i <= $num_page; $i++){
        $active = "";
        if($i == $page){
            $active = "class = 'active'";
        }
        $str_pagging .= "<li $active><a href = \"{$base_url}&page={$i}\">{$i}</a></li>";
    }
    if($page < $num_page){
        $str_next = $page + 1;
        $str_pagging .= "<li><a href = \"{$base_url}&page={$str_next}\">Sau</a></li>";
    }
    $str_pagging .= "</ul>";
    return $str_pagging;
}
function get_pagging_search_product($num_page, $page, $base_url = "",$keyword="") {
    $str_pagging = "<ul id='list-paging' class='fl-right'>";
    if($page > 1){
        $str_prev = $page - 1;
        $str_pagging .= "<li><a href = \"{$base_url}&page={$str_prev}&id={$keyword}\">Trước</a></li>";
    }
    for($i = 1; $i <= $num_page; $i++){
        $active = "";
        if($i == $page){
            $active = "class = 'active'";
        }
        $str_pagging .= "<li $active><a href = \"{$base_url}&page={$i}&id={$keyword}\">{$i}</a></li>";
    }
    if($page < $num_page){
        $str_next = $page + 1;
        $str_pagging .= "<li><a href = \"{$base_url}&page={$str_next}&id={$keyword}\">Sau</a></li>";
    }
    $str_pagging .= "</ul>";
    return $str_pagging;
}

?>
