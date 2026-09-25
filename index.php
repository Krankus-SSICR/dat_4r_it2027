<?php 
    require "db.php";
    $sql = "SELECT * FROM postavy_warcraft";

    $postavy = $conn->query($sql);

    if (isset($_GET["smazat"]) && $_GET["smazat"] == 1) {
        $idPostava = $_GET["id"];
        $sqlSmazat = "DELETE FROM postavy_warcraft WHERE id=$idPostava";
        $smazat = $conn->query($sqlSmazat);

        if ($smazat == true) {
            header("Location: index.php?smazat=2");
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postavy Warcraft - přehled</title>
    <?php include "bs.php";?>
</head>
<body>
    <div class="container my-5">
        <h2>Přehled postav</h2>

        <a href="pridat.php" class="btn btn-primary">Přidat postavu</a>

        <?php if (isset($_GET["pridano"]) && $_GET["pridano"] == 1):?>
            <div class="alert alert-primary mt-3">
                Postava byla úspěšně přidána.
            </div>
            <?php endif;?>
            <?php if (isset($_GET["smazat"]) && $_GET["smazat"] == 2):?>
            <div class="alert alert-danger mt-3">
                Postava byla úspěšně smazána.
            </div>
            <?php endif;?>
            <?php if (isset($_GET["upraveno"]) && $_GET["upraveno"] == 2):?>
            <div class="alert alert-warning mt-3">
                Postava byla úspěšně upravena.
            </div>
            <?php endif;?>
        <table class="table">
            <tr>
                <th>Jméno postavy</th>
                <th>Frakce</th>
                <th>Rasa</th>
                <th colspan="2">Akce</th>
            </tr>
            <?php foreach ($postavy as $postava):?>
                <tr>
                    <td><?= $postava["jmeno"]; ?></td>
                    <td><?= $postava["frakce"]; ?></td>
                    <td><?= $postava["rasa"]; ?></td>
                    <td><a href="index.php?smazat=1&id=<?= $postava["id"];?>" class="btn btn-danger">Smazat postavu</a></td>
                    <td><a href="upravit.php?id=<?= $postava["id"];?>" class="btn btn-warning">Upravit postavu</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>