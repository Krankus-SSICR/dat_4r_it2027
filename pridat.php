<?php
require "db.php";

if (isset($_POST["pridat"])) {
    $jmeno = $_POST["jmeno"];
    $titul = $_POST["titul"];
    $rasa = $_POST["rasa"];
    $povolani = $_POST["povolani"];
    $frakce = $_POST["frakce"];
    $stav = $_POST["stav"];
    $oblast = $_POST["oblast"];

    $sqlPridat = "INSERT INTO postavy_warcraft(jmeno, titul, rasa, povolani, frakce, stav, domovska_oblast) VALUES('$jmeno', '$titul', '$rasa', '$povolani', '$frakce', '$stav', '$oblast')"; 

    $pridat = $conn->query($sqlPridat);

    if ($pridat === TRUE) {
        header("Location: index.php?pridano=1");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postavy Warcraft - přidat postavu</title>
    <?php include "bs.php"; ?>
</head>

<body>
    <div class="container my-5">
        <form action="pridat.php" method="POST">
            <div class="mb-3">
                <label for="jmeno" class="form-label">Jméno postavy:</label>
                <input type="text" id="jmeno" name="jmeno" class="form-control">
            </div>

            <div class="mb-3">
                <label for="titul" class="form-label">Titul:</label>
                <input type="text" id="titul" name="titul" class="form-control">
            </div>

            <div class="mb-3">
                <label for="rasa" class="form-label">Rasa:</label>
                <input type="text" id="rasa" name="rasa" class="form-control">
            </div>

            <div class="mb-3">
                <label for="povolani" class="form-label">Povolání:</label>
                <input type="text" id="povolani" name="povolani" class="form-control">
            </div>

            <div>
                <label for="frakce">Frakce</label>
                <select name="frakce" id="frakce" class="form-select">
                    <option value="Aliance">Aliance</option>
                    <option value="Horda">Horda</option>
                    <option value="Neutralni">Neutrální</option>
                </select>
            </div>

            <div>
                <label for="stav">Stav</label>
                <select name="stav" id="stav" class="form-select">
                    <option value="Zivy">Živý</option>
                    <option value="Mrtvy">Mrtvý</option>
                    <option value="Nemrtvy">Nemrtvý</option>
                    <option value="Neznamy">Neznámý</option>
                </select>
            </div>

            <div>
                <label for="oblast" class="form-label">Domovská oblast</label>
                <input type="text" class="form-control" id="oblast" name="oblast">
            </div>

            <input type="submit" name="pridat" class="btn btn-primary mt-3">
            
        </form>
    </div>
</body>

</html>