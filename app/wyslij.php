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

    if(isset($_POST['kwota']) && isset($_POST['konto']) && isset($_POST['opis'])){
        $kwota = $_POST['kwota']*100;
        $konto = $_POST['konto'];
        $opis = $_POST['opis'];
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
    $opis = mysqli_real_escape_string($conn, $opis);
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
        $czas = date("Y-m-d H:i:s");
        $saldo1 = $result['saldo'] - $kwota;
        $saldo2 = $usr2['saldo'] + $kwota;
        $id1 = $result['ID'];
        $id2 = $usr2['ID'];
        $sql1 = "UPDATE saldo SET saldo='$saldo1' WHERE user_ID='$id1'";
        $sql2 = "UPDATE saldo SET saldo='$saldo2' WHERE user_ID='$id2'";
        $sql3 = "INSERT INTO transactions (user_ID, typ_transakcji, opis, data, kwota, cel_ID) VALUES ($id1, 'Przelew wychodzący', '$opis', '$czas', $kwota, $id2)";
        $sql4 = "INSERT INTO transactions (user_ID, typ_transakcji, opis, data, kwota, cel_ID) VALUES ($id2, 'Przelew przychodzący', '$opis', '$czas', $kwota, $id1)";
        mysqli_query($conn, $sql1);
        mysqli_query($conn, $sql2);
        mysqli_query($conn, $sql3);
        mysqli_query($conn, $sql4);
        echo "Przelew wykonano pomyślnie!";
        back();
    }

?>
</body>
</html>