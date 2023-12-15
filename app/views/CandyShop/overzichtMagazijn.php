<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/instructeurs.css">
    <title>overzicht magazijn</title>
</head>
<body>
    <h1>Overzicht Magazijn Jamin</h1>
   <?php

   $magazijnData = $data['magazijnData'];
   $magazijnTable = '';

   foreach ($magazijnData as $magazijnItem) {
    $VerpakkingsEenheid = floor($magazijnItem->VerpakkingsEenheid * 2) / 2;
    $magazijnTable .= "<tr>
                        <td>$magazijnItem->Barcode</td>
                        <td>$magazijnItem->Naam</td>
                        <td>$VerpakkingsEenheid</td>
                        <td>$magazijnItem->AantalAanwezig</td>
                        <td>
                            <a href='" . URLROOT . "/CandyShop/overzichtAllergenen/$magazijnItem->Id'>
                                <img src='/public/img/allergy.png'>
                            </a>
                        </td>
                        
                        <td>
                            <a href='" . URLROOT . "/CandyShop/leveringsInformatie/$magazijnItem->Id'>
                                <img src='/public/img/questionMark.svg'>
                            </a>
                        </td>
 
                        </tr>";
   }
   ?>
 <div class="tableDiv">
   <table>
    <thead>
        <tr>
            <th>Barcode</th>
            <th>Naam</th>
            <th>VerpakkingsEenheid</th>
            <th>AantalAanwezig</th>
            <th>Allergeen Info</th>
            <th>Leverings Info</th>
        </tr>
    </thead>

    <tbody>
        <?= $magazijnTable ?>
    </tbody>
   </table>
</div>
</body>
</html>



