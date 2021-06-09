<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przypomnij hasło</title>
</head>
<body>
    <?php 
        if(isset($_POST['email'])){
            echo "
            <h1>Jeśli konto istnieje, kod został wysłany na adres email</h1>
            <form action='forget.php' method='POST'>
                Hasło: <input type='password' name='haslo'><br>
                Powtórz hasło <input type='password' name='repeat'><br>
                Kod: <input type='text' name='kod'><br>
                <input type='submit' value='Wyślij'>
            </form>
            ";
        } else if(isset($_POST['haslo']) && isset($_POST['repeat']) && isset($_POST['kod'])){

        } else {
            echo "
                <form action='forget.php' method='POST'>
                Adres email: <input type='email' name='email'><br>
                <input type='submit' value='Wyślij'>
                </form>
            ";
        }
    ?>
</body>
</html>