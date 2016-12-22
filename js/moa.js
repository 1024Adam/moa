
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

function processButtonClick(id)
{
  window.location = "./edit_recipe.php?id=" + id;
}

$(document).ready(function() 
{
  showDiv("recipes");
});

$("#menu-recipes").click(function() 
{
  showDiv("recipes");
});

$("#menu-grocery").click(function() 
{
  showDiv("grocery");
});

$("#add_to_list_button").click(function()
{
  var divs = ["add_success", "add_error"];
  $("#add_success").fadeIn();
});

$("#ing_button").click(function()
{
  $("#ing_list").toggle(200);
});

$("#instr_button").click(function()
{
  $("#instr_list").toggle(200);
});

$("#edit_cancel").click(function()
{
  window.location.href = "./index.php";
});
