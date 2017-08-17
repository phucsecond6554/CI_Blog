function ajax_search(search_key){
  $.ajax({
    url: 'http://localhost/CI_Blog/Search/search_suggest',
    type: 'get',
    dataType: 'json',
    data:{
      'search_key' : search_key
    },
    success: function(result){
      var html = "";
      $.each(result,function(key,item){
        html += "<a href='#'>"+item['title'] + "</a>";
      });

      $("#search-suggest").css('display','block');
      $("#search-suggest").html(html);

      console.log(html);
    }
  });
}

function search_suggest(){
  var search_key = $("#search-form").val();
  //console.log(search_key);

  if(search_key != ""){
    ajax_search(search_key);
  }else{
    $("#search-suggest").css('display','none');
  }
}
