<?php 
    require "db.php";
    $id = $_GET["id"];
    $sqlPostava = "SELECT * FROM postavy_warcraft WHERE id=$id";
    $postava = $conn->query($sqlPostava);
    $postava = $postava->fetch_assoc();

    if(isset($_POST["pridat"])){
        $jmeno = $_POST["jmeno"];
        $titul = $_POST["titul"];
        $rasa = $_POST["rasa"];
        $povolani = $_POST["povolani"];
        $frakce = $_POST["frakce"];
        $stav = $_POST["stav"];
        $oblast = $_POST["oblast"];
         
        $sql = "UPDATE postavy_warcraft SET jmeno='$jmeno', titul='$titul', rasa='$rasa', povolani='$povolani', frakce='$frakce', stav='$stav', domovska_oblast='$oblast' WHERE id='$id'";

        $sqlUpravit = $conn->query($sql);

        if ($sqlUpravit === TRUE){
            header("Location: index.php?upraveno=2");
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upravit postavu</title>
    <?php include "bs.php";?>
</head>
<body>
    <div class="container my-4">
        <form action="upravit.php?id=<?= $id; ?>" method="POST">
            <input type="hidden" value="<?= $id; ?>" name="id">
            <div class="mb-3">
                <label for="jmeno" class="form-label">Jméno postavy:</label>
                <input type="text" id="jmeno" name="jmeno" class="form-control" value="<?= $postava["jmeno"]; ?>">
            </div>

            <div class="mb-3">
                <label for="titul" class="form-label">Titul:</label>
                <input type="text" id="titul" name="titul" class="form-control" value="<?= $postava["titul"]; ?>">
            </div>

            <div class="mb-3">
                <label for="rasa" class="form-label">Rasa:</label>
                <input type="text" id="rasa" name="rasa" class="form-control" value="<?= $postava["rasa"]; ?>">
            </div>

            <div class="mb-3">
                <label for="povolani" class="form-label">Povolání:</label>
                <input type="text" id="povolani" name="povolani" class="form-control" value="<?= $postava["povolani"]; ?>">
            </div>

            <div>
                <label for="frakce">Frakce</label>
                <select name="frakce" id="frakce" class="form-select">
                    <option value="Aliance" <?php if ($postava["frakce"] == "Aliance") {echo "selected";} ?>>Aliance</option>
                    <option value="Horda" <?php if ($postava["frakce"] == "Horda") {echo "selected";} ?>>Horda</option>
                    <option value="Neutralni" <?php if ($postava["frakce"] == "Neutralni") {echo "selected";} ?>>Neutrální</option>
                </select>
            </div>

            <div>
                <label for="stav">Stav</label>
                <select name="stav" id="stav" class="form-select">
                    <option value="Zivy" <?php if ($postava["stav"] == "Zivy") {echo "selected";} ?>>Živý</option>
                    <option value="Mrtvy" <?php if ($postava["stav"] == "Mrtvy") {echo "selected";} ?>>Mrtvý</option>
                    <option value="Nemrtvy" <?php if ($postava["stav"] == "Nemrtvy") {echo "selected";} ?>>Nemrtvý</option>
                    <option value="Neznamy"<?php if ($postava["stav"] == "Neznamy") {echo "selected";} ?>>Neznámý</option>
                </select>
            </div>

            <div>
                <label for="oblast" class="form-label">Domovská oblast</label>
                <input type="text" class="form-control" id="oblast" name="oblast" value="<?= $postava["domovska_oblast"];?>">
            </div>

            <input type="submit" name="pridat" class="btn btn-primary mt-3" value="Upravit postavu">
            
        </form>
    </div>
</body>
</html>
