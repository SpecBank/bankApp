<?php
    if(isset($_POST["type"])){
        $type = $_POST["type"];

        // ############## LOGOWANIE ###################
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
            isset($_POST["password"]) &&
            isset($_POST["hardware"]) &&
            isset($_POST["name"]))
            {
                include 'db_config.php';

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $haslo = $_POST["password"];
                $login = $_POST["login"];
                $hardware = $_POST["hardware"];
                $name = $_POST["name"];
                $logindb = mysqli_real_escape_string($conn, $login);
                $hardware = mysqli_real_escape_string($conn, $hardware);
                $name = mysqli_real_escape_string($conn, $name);
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
                    $sql = "INSERT INTO apitoken (user_ID, token, hardware, name)
                    VALUES ($user_id, '$token', '$hardware', '$name')";
                    mysqli_query($conn, $sql);
                    $out = array("success"=>"true", "token"=>$token);
                    echo json_encode($out);
                } else {
                    $out = array("success"=>"false", "error"=>"Nieprawidłowe hasło");
                    echo json_encode($out);
                }
            } else {
                $out = array("success"=>"false", "error"=>"Niezupełne dane.");
                echo json_encode($out);
            }
        } else {
            include 'chklgn.php';
            if($logedin==false){
                $out = array("success"=>"false", "error"=>"Sesja wygasła.");
                exit();
            }

            // ############## POBIERANIE DANYCH ###################
            if($type=="getData"){
                $out = array("success"=>"true");
                $out = array_merge($result, $out);
                echo json_encode($out);

            // ############## PRZELEW ###################
            } else if ($type=="transfer") {
                if(isset($_POST['kwota']) && isset($_POST['konto']) && isset($_POST['opis'])){
                    $kwota = $_POST['kwota'];
                    $konto = $_POST['konto'];
                    $opis = $_POST['opis'];
                } else {
                    $out = array("success"=>"false", "error"=>"Nie masz dostępu do tej strony");
                    echo json_encode($out);
                    exit();
                }
            
                if($kwota == 0 || $kwota > 999999999){
                    $out = array("success"=>"false", "error"=>"Wartość musi być dodatnia.");
                    echo json_encode($out);
                    exit();
                }
            
                $konto = mysqli_real_escape_string($conn, $konto);
                $opis = mysqli_real_escape_string($conn, $opis);
                $usr2 = mysqli_query($conn, "SELECT * FROM users, saldo WHERE users.nr_banku='$konto' AND saldo.user_ID=users.ID");
                $usr2 = mysqli_fetch_assoc($usr2);
                if($usr2 == ""){
                    $out = array("success"=>"false", "error"=>"Konto odbiorcy nie istnieje.");
                    echo json_encode($out);
                    exit();
                } else if ($result['nr_banku'] == $usr2['nr_banku']){
                    $out = array("success"=>"false", "error"=>"Nie możesz wysłać pieniędzy samemu sobie");
                    echo json_encode($out);
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
                    $sql3 = "INSERT INTO transactions (user_ID, typ_transakcji, opis, data, kwota, cel_ID) 
                    VALUES ($id1, 'Przelew wychodzący', '$opis', '$czas', $kwota, $id2)";
                    $sql4 = "INSERT INTO transactions (user_ID, typ_transakcji, opis, data, kwota, cel_ID) 
                    VALUES ($id2, 'Przelew przychodzący', '$opis', '$czas', $kwota, $id1)";
                    mysqli_query($conn, $sql1);
                    mysqli_query($conn, $sql2);
                    mysqli_query($conn, $sql3);
                    mysqli_query($conn, $sql4);
                    $out = array("success"=>"true", "info"=>"Przelew zakończony powodzeniem.");
                    echo json_encode($out);
                    exit();
                }
            // ############# HISTORIA PRZELEWÓW ################
            } else if ($type=="historia") {
                if(isset($_POST['rows'])){
                    $rows = $_POST['rows'];
                } else {
                    $rows = 10;
                }
                $id = $result['user_ID'];
                $sql = "SELECT * FROM transactions WHERE user_ID='$id' ORDER BY ID DESC LIMIT $rows";
                $result = mysqli_query($conn, $sql);
                $resuly = mysqli_fetch_assoc($result);
                $out = array("success"=>"true");
                $out = array_merge($out, $result);
                echo json_encode($out);
            }
        }
    } else {
        $out = array("success"=>"false", "error"=>"Nie masz dostępu do tej strony.");
        echo json_encode($out);
    }
?>