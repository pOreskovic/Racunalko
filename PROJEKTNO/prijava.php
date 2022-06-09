<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Prijava</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="jquery-1.11.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="PWA/XML/validacija.js"></script>
    <script src="validacija.js"></script>
</head>

<body>

<?php 
$error1  = false;
$error2  = false;   
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $email2=$_POST['email'];
    $lozinka=$_POST['password'];

    $dbc = mysqli_connect('localhost','root','','racunalko') or
        die('Error connecting to MySQL server.'.mysqli_connect_error());
    $query = "SELECT email, lozinka, kategorija FROM profil WHERE email='".$email."'";

    $result = mysqli_query($dbc, $query) or 
    die('Error querying database.');

    $row = mysqli_fetch_assoc($result);
    $check_email = $row['email'];
    $check_password = password_verify($lozinka, $row['lozinka']);
    $check_kategorija = $row['kategorija'];

    if ($email = $check_email){
        if ($lozinka = $check_password){
            if ($check_kategorija == 'učenik'){
                session_start();
                $_SESSION['email'] = $email2;
                header('Location:index_ucenik.php');
            } elseif ($check_kategorija == 'profesor'){
                session_start();
                $_SESSION['email'] = $email2;
                header('Location:index_profesor.php');
            } elseif ($check_kategorija == 'roditelj'){
                session_start();
                $_SESSION['email'] = $email2;
                header('Location:index_roditelj.php');
            }
        } else {
            $error2 = true;
        }
    } else {
        $error1 = true;
    }
    
    mysqli_close($dbc);
}
    ?>
    <form action="" method="post"name="prijava">

        <h1>Prijava</h1>

        <input type="email" name="email" id="email"  placeholder="Email"/>
        
        <?php if($error1 == true){  
            echo "Email ne postoji.";
            $error1 == false;
        }?>

        <input type="password" name="password" id="password" placeholder="Lozinka"/>
        
        <?php if($error2 == true){
            echo "Unijeli ste pogrešnu lozinku.";
            $error2 == false;
        }?>

        <button type="submit" name="login">Prijava</button>

        <p>Nemate račun? <a href="registracija.php">Registracija</a></p>
        

    </form>

    

</body>

</html> 