<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/instructeurs.css">
    <title>overzicht allergenen</title>
</head>

<body>
    <h1>Overzicht Allergenen</h1>

    <?php foreach ($data["productData"] as $product) : ?>
        <ul>
            <li> <?= $product->Naam ?></li>
            <li> <?= $product->Barcode ?> </li>
        </ul>
    <?php endforeach ?>

    <?php $allergeenSize = sizeof($data["allergeenData"]) ?>
    <div class="tableDiv">
        <table>
            <?php if ($allergeenSize > 0) : ?>
                <thead>
                    <tr>
                        <td>Naam</td>
                        <td>Omschrijving</td>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($data["allergeenData"] as $allergeen) : ?>
                        <tr>
                            <td> <?= $allergeen->Naam ?> </td>
                            <td> <?= $allergeen->Omschrijving ?> </td>
                        <?php endforeach ?>
                        </tr>
                </tbody>
            <?php else : ?>
                <tbody>
                    <tr>
                        <td><?= "In dit product zitten geen stoffen die een allergische reactie kunnen veroorzaken" ?></td>
                    </tr>
                </tbody>
            <?php endif ?>
            </tbody>
        </table>
    </div>
</body>
</html>