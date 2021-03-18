<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nBank - Strona Banku</title>
</head>
<body>
    <?php
        include "db_config.php";
        mysqli_query($conn, "SET NAMES 'utf8'");
        if(isset($_COOKIE["token"])){
            $token = $_COOKIE["token"];
            $sql = "SELECT * FROM loginlog WHERE token='$token'";
            $result = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($result);
            if ($result != ""){
                $then = new DateTime($result["data"]);
                $now = new DateTime(date("Y-m-d H:i:s"));
                $interval= $now->diff($then);
                if ($interval->y == 0 && $interval->d == 0 && $interval->m == 0 && $interval->h == 0 && $interval->i < 30){
                    $id = $result["user_ID"];
                    $sql = "SELECT * FROM users WHERE ID='$id'";
                    $result = mysqli_query($conn, $sql);
                    $result = mysqli_fetch_assoc($result);
                    echo("Witaj, " . $result["imie"] . " " . $result["nazwisko"]);
                } else{
                    echo("Sesja wygasła");
                } 
            } else{
                echo("Sesja wygasła 1");
            }
        } else {
            echo("Brak tokenu");
        }
    ?>

</body>
</html>