<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCIBank - Strona Banku</title>
</head>
<body>

    <?php 
        include 'chklgn.php';
        if(!isset($logedin)){
            exit();
        }
    ?>

    <header>
        <h1>SCIBank</h1>
    </header>

    <main>
    <section class="options">
        <ul>
            <li onclick="changeVisiblity('przelew')">Przelew</li>
            <li onclick="changeVisiblity('pozyczka')">Pożyczka</li>
            <li onclick="changeVisiblity('h_przel')">Historia przelewów</li>
            <li onclick="changeVisiblity('h_log')">Historia logowań</li>
        </ul>
    </section>
    
    <section class="details">
       <section class="content invisible" id="przelew">
           <h3 class="title">Formularz</h3>
            <form action="wyslij.php" method="POST">
                <section class="box">
                    Konto odbiorcy: <input type="text" placeholder="Numer konta" name="konto" class="account" require>
                </section>
                <section class="box">
                    Ilość: <input type="number" step="0.01" class="amount" placeholder="Kwota" name="kwota" id="kwota" onchange="sprawdz()">
                </section>
                    Opis: <input type="text" placeholder="Opis" value="PRZELEW" name="opis" require>
                    <input type="submit" value="Wyślij">
                    <?php 
                    $saldo = $result["saldo"];
                    $saldo = $saldo/100;
                    echo "<input type='hidden' id='saldo' value='$saldo'>"; ?>
            </form>
        </section> 
        <section class="content invisible" id="pozyczka">
            <h3 class="title">Formularz</h3>
            <section class="box">
                Ilość: <input type="number" class="amount">
            </section>
            <section class="box">
                Długość spłaty(w miesiącach): <input type="number" class="amount">
            </section>
        </section>
        <section class="content invisible" id="h_przel">
            <h3 class="title">Formularz</h3>
            <section class="box">
                Ostatni przelew: <input type="number" class="amount">
            </section>
        </section>
        <section class="content invisible" id="h_log">
            <h3 class="title">Formularz</h3>
            <section class="box">
                Ostatnie logowania: <input type="number" class="amount">
            </section>
        </section>
    </section>
    </main>
    <footer>
        <h6>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo, perspiciatis dolor. Vitae qui optio minima repellendus voluptatem libero enim quis eos dicta, hic commodi provident amet maxime ullam illum perspiciatis!
        </h6>
    </footer>

    <script src="index.js"></script>
    <script type="text/javascript">
    function sprawdz(){
        if(document.getElementById("kwota").value < 0){
            document.getElementById("kwota").value = 0
        } else if (Number(document.getElementById("kwota").value) > Number(document.getElementById("saldo").value)){
            document.getElementById("kwota").value = document.getElementById("saldo").value
        }
    }
</script>
</body>
</html>