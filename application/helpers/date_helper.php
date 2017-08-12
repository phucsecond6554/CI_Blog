<?php
  function get_now(){
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    return date('Y-m-d H:i:s');
  } // Lay ngay thang hien tai

  function change_date_format($date, $format = 'd-m-Y'){
    return date($format, strtotime($date));
  } // Chuyen doi format ngay thang 
 ?>
