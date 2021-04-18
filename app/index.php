<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nBank - Strona Banku</title>
</head>
<body>

<?php 
    include 'chklgn.php';
    if(!isset($logedin)){
        exit();
    }
?>

Witaj, <?php echo $result["imie"], $result["nazwisko"]; ?>! Twoje saldo: <?php echo $result["saldo"]; ?>zł<br>

<a href="przelew.php">Wykonaj przelew</a><br>
<a href="logins.php">Historia logowań</a><br>
<a href="transactions.php">Historia przelewów</a><br>
<a href="credit.php">Weź pożyczkę</a><br>

</body>
</html>