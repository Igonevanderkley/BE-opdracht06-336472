<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/instructeurs.css">
    <title>overzicht leverancier</title>
</head>

<body>
    <h1>Overzicht leveranciers</h1>

    <div class="tableDiv">
        <table>
            <thead>
                <tr>
                    <td>Naam</td>
                    <td>Contactpersoon</td>
                    <td>Leveranciernummer</td>
                    <td>Mobiel</td>
                    <td>Aantal verschillende producten</td>
                    <td>Toon producten</td>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($data['leverancierInformatie'] as $leverancier) : ?>
                    <tr>
                        <td> <?= $leverancier->Naam ?> </td>
                        <td> <?= $leverancier->ContactPersoon ?></td>
                        <td> <?= $leverancier->LeverancierNummer ?></td>
                        <td> <?= $leverancier->Mobiel ?></td>
                        <td> <?= $leverancier->AantalVerschillendeProducten ?></td>
                        <td>
                            <a href="">
                                <img src="/public/img/box.png">
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>