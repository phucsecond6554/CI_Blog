<?php
  function get_now(){
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    return date('Y-m-d H:i:s');
  } // Lay ngay thang hien tai

  function get_date_string($string){
    return date('d',strtotime($string));
  } // Lay ngay tu mot chuoi

  function get_month_string($string){
    return date('m',strtotime($string));
  }

  function get_year_string($string){
    return date('Y',strtotime($string));
  }

  function change_date_format($date, $format = 'd-m-Y'){
    return date($format, strtotime($date));
  } // Chuyen doi format ngay thang
 ?>
