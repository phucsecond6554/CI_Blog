(function(){

  function checkdate(day, month, year){
    var date = new Date(year + "-" + month + "-" + day);

    if(date.getDate() == day && (date.getMonth() + 1) == month && date.getFullYear() == year){
      return true;
    }else {
      return false;
    }
  };
  $(document).ready(function(){
    $("#signup-form").submit(function(){
      var day = $("#b_day").val();
      var month = $("#b_month").val();
      var year = $("#b_year").val();

      if(!checkdate(day, month, year)){
        $("#b_error").html("Ngay thang khong hop le");
        return false;
      }else {
        return true;
      }
    });
  });
})();
