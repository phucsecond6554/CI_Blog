var base_url = "http://localhost/CI_Blog/";
var template = "<a></a>";

function ajax_search(search_key){
  $.ajax({
    url: base_url + "Search/search_suggest",
    type: 'get',
    dataType: 'json',
    data:{
      'search_key' : search_key
    },
    success: function(result){
      $.each(result,function(key,item){
        var test = $(template);

        test.html(item['title']);
        test.attr("href", base_url + "Post/" + item['url']);

        $("#search-suggest").append(test);
      });

      $("#search-suggest").css("display", "block");
      console.log("Success");
    }
  });
}

function search_suggest(){
  var search_key = $("#search-form").val();
  //console.log(search_key);

  if(search_key != ""){
    $("#search-suggest").html("");
    ajax_search(search_key);
  }else{
    $("#search-suggest").css('display','none');
  }
};


$(document).ready(function(){
  $(window).click(function(e){
    if(e.target != $("#search-suggest")){
      $("#search-suggest").css('display','none');
    }
  });
})
