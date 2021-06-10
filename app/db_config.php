<?php

    $servername = "ssh.kubaczak.com"; // Adres serwera - powinno zostać 'localhost'
    $username = "specbank"; // Nazwa użytkownika
    $password = "%{kwK@vwsM.CRvE*EkA,H{HaxPu&T7k*"; // Hasło
    $dbName = "specbank"; // Nazwa bazy danych
    
    $conn = mysqli_connect($servername, $username, $password, $dbName);

?>
