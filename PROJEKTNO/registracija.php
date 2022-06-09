<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="jquery-1.11.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="PWA/Projektno/validacija2.js"></script>
    <script src="validacija2.js"></script>
</head>

<body>
<?php 
    if(isset($_POST['register'])){
        $ime=$_POST['ime'];
        $prezime=$_POST['prezime'];
        $email=$_POST['email'];
        $lozinka=$_POST['password1'];
        $lozinka2=$_POST['password2'];
        $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
        $kategorija = 1;

/*  $dbc = mysqli_connect('localhost','root','','skola') or
            die('Error connecting to MySQL server.'.mysqli_connect_error());
                
        $query1 = mysqli_query($dbc, "SELECT email, spol, status FROM `korisnik` WHERE email='".$email."'");

        $row = mysqli_fetch_assoc($result);
        $check_email = $row['email'];
        $check_spol = $row['spol'];
        $check_status = $row['status'];
        if ($email = $check_email){
            if ($check_spol == 'M'){
                if ($check_status == 'učenik'){
                    $kategorija = 'učenik';
                } elseif ($check_status == 'profesor'){
                    $kategorija = 'profesor';
                } 
            } elseif ($check_spol == 'Ž'){
                    $kategorija = 'učenik';
                if ($check_status == 'učenica'){
                    $kategorija = 'učenica';
                } elseif ($check_status == 'profesorica'){
                    $kategorija = 'profesorica';
                }
            }
        } else {
                $kategorija = 'roditelj';
        }
        mysqli_close($dbc);
*/
 
        $dbc = mysqli_connect('localhost','root','','racunalko') or
            die('Error connecting to MySQL server.'.mysqli_connect_error());
                
        $query1 = mysqli_query($dbc, "SELECT * FROM `profil` WHERE email='".$email."'");

        if (!$query1)
        {
            die('Error: ' . mysqli_error($dbc));
        }
    
        if (mysqli_num_rows($query1) > 0){
    
            echo "Email se već koristi";
    
        } else {
            $query = "INSERT INTO profil VALUES('', '$ime', '$prezime', '$email', '$hashed_password', '$kategorija' )";

            $result = mysqli_query($dbc, $query) or     
            die('Error querying database.');
        }

        mysqli_close($dbc);
    }
    ?>

    <form action=" " method="post"name="registracija">

        <h1>Registracija</h1>

        <input type="text" name="ime" id="ime" placeholder="Ime"/>

        <input type="text" name="prezime" id="prezime" placeholder="Prezime"/>

        <input type="email" name="email" id="email" placeholder="Email"/>

        <input type="password" name="password1" id="password1" placeholder="Lozinka"/>

        <input type="password" name="password2" id="password2" placeholder="Ponovite lozinku"/>

        <button type="submit" name="register">Registracija</button>

        <p>Već imate račun? <a href="prijava.php">Prijava</a></p>
        

    </form>

    
</body>

</html>