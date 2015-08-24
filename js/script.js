$( document ).ready(function() {
  $(".submit").click(getJSONData);

});

function getJSONData(e) {
  $("#result").css("display", "none");
  addSpinner();
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
  $("#result").css("display", "inline");
  spinner.stop();
  $("#collapse").collapse('show');
  $("#area").text(output["areaTotal"]);
  $("#population").text(output["populationTotal"]);
  $("#density").text(output["populationDensity"]);
  console.log(output);
}

function addSpinner() {
  var opts = {
    lines: 13,
    length: 28,
    width: 14,
    radius: 42,
    scale: 1, 
    corners: 1, 
    color: '#000', 
    opacity: 0.35, 
    rotate: 0, 
    direction: 1, 
    speed: 1, 
    trail: 60, 
    fps: 20, 
    zIndex: 2e9, 
    className: 'spinner', 
    top: '50%', 
    left: '50%', 
    shadow: false, 
    hwaccel: false, 
    position: 'absolute' 
  }
  var target = document.getElementById('spinner')
  spinner = new Spinner(opts).spin(target);
}