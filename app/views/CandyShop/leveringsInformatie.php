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
    <?php foreach ($data["leveringsData"] as $levering) : $aantalAanwezig = $levering->aantalAanwezig; ?>
        <?php foreach ($data['contactInfo'] as $contactInfo) ?> <?php endforeach ?>
    <?php if ($aantalAanwezig > 0) : ?>
        <ul>
            <li>Leverancier: <?= $contactInfo->Naam ?></li>
            <li>Contactpersoon: <?= $contactInfo->ContactPersoon ?></li>
            <li>Leveranciernummer: <?= $contactInfo->LeverancierNummer ?></li>
            <li>Mobiel: <?= $contactInfo->Mobiel ?></li>
        </ul>
    <?php endif ?>

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
            <?php foreach ($data["leveringsData"] as $levering) :
                $aantalAanwezig = $levering->aantalAanwezig;
            ?>
                <?php if ($aantalAanwezig > 0) : ?>
                    <tbody>
                        <tr>
                            <td> <?= $levering->Naam ?> </td>
                            <td> <?= $levering->DatumLevering ?> </td>
                            <td> <?= $levering->Aantal ?> </td>
                            <td> <?= $levering->DatumEerstVolgendeLevering ?> </td>
                        </tr>
                    <?php else : ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Er is van dit product op dit moment geen vooraad aanwezig, de verwachte eerstvolgende levering is: <?= $levering->DatumEerstVolgendeLevering ?></td>
                        </tr>
                    </tbody>
                <?php endif ?>
            <?php endforeach ?>
        </table>
    </div>

</body>

</html>