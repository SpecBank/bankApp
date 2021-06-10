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
    if (!isset($logedin)) {
        exit();
    }
    ?>

    <header>
        <h1>SCIBank</h1>
    </header>

    <main>
        <section class="options">
            <ul>
                <li onclick="changeVisiblity('pinfo')">Dane Konta</li>
                <li onclick="changeVisiblity('przelew')">Przelew</li>
                <li onclick="changeVisiblity('pozyczka')">Pożyczka</li>
                <li onclick="changeVisiblity('h_przel')">Historia przelewów</li>
                <li onclick="changeVisiblity('h_log')">Historia logowań</li>
            </ul>
        </section>

        <section class="details">
            <section class="content invisible" id="pinfo">
                <h3 class="title"><?php
                                    $im = $result['imie'];
                                    $nz = $result['nazwisko'];
                                    echo ("$im $nz");
                                    ?></h3>
                <section class="box">
                    Stan konta: <?php echo ($result['saldo'] / 100)  ?>zł
                </section>
                <section class="box">
                    Numer konta: <?php echo ($result['nr_banku']) ?>
                </section>
                <form action="logout.php">
                    <section class="boxButton">
                        <button>Wyloguj</button>
                    </section>
                </form>
            </section>
            <section class="content invisible" id="przelew">
                <h3 class="title">Wykonaj Przelew</h3>
                <form action="wyslij.php" method="POST">
                    <section class="box">
                        Konto odbiorcy: <input type="text" placeholder="Numer konta" class="account" name="konto" require>
                    </section>
                    <section class="box">
                        Ilość: <input type="number" step="0.01" placeholder="Kwota" name="kwota" id="kwota" class="account" onchange="sprawdz()">
                    </section>
                    <?php
                    $saldo = $result["saldo"];
                    $saldo = $saldo / 100;
                    echo "<input type='hidden' id='saldo' value='$saldo'>";
                    ?>
                    <section class="box">
                        Opis Przelewu: <input type="text" placeholder="Opis" value="PRZELEW" class="account" name="opis" require>
                    </section>
                    <section class="boxButton">
                        <button>Wyślij</button>
                    </section>
                </form>
            </section>
            <section class="content invisible" id="pozyczka">
                <form action="">
                    <h3 class="title">Weź pożyczkę</h3>
                    <section class="box">
                        Kwota: <input type="range" oninput="loanAmout()" name="loanAm" id="loanAm" class="amount" min="1" value="1" max="<?php echo ($result['saldo'] / 100) * 0.2 ?>">
                        <div id="loanAmout">1 zł</div>
                    </section>
                    <section class="box">
                        Długość: <input type="range" oninput="loanInterval()" name="loanIn" id="loanIn" min="1" value="1" class="amount" max="24">
                        <div id="loanInterval">1</div>
                    </section>
                    <section class="boxButton">
                        <button>Zatwierdź</button>
                    </section>
                </form>
            </section>
            <section class="content invisible" id="h_przel">
                <h3 class="title">Historia przelewów</h3>

                <form action="index.php" method="POST">
                    <section class="box">
                        Ile przelewów wyświetlić: <input type="number" class="amount" name="rows" value="10">
                    </section>
                    <section class="boxButton">
                        <button>Zatwierdź</button>
                    </section>
                </form>

                <?php
                if (isset($_POST['rows'])) {
                    $rows = $_POST['rows'];
                } else {
                    $rows = 10;
                }
                $sql = "SELECT * FROM transactions WHERE user_ID='$id' ORDER BY ID DESC LIMIT $rows";
                $resulthis = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($resulthis)) {
                    $nmb = $row['ID'];
                    $data = $row['data'];
                    $typ = $row['typ_transakcji'];
                    $opis = $row['opis'];
                    $kwota = $row['kwota'];
                    $kwota = $kwota / 100;
                    $cel = $row['cel_ID'];

                    $sql = "SELECT imie, nazwisko FROM users WHERE ID='$cel'";
                    $resultim = mysqli_query($conn, $sql);
                    $resultim = mysqli_fetch_assoc($resultim);
                    $im = $resultim['imie'];
                    $nz = $resultim['nazwisko'];
                    echo ("
                    <section class='box'>    
                        Data: $data | $typ | Opis: $opis | $kwota zł | Użytkownik docelowy: $im $nz
                    </section>
                    ");
                }
                ?>
            </section>
            <section class="content invisible" id="h_log">
                <h3 class="title">Ostatnie logowania</h3>
                <?php
                $sql = "SELECT ID, data, adres_ip FROM loginlog WHERE user_ID='$id' ORDER BY ID DESC LIMIT 10";
                $resultlog = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($resultlog)) {
                    $nmb = $row['ID'];
                    $data = $row['data'];
                    $ip = $row['adres_ip'];

                    echo ("
                    <section class='box'>
                        Data: $data | Adres IP: $ip
                    </section>
                    ");
                }
                ?>
            </section>
        </section>



        <footer>
            <h6>
                Strona wykorzystuje technologię ciasteczek.
            </h6>
        </footer>

        <script type="text/javascript">
            const elementsArray = ['pinfo', 'przelew', 'pozyczka', 'h_przel', 'h_log']

            function loanAmout() {
                let am = document.getElementById("loanAm").value
                document.getElementById("loanAmout").innerHTML = am + " zł"
            }

            function loanInterval() {
                let inte = document.getElementById("loanIn").value
                document.getElementById("loanInterval").innerHTML = inte
            }

            function changeVisiblity(x) {
                elementsArray.forEach(element => {
                    document.getElementById(element).classList.add('invisible')
                });
                document.getElementById(x).classList.remove('invisible')
            }

            document.getElementById('pinfo').classList.remove('invisible')

            function sprawdz() {
                if (document.getElementById("kwota").value < 0) {
                    document.getElementById("kwota").value = 0
                } else if (Number(document.getElementById("kwota").value) > Number(document.getElementById("saldo").value)) {
                    document.getElementById("kwota").value = document.getElementById("saldo").value
                }
            }

            <?php
            if (isset($_POST['rows'])) {
                echo "
                document.getElementById('pinfo').classList.add('invisible')
                document.getElementById('h_przel').classList.remove('invisible')
                ";
            }
            ?>
        </script>
    </main>
</body>

</html>