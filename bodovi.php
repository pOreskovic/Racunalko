<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Racunalko</title>
    <link rel="stylesheet" href="RAC.css">
</head>
<body>
    <div class="okvir">
        <div class="header">Racunalko</div>
        <div class="Zadatak">
            <h4>Marko Bicko LEVEL: 7 Razred: 3.C</h4>
            <h1>Zadatak 1</h1>
            <h2> 64 : 8 = ?</h2>
                <form method="post" class="odgovori">
                    <input type="submit" id="odg1" name="odg1" value="8">
                    <input type="button" id="odg2" name="odg2" value="12">
                    <input type="button" id="odg3" name="odg3" value="18">
                    <input type="button" id="odg4" name="odg4" value="4">
                </form>
                <?php 
        $bodoviIspit = 0;

        if(isset($_POST["odg1"])){
            $bodoviIspit = $bodoviIspit + 1;
            echo "<br>TOCAN ODGOVOR!";
            echo "<br> +1 BOD!";
        }
    ?>
        </div>
        
    </div>
    
</body>
</html>