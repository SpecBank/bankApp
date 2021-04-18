<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przetwarzanie...</title>
</head>
<body>
<?php 

    if(isset($_POST['kwota']) && isset($_POST['konto'])){
        $kwota = $_POST['kwota'];
        $konto = $_POST['konto'];
    } else {
        echo "Nie masz dostępu do tej strony!";
        exit();
    }

    include 'chklgn.php';
    if(!isset($logedin)){
        exit();
    }

    if($kwota == 0 || $kwota > 999999999){
        echo "Nie możesz wysłać 0zł!";
        back();
        exit();
    }

    $konto = mysqli_real_escape_string($conn, $konto);
    $usr2 = mysqli_query($conn, "SELECT * FROM users, saldo WHERE users.nr_banku='$konto' AND saldo.user_ID=users.ID");
    $usr2 = mysqli_fetch_assoc($usr2);
    if($usr2 == ""){
        echo "Nieprawidłowy numer konta";
        back();
        exit();
    } else if ($result['nr_banku'] == $usr2['nr_banku']){
        echo "Nie możesz wysłać pieniędzy samemu sobie";
        back();
        exit();
    }

    if($result['saldo'] >= $kwota){
        $saldo1 = $result['saldo'] - $kwota;
        $saldo2 = $usr2['saldo'] + $kwota;
        $id1 = $result['ID'];
        $id2 = $usr2['ID'];
        $sql1 = "UPDATE saldo SET saldo='$saldo1' WHERE user_ID='$id1'";
        $sql2 = "UPDATE saldo SET saldo='$saldo2' WHERE user_ID='$id2'";
        mysqli_query($conn, $sql1);
        mysqli_query($conn, $sql2);
        echo "Przelew wykonano pomyślnie!";
        back();
    }

?>
</body>
</html>