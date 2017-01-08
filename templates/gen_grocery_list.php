<?php
  include('../classes/fpdf181/fpdf.php');
  include('../classes/Database.php');

  $pdf = new FPDF('P', 'pt', 'A4');
  $pdf->SetMargins(75, 75, 75);
  $pdf->SetTitle('GroceryList');
  $pdf->AddPage();

  $width = 100;
  $height = 10;
  
  $pdf->SetFont('Arial', 'B', 20);
  $pdf->Cell($width, $height, 'Grocery List');
  $pdf->Ln(4 * $height);

  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell($width, $height, 'Name');
  $pdf->Cell($width, $height, 'Description');
  $pdf->Cell($width, $height, 'Amount');
  $pdf->Cell($width, $height, 'Price / Amount');
  $pdf->Ln(3 * $height);
 
  $db = new Database(); 
  $query = 'SELECT recipes.name as recipname, ingredients.recipe_id, 
                   ingredients.name as ingname, ingredients.descr, 
                   ingredients.amount, ingredients.avg_price, SUM(grocery.quantity) as quantity
            FROM ingredients, grocery, recipes
            WHERE ingredients.recipe_id = grocery.recipe_id AND
                  recipes.id = grocery.recipe_id AND
                  recipes.id = ingredients.recipe_id AND
                  grocery.date = CURRENT_DATE
            GROUP BY ingname, recipe_id
            ORDER BY recipe_id ASC, ingredients.id ASC';
  $db->query($query);
  $result = $db->fetch();

  $pdf->SetFont('Arial', '', 11);
  
  $pdf->Cell($width, $height, 'Name');

  $pdf->Output();
?>
