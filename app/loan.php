<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przetwarzanie...</title>
</head>

<body>

    <?php
    include 'chklgn.php';
    if (!isset($logedin)) {
        exit();
    }

    if (isset($_POST['loanAm']) && isset($_POST['loanIn'])) {
    } else {
        back();
        exit();
    }
    ?>

</body>

</html>