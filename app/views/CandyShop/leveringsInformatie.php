<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/instructeurs.css">
    <title>leverings informatie</title>
</head>
<body>
    <h1>Leverings Informatie</h1>
    <?php 
    $leveringsData = $data['leveringsData'];

    $leveringTable = '';

    foreach ($leveringsData as $levering) {
        $leveringTable .= "<tr>
                            <td>$levering->Naam</td>
                            <td>$levering->DatumLevering</td>
                            <td>$levering->Aantal</td>
                            <td>$levering->DatumEerstVolgendeLevering</td>
                            </tr>";

        $leverancier = $levering->Levnaam;
        $contactpersoon = $levering->Contactpersoon;
        $leverancierNummer = $levering->LeverancierNummer;
        $mobiel = $levering->Mobiel;

    }
    ?>
<ul>
    <li>Leverancier: <?= $leverancier ?></li>
    <li>Contactpersoon: <?= $contactpersoon ?></li>
    <li>LeverancierNummer: <?= $leverancierNummer ?></li>
    <li>Mobiel: <?= $mobiel ?></li>
</ul>

<div class="tableDiv">
<table>
    <thead>
        <tr>
            <th>Naam Product</th>
            <th>Datum Laatse Levering</th>
            <th>Aantal</th>
            <th>EerstvolgendeLevering</th>
        </tr>
    </thead>

    <tbody>
        <?= $leveringTable ?>
    </tbody>
</table>
</div>
</body>
</html>



