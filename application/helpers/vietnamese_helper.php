<?php
  //Helper nay dung de chuyen tieng viet co dau thanh khong dau

  function lang_change($string){
    $data = array(
      'a' => array("/ă/", "/â/", "/á/", "/à/", "/ả/", "/ã/", "/ạ/", "/ắ/","/ằ/","/ẳ/","/ẵ/","/ặ/",
    "/ấ/", "/ầ/","/ậ/","/ẩ/","/ẫ/"),
      'e' => array("/ê/", "/é/", "/è/", "/ẻ/", "/ẽ/","/ẹ/", "/ế/","/ề/","/ể/","/ễ/","/ệ/"),
      'i' => array("/í/","/ì/","/ỉ/","/ĩ/","/ị/"),
      'o' => array("/ô/", "/ơ/", "/ò/","/ó/", "/ỏ/", "/õ/","/ọ/", "/ố/","/ồ/", "/ổ/","/ỗ/","/ộ/",
                    "/ớ/", "/ờ/","/ở/","/ỡ/","/ợ/"),
      'u' => array("/ư/", "/ú/","/ù/","/ủ/","/ũ/","/ụ/", "/ứ/","/ừ/","/ử/","/ữ/","/ự/"),
      'd' => array("/đ/"),
      'y' => array("/ý/","/ỳ/", "/ỷ/", "/ỹ/", "/ỵ/")
    );

    $string = strtolower($string);

    foreach ($data as $replace => $pattern) {
      foreach($pattern as $pattern_values){
        $string = preg_replace($pattern_values, $replace, $string);
      }
    }
    return $string;
  }
 ?>
