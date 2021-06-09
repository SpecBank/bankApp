<?php
    include "db_config.php";
    mysqli_query($conn, "SET NAMES 'utf8'");
    if(isset($_POST["token"])){
        $token = $_POST["token"];
        $token = mysqli_real_escape_string($conn, $token);
        $sql = "SELECT * FROM apitoken WHERE token='$token'";
        $result = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($result);
        if ($result != ""){
            $id = $result["user_ID"];
            $sql = "SELECT * FROM users, saldo WHERE users.ID='$id' AND saldo.user_ID='$id'";
            $result = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($result);
            $logedin = true;
        } else{
            $logedin = false;
        }
    } else {
        $logedin = false;
    }
?>