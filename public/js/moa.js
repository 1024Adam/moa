
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
  $("#new_success").hide();
  $("#new_error").hide();
  $("#update_success").hide();
  $("#update_error").hide();
  $("#delete_success").hide();
  $("#delete_error").hide();
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

$("#add_ing").click(function()
{
  $("#new_ing").toggle(200);
  $("#add_ing").hide();
});

$("#add_instr").click(function()
{
  $("#new_instr").toggle(200);
  $("#add_instr").hide();
});

$("#new_recipe_button").click(function()
{
  window.location.href = "./new_recipe.php";
});

$("#del_recipe_button").click(function()
{
  window.location.href = "./del_recipe.php";
});

$("#search").keyup(function() {
  var keyword = $("#search").val().toLowerCase(); 
  var keywords = keyword.split(" ");

  var i = 1;
  while($("#n" + i).length)
  {
    var name = $("#n" + i).val().toLowerCase();
    var type = $("#t" + i).val().toLowerCase();
    var desc = $("#d" + i).val().toLowerCase();
    var contained = 1;

    for (var key of keywords)
    {
      if(!(name.includes(key) || type.includes(key) || desc.includes(key)))
      {
        contained = 0;
      }
    }

    if(contained)
    {
      $("#row" + i).show();
    }
    else
    {
      $("#row" + i).hide();
    }

    i++;
  }
});
