<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historia logowań</title>
</head>
<body>
    
    <?php 
        include 'chklgn.php';
        if(!isset($logedin)){
            exit();
        }
    ?>

    <!-- Tutaj ma być tabelka w której będą linijki z danymi ostatniego logowania w takiej formie: ID | DATA | ADRES IP (Będzie ich max 10) -->
    <h1>Twoje ostatnie 10 logowań:</h1>

    <!-- Ten styl do usunięcią, jest tu tylko na chwilę abym mógł sprawdzić czy działa -->
    <style>
        .loginsRow div{
            float: left;
            margin-right: 10px;
        }

        .loginsRow{
            clear: left;
        }
    </style>
    <div class="loginsBox"> 
    <?php
        $sql = "SELECT ID, data, adres_ip FROM loginlog WHERE user_ID='$id' ORDER BY ID DESC LIMIT 10";
        $result = mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($result)){
            $nmb = $row['ID'];
            $data = $row['data'];
            $ip = $row['adres_ip'];

            echo ("<div class='loginsRow'>
                        <div class='ID'>$nmb</div>
                        <div class='data'>$data </div>
                        <div class='adres_ip'>$ip</div>
                </div>");
        }
    ?>
    </div>

</body>
</html>