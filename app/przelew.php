<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wykonaj przelew</title>
</head>
<body>

<?php 
    include 'chklgn.php';
    if(!isset($logedin)){
        exit();
    }
?>
Twój stan konta: <?php echo $result["saldo"]; ?>zł
<form action="wyslij.php" method="POST">
    <?php 
    $saldo = $result["saldo"];
    echo "<input type='hidden' id='saldo' value='$saldo'>"; ?>
    <input type="text" placeholder="Numer konta" name="konto">
    <input type="number" step="0.01" max="999999999" placeholder="Kwota" name="kwota" id="kwota" onchange="sprawdz()">
    <input type="submit" value="Wyślij">
</form>

<script type="text/javascript">
    function sprawdz(){
        if(document.getElementById("kwota").value < 0){
            document.getElementById("kwota").value = 0
        } else if (Number(document.getElementById("kwota").value) > Number(document.getElementById("saldo").value)){
            document.getElementById("kwota").value = document.getElementById("saldo").value
        }
    }
</script>

</body>
</html>