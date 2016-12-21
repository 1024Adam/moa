
function showDiv(name)
{
  var divs = ["home", "recipes", "grocery"]; 
  for (var i = 0; i < divs.length; i++) {
    if(name === divs[i])
    {
      $("#" + divs[i]).fadeIn();
      $("#list-" + divs[i]).addClass("active");
    }
    else
    { 
      $("#" + divs[i]).hide();
      $("#list-" + divs[i]).removeClass("active");
    }
  }
  $("#add_success").hide();
  $("#add_error").hide();
}

$(document).ready(function() {
  showDiv("recipes");
});

$("#menu-recipes").click(function() {
  showDiv("recipes");
});

$("#menu-grocery").click(function() {
  showDiv("grocery");
});

function addToGrocery()
{
  var divs = ["add_success", "add_error"];
   
  $("#add_success").fadeIn();
}
