
<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <!-- Sprawdzanie, czy użytkownik logował się w ciągu ostatnich 30min -->
    <?php
        include "app/db_config.php";
        if(isset($_COOKIE["token"])){
            $token = $_COOKIE["token"];
            $token = mysqli_real_escape_string($conn, $token);
            $sql = "SELECT * FROM loginlog WHERE token='$token'";
            $result = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($result);
            if ($result != ""){
                $then = new DateTime($result["data"]);
                $now = new DateTime(date("Y-m-d H:i:s"));
                $interval= $now->diff($then);
                if ($interval->y == 0 && $interval->d == 0 && $interval->m == 0 && $interval->h == 0 && $interval->i < 30){
                    include 'app/config.php';
                    header("Location: $link/app/");
                }
            }
        }
    ?>

    <form action="login.php" method="POST">
        <div class="loginBox">
            <span>Zaloguj się</span>
            <input type="text" placeholder="Login" class="login" name="login" required>
            <input type="password" placeholder="Hasło" class="pass" name="password" required>
            <button type="submit">Zaloguj</button>
        </div>
    </form>
    
</body>
</html>