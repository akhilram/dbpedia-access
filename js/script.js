$( document ).ready(function() {
  $(".submit").click(getJSONData);

});

function getJSONData(e) {

  var url = "dbpedia-lookup.php";
  var data = {};
  data["city"] = $("#city option:selected").val();

  $.ajax({    
    url: url,
    data: data,
    dataType : "json",
    type: 'GET',
    success: function(output) {
      processData(output);
    },
  });

  return false;
}

function processData(output) {
  console.log(output);
}