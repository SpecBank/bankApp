<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historia przelewów</title>
</head>
<body>
    
    <?php 
        include 'chklgn.php';
        if(!isset($logedin)){
            exit();
        }
    ?>

    <h1>Historia przelewów:</h1>

    <div class="transactionsBox"> 
    <?php
        if(isset($_POST['rows'])){
            $rows = $_POST['rows'];
        } else {
            $rows = 10;
        }
        $sql = "SELECT * FROM transactions WHERE user_ID='$id' ORDER BY ID DESC LIMIT $rows";
        $result = mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($result)){
            $nmb = $row['ID'];
            $data = $row['data'];
            $typ = $row['typ_transakcji'];
            $opis = $row['opis'];
            $kwota = $row['kwota'];
            $cel = $row['cel_ID'];

            //Czekam na to jak ma wyglądać tabelka z przelewami
        }
    ?>
    </div>
    <div>
        Jak dużo transakcji wyświetlić?
        <form action="transactions.php" method="POST">
            <input type="number" value="10" name="rows">
            <input type="submit">
        </form>
    <div>

</body>
</html>