<?php
    if(isset($_POST["type"])){
        $type = $_POST["type"];
        if($type=="login"){

            function random_str(
                int $length = 64,
                string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
            ): string {
                if ($length < 1) {
                    throw new \RangeException("Length must be a positive integer");
                }
                $pieces = [];
                $max = mb_strlen($keyspace, '8bit') - 1;
                for ($i = 0; $i < $length; ++$i) {
                    $pieces []= $keyspace[random_int(0, $max)];
                }
                return implode('', $pieces);
            }

            if (isset($_POST["login"]) &&
            isset($_POST["password"]))
            {
                include 'db_config.php';

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $haslo = $_POST["password"];
                $login = $_POST["login"];
                $logindb = mysqli_real_escape_string($conn, $login);
                $sql = "SELECT haslo FROM users WHERE login='$logindb';";
                $result = mysqli_query($conn, $sql);
                $result = mysqli_fetch_assoc($result);
                $hash = $result["haslo"];

                if(password_verify($haslo, $hash)){
                    $sql = "SELECT ID FROM users WHERE login='$logindb';";
                    $result = mysqli_query($conn, $sql);
                    $result = mysqli_fetch_assoc($result);
                    $user_id = $result["ID"];
                    $token = random_str(64);
                    $sql = "INSERT INTO apitoken (user_ID, token)
                    VALUES ($user_id, '$token')";
                    mysqli_query($conn, $sql);
                    $out = array("success"=>"true", "token"=>$token);
                    echo json_encode($out);
                } else {
                    $out = array("success"=>"false", "error"=>"Wrong password");
                    echo json_encode($out);
                }
            } else {
                $out = array("success"=>"false", "error"=>"No login or password in POST");
                echo json_encode($out);
            }
        } else {
            include 'chklgn.php';
            if($logedin==false){
                $out = array("success"=>"false", "error"=>"Empty or wrong token. Try login again.");
                exit();
            }
            if($type=="getData"){
                $out = array("success"=>"true");
                $out = array_merge($result, $out);
                echo json_encode($out);
            }
        }
    } else {
        $out = array("success"=>"false", "error"=>"Unexpected access. Go away...");
        echo json_encode($out);
    }
?>