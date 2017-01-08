<?php
  include('../classes/fpdf181/fpdf.php');
  include('../classes/Database.php');

  $pdf = new FPDF('P', 'pt', 'A4');
  $pdf->SetMargins(70, 70, 70);
  $pdf->SetTitle('GroceryList');
  $pdf->AddPage();

  $page_height = 792;
  $width = 115;
  $last_width = 100;
  $height = 10;
  
  $pdf->SetFont('Arial', 'B', 20);
  $pdf->Cell($width, $height, 'Grocery List');
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell((2 * $width) + $last_width, $height, 'Page ' . $pdf->PageNo(), 0, 0, 'R');
  $pdf->Ln(4 * $height);

  $pdf->SetFont('Arial', 'B', 14);
  $pdf->Cell($width, $height, 'Name');
  $pdf->Cell($width, $height, 'Description');
  $pdf->Cell($width, $height, 'Amount');
  $pdf->Cell($last_width, $height, 'Price / Amount');
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

  $old_recipid = '';
  foreach($result as $row)
  {
    if($pdf->GetY() + 75 > $page_height)
    {
      $pdf->AddPage();
      $pdf->SetFont('Arial', 'B', 20);
      $pdf->Cell($width, $height, 'Grocery List');
      $pdf->SetFont('Arial', '', 12);
      $pdf->Cell((2 * $width) + $last_width, $height, 'Page ' . $pdf->PageNo(), 0, 0, 'R');
      $pdf->Ln(4 * $height);

      $pdf->SetFont('Arial', 'B', 14);
      $pdf->Cell($width, $height, 'Name');
      $pdf->Cell($width, $height, 'Description');
      $pdf->Cell($width, $height, 'Amount');
      $pdf->Cell($last_width, $height, 'Price / Amount');
      $pdf->Ln(3 * $height);
      
      $pdf->SetFont('Arial', '', 12);
      $pdf->Cell(2 * $width, $height, $recipname);
      $pdf->Cell(2 * $width, $height, $quantity . ' x');
      $pdf->Ln(2 * $height);
    }
    $recipid = $row["recipe_id"];
    $recipname = $row["recipname"];
    $name = $row["ingname"];
    $descr = $row["descr"];
    $amount = $row["amount"];
    $price = $row["avg_price"];
    $format_price = number_format($price, 2, '.', ' ');
    $quantity = $row["quantity"];
    if(strcmp($old_recipid, $recipid) != 0)
    {
      if(strcmp($old_recipid, '') != 0)
      {
        $pdf->Ln(2 * $height);
      }
      $old_recipid = $recipid;

      $pdf->SetFont('Arial', '', 12);
      $pdf->Cell(2 * $width, $height, $recipname);
      $pdf->Cell(2 * $width, $height, $quantity . ' x');
      $pdf->Ln(2 * $height);
    }
    $x = $pdf->GetX();
    $y = $pdf->GetY();

    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell($width, $height, '    ' . $name);
    $pdf->SetFont('Arial', '', 11);

    $pdf->MultiCell($width, $height, $descr);
    $descr_height = $pdf->GetY() - $y;
    $pdf->SetXY($x + (2 * $width), $y);

    $pdf->Cell($width, $height, '    ' . $amount);
    $pdf->Cell($last_width, $height, $format_price, 0, 0, 'R');
    $pdf->Ln($descr_height + $height);
  }

  $pdf->Output();
?>
