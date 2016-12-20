var divs = ["home", "meals", "grocery"]; 

function showDiv(name)
{
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
}

$(document).ready(function() {
  showDiv("home");
});

$("#menu-home").click(function() {
  showDiv("home");
});

$("#menu-meals").click(function() {
  showDiv("meals");
});

$("#menu-grocery").click(function() {
  showDiv("grocery");
});
