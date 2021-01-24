<!DOCTYPE html>
<!--
    To change this license header, choose License Headers in Project Properties.
    <meta charset="UTF-8">
    To change this template file, choose Tools | Templates
    and open the template in the editor.
-->
<html>
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


error_reporting(E_ERROR | E_PARSE);
session_start();


if (!isset($_SESSION['anzahlbesuche'])) {
    $_SESSION['anzahlbesuche'] = 1;
} else {
    $_SESSION['anzahlbesuche']++;
}

?>

<head>
    <title>Hypothekenrechner – Liebenfelser Immobilien AG</title>
    <link href="/src/css/stylesheet.css" rel="stylesheet" type="text/css" />
    <link href="/src/css/stylePopUp.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<nav>
    <div id="mySidenav" class="sidenav">
        <span href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</span>
        <a href="#">Home</a>
        <a href="#">Contact</a>
    </div>


    <span style="font-size:60px;cursor:pointer; color:white; padding-left:20px;" onclick="openNav()">&#9776;</span>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "650px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>

    <img src="Pictures/logo.svg">
</nav>
<header>
    <img src="/Pictures/placeholder3.jpg" alt="placeholder house">
    <h1>Modellrechnung</h1>
</header>

<body onLoad="window.location ='#main'">
    <div id="main" class="main">
        <!-- input -->
        <div class="input">
            <form action="index.php" method="POST" id="form">

                <div>
                    <h3>Eigenmittel</h3>
                    <div class="tooltip"><img src="Pictures\info1.png">
                        <div class="right">
                            <p>Mindestens 20 Prozent müssen als Eigenkapital aufgebracht werden.</p>
                            <br>
                            <p>≥10% «Harte Eigenmittel» (Barmittel, Wertschriften, 3a, Lebensversicherungspolicen, Erbvorzüge/Schenkungen)
                            <P>
                                <br>
                            <p>≤10% «Weiche Eigenmittel» (PK-Verpfändung* oder PK-Bezug)</p>
                        </div>
                    </div>
                    <input type="number" id="ek" name="Ek" required value="<?php echo $_POST['Ek'] ?>" />

                </div>

                <div>
                    <h3>Jahreseinkommen</h3>
                    <div class="tooltip"><img src="Pictures\info1.png">
                        <div class="right">
                            <p>Einkommen, dass während eines Jahres ohne Steuerabzug erzielt wird.</p>
                        </div>
                    </div>
                    <input type="number" name="Jahreseinkommen" id="Jek" required value="<?php echo $_POST['Jahreseinkommen'] ?>" />
                </div>

                <div>
                    <h3>Kaufpreis</h3>
                    <input type="number" id="price" name="Kaufpreis" required value="<?php echo $_POST['Kaufpreis'] ?>" />
                </div>
                <input type="submit" name="calc" id="calc" value="Ausrechnen" id="b1">

                <button type="button" id="popup" name="PopUp">Detailiertes PDF</button>




            </form>
            <form action="index.php" method="POST">
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>

                    <head>
                        <h1>Detailierte Angaben</h1>
                    </head>

                    <body>
                        <p>Bitte Kontaktinformationen ausfüllen für Detailinformationen als PDF.</p>
                        <h3>Vorname</h3>
                        <input type="text" name="vorname" onkeypress="return /[a-z]/i.test(event.key)" required></input>
                        <h3>Nachname</h3>
                        <input type="text" name="nachname" onkeypress="return /[a-z]/i.test(event.key)" required></input>
                        <h3>e-Mail</h3>
                        <input type="email" name="email" required></input>

                        <input type="hidden" id="Mek" name="Ek1"  value="<?php echo $_POST['Ek'] ?>"></input>
                        <input type="hidden" id="Mprice" name="Kaufpreis1"value=" <?php echo $_POST['Kaufpreis'] ?>"></input>
                        <input type="hidden" id="Mjek" name="Jahreseinkommen1"value=" <?php echo $_POST['Jahreseinkommen']?>"></input>

                        <button type="submit" id="print" name="addToDB" value="2">Drucken</button>
                    </body>
                </div>
            </div>
            </form>

        </div>
        <?php
        
        if (isset($_POST['addToDB'])) {
            initializeSession($_POST['Kaufpreis1'], $_POST['Ek1'], $_POST['Jahreseinkommen1'], $_POST['vorname'], $_POST['nachname'], $_POST['email']);
            addToDB(); ?>
            <script>
                window.location = "src/php/print.php";
            </script>
        <?php
            // // Load Composer's autoloader
            // require 'Mailer/vendor/autoload.php';
            // // Instantiation and passing `true` enables exceptions
            // $email = new PHPMailer(true);
            // $email->SetFrom('maximilian.hubrath@gmail.com', 'maxi'); //Name is optional
            // $email->Subject   = 'DATEN VON IMMO.CALC';
            // $email->Body      = $bodytext;
            // $email->AddAddress('maximilian.hubrath@stud.kftg.ch');

            // $file_to_attach = 'docs/dataSheet.pdf';

            // $email->AddAttachment($file_to_attach, 'dataSheet.pdf');

            // return $email->Send();
        }
        ?>


        <div class="chart">
            <h2>Ihre Belehnung: <?php if (isset($_POST['calc'])) {
                                    echo calcBelehnung($_POST['Kaufpreis'], $_POST['Ek']) . "%" ?><br><?php if (calcBelehnung($_POST['Kaufpreis'], $_POST['Ek']) < 80) {
                                                                                                            echo "Belehnung Ausreichend";
                                                                                                        } else {
                                                                                                            echo "Belehnung zu hoch";
                                                                                                        }
                                                                                                    } ?></h2>
            <canvas id="myChart" class="chart" width="400" height="400"></canvas>
        </div>

        <div class="results">
            <div>
                <h2>Tragbarkeit: <?php
                                    if (isset($_POST['calc'])) {
                                        $res = calcTragbarkeit($_POST['Kaufpreis'], $_POST['Ek'], $_POST['Jahreseinkommen']);
                                        if ($res > 33.0) {

                                            echo $res . "% nicht gegeben";
                                        } else {
                                            echo $res . "% gegeben";
                                        }
                                    } ?></h2>
                <div class="tooltip"><img src="Pictures\info1.png">
                    <div class="right">
                        <p>Die Gesamtkosten der Liegenschaft sollten nicht mehr als 33% des Bruttoeinkommens betragen, damit die Immobilie langfristig für Sie tragbar ist.</p>
                        <i></i>
                    </div>
                </div>
            </div>
            <div>
                <h3></h3>

                <canvas id="Chart1" width="400px" height="50px"></canvas>
            </div>
            <input type="hidden" id="tragbarkeit" name="Result" value="<?php
                                                                        if (isset($_POST['calc']) or isset($_POST['addToDB'])) {
                                                                            echo calcTragbarkeit($_POST['Kaufpreis'], $_POST['Ek'], $_POST['Jahreseinkommen']);
                                                                        } ?>" readonly>

            <div>
                <h3>Hypothekarzinsen j.</h3>
                <div class="tooltip"><img src="Pictures\info1.png">
                    <div class="right">
                        <p>Für die Berechnung der langfristigen Hypothekarzinsen wird mit einem kalkulatorischen Zinssatz von 5.00% gerechnet.</p>
                        <i></i>
                    </div>
                </div>
                <input type="text" name="hypo" value="<?php
                                                        if (isset($_POST['calc']) or isset($_POST['addToDB'])) {
                                                            $zins = calcZins($_POST['Kaufpreis'], $_POST['Ek']);
                                                            echo $zins . " CHF";
                                                        } ?>" readonly>


            </div>
            <div>
                <h3>Amortisation j.</h3>
                <div class="tooltip"><img src="Pictures\info1.png">
                    <div class="right">
                        <p>II. Hypotheken sind innert 15 Jahren zu amortisieren.</p>
                        <i></i>
                    </div>
                </div>
                <input type="text" name="Result" value="<?php
                                                        if (isset($_POST['calc']) or isset($_POST['addToDB'])) {
                                                            echo number_format(calcAmotisation($_POST['Kaufpreis'], $_POST['Ek']), 2, ".", "'") . " CHF";
                                                        } ?>" readonly>
            </div>
            <div>
                <h3>Unterhaltskosten j.</h3>
                <div class="tooltip"><img src="Pictures\info1.png">
                    <div class="right">
                        <p>Für die Berechnung der jährlichen Nebenkosten wird mit 0.7% vom Liegenschaftswert gerechnet.</p>
                        <i></i>
                    </div>
                </div>
                <input type="text" name="Result" value="<?php
                                                        if (isset($_POST['calc']) or isset($_POST['addToDB'])) {
                                                            $nebenkosten = $_POST['Kaufpreis'] * 0.007;
                                                            echo number_format($nebenkosten, 2, ".", "'") . " CHF";
                                                        } ?>" readonly>

            </div>
            <div>
                <h3>Monatliche Gesamtkosten</h3>
                <div class="tooltip"><img src="Pictures\info1.png">
                    <div class="right">
                        <p>Durchschnittliche Gesamtkosten, welche für die Liegenschaften pro Monat langfristig anfallen.</p>
                        <i></i>
                    </div>
                </div>
                <input type="text" name="Result" value="<?php
                                                        if (isset($_POST['calc']) or isset($_POST['addToDB'])) {
                                                            echo calcMonatlichegesammtkosten($_POST['Kaufpreis'], $_POST['Ek']) . " CHF";
                                                        } ?>" readonly>

            </div>

            <!-- Belehnungsgrad</h3> -->
            <input type="Text" type="hidden" id="bel" name="Result" id="b22" value="<?php
                                                                                    if (isset($_POST['calc'])) {
                                                                                        echo calcBelehnung($_POST['Kaufpreis'], $_POST['Ek']);
                                                                                    } ?>" readonly>

        </div>
    </div>

    <div class="text">
        <h2>Fragen zum Hypothekenrechner und Tragbarkeit</h2>

        <button type="button" class="collapsible">Die Belastung ist zu hoch. Wie kann ich meine Eigenmittel erhöhen?</button>
        <div class="content">
            <p>
                Neben den klassischen Eigenmitteln, wie z.B. Sparguthaben oder Wertpapiere, können auch Vorsorgekonto- oder Pensionskassenguthaben oder unbelehntes Bauland verwendet werden.
                Zinslose und nicht rückzahlbare Darlehen von Bekannten oder Familienmitgliedern sind weitere mögliche Mittel zur Aufstockung des Eigenkapitals.
                Wenn es die finanzielle Situation der Eltern zulässt, kann auch ein Erbvorbezug oder eine Schenkung in Betracht gezogen werden.
                Die langfristige Tragbarkeit einer Finanzierung ist erst dann sichergestellt, wenn die Gesamtkosten für Ihr Wohneigentum 33 % Ihres Einkommens nicht übersteigen. In diesem Beispiel rechnen wir zu Ihrer Sicherheit mit einem Zinssatz von 5 %, auch wenn aktuelle Zinsen deutlich niedriger sein können.
            </p>
        </div>
        <button type="button" class="collapsible">Wie funktioniert der Hypothekenrechner?</button>
        <div class="content">
            <p>
                Für die Berechnung Ihrer Tragbarkeit benötigen Sie den Kaufpreis der Immobilie, das jährliche Bruttoeinkommen (Zahlung vom Arbeitgeber, ohne Abzüge wie Steuern oder Sozialabgaben) sowie vorhandene Eigenmittel.
                Geben Sie Ihre Werte in den Hypothekenrechner ein und Sie erhalten sofort eine Einschätzung. In der Kostenaufstellung sehen Sie zudem weitere Details, wie die monatliche Belastung (bestehend aus Hypothekenzins, Amortisation und Unterhalts- und Nebenkosten) und die Tragbarkeit mit einem kalkulatorischen Zinssatz von 5 %.
                Das ist der Zinssatz, der für den Kreditentscheid angewendet wird. Hier haben Sie auch die Möglichkeit, den verwendeten Zins anzupassen.
                Der Hypothekenrechner dient dazu, eine erste Einschätzung der Tragbarkeit einer Finanzierung zu bekommen, ersetzt aber keine umfassende Analyse in einem Beratungsgespräch. Unsere Kundenberater berücksichtigen auch Details und Sonderfälle in der Immobilienfinanzierung, die ein Rechner nur bedingt abbilden kann.
            </p>
        </div>
        <button type="button" class="collapsible">Wie hoch werden meine Hypothekarkosten sein?</button>
        <div class="content">
            <p>
                Die tatsächlichen Kosten für die Hypothek eines Eigenheims hängen stark von Ihrer persönlichen Ausgangslage, der persönlichen Vorstellung von Budgetsicherheit und dem aktuellen und erwarteten Zinsumfeld ab. Daher empfehlen wir Ihnen, nach Nutzung des Hypothekenrechners, frühzeitig einen Termin mit uns zu vereinbaren.
                Basierend auf einer umfassenden Beratung rund um das Thema Eigenheimfinanzierung erstellen wir Ihnen einen auf Ihre Bedürfnisse abgestimmten Finanzierungsvorschlag.
            </p>
        </div>
        <button type="button" class="collapsible">Was ist eine 1. Hypothek und was eine 2. Hypothek?</button>
        <div class="content">
            <p>
                Wenn Ihr Eigenkapital nicht für den Kauf einer Immobilie reicht, dann benötigen Sie Fremdkapital in Form einer Hypothek. Die Hypothek ist ein Kredit, der die finanzierte Immobilie als Sicherheit (Grundpfand) hinterlegt hat.
                Die 1. Hypothek wird in der Regel bis max. 66 % des Wertes einer Immobilie gewährt. Sie muss nicht zurückbezahlt (amortisiert) werden, sondern bleibt langfristig bestehen.
                Die 2. Hypothek füllt dann die verbleibende Lücke. Sie wird in der Regel bis maximal 80 % des Wertes der Immobilie gewährt.
                Im Gegensatz zur 1. Hypothek muss sie innert maximal 15 Jahren abbezahlt werden.
            </p>
        </div>

        <button type="button" class="collapsible">Wie sichere ich die langfristige Tragbarkeit meiner Hypothek, wenn ein Unglücksfall eintreten sollte?</button>
        <div class="content">
            <p>Die TKB bietet Ihnen in Kooperation mit Swiss Life geeignete Versicherungslösungen unkompliziert und zu fairen Konditionen an: Die Kollektiv-Versicherung für Wohneigentümer garantiert Ihnen die passende finanzielle Absicherung bei einem Todesfall. Und mit den Einzelleben-Versicherungen können wir für Sie und Ihre Familie individuelle Versicherungslösungen realisieren.
                So steht Ihr Eigenheim auf einem sicheren Fundament – was immer auch kommt.</p>
        </div>
    </div>
   

    <?php

    function calcBelehnung($kaufpreis, $ek)
    {
        if ($kaufpreis * 0.2 <= $ek) {
            $check = true;
        } else {
            $check = false;
        }
        $hypo = 100 - 100 / $kaufpreis * $ek;

        if ($hypo < 0) {
            $hypo = 0;
        }
        $eig = 100 / $kaufpreis * $ek;

        if ($check) {
            return (round($hypo));
        } else {
            return (round($hypo));
        }
    }
    function calcZins($kaufpreis, $ek)
    {
        $hypo = $kaufpreis - $ek;
        $zins = $hypo * 0.05;
        if ($zins < 0) {
            $zins = 0;
        }
        return number_format($zins, 2, ".", "'");
    }

    function calcTragbarkeit($kaufpreis, $ek, $einkommen)
    {
        $hypo = 100 - 100 / $kaufpreis * $ek;
        $amortisationsbetrag = (($kaufpreis - $ek) * ((100 - $hypo) / 100)) / 15;
        $zins =  ($kaufpreis - $ek) * 0.05;
        $unterhaltskosten = $kaufpreis * 0.01;
        $gesammt = ($zins + $amortisationsbetrag + $unterhaltskosten) / 12;

        $monatlicheseinkommen = $einkommen / 12;
        $res = (100 / $monatlicheseinkommen) * $gesammt;
        if ($res > 33.0) {
            if ($res > 100) {
                $res = 100;
            }
            return number_format($res, 2, ".", "'");
        } else {
            if ($res < 0) {
                $res = 0;
            }
            return number_format($res, 2, ".", "'");
        }
    }

    function calcAmotisation($kaufpreis, $ek)
    {

        $hypo = 100 - 100 / $kaufpreis * $ek;
        if ($hypo < 0) {
            $hypo = 0;
        }
        if ($hypo < 66) {
            $amortisationsbetrag = 0;
        } else {

            $amortisationsbetrag = (($kaufpreis - $ek) * ((100 - $hypo) / 100)) / 15;
        }

        if ($amortisationsbetrag < 0) {
            $amortisationsbetrag = 0;
        }
        if ($hypo < 66) {
            $amortisationsbetrag = 0;
        }
        return $amortisationsbetrag;
    }
    function calcMonatlichegesammtkosten($kaufpreis, $ek)
    {
        $hypo = 100 - 100 / $kaufpreis * $ek;
        $amortisationsbetrag = calcAmotisation($_POST['Kaufpreis'], $_POST['Ek']); // Only works if numberFormat isn't in function
        $zins =  ($kaufpreis - $ek) * 0.05;
        $unterhaltskosten = $kaufpreis * 0.007;
        if ($zins < 0) {
            $zins = 0;
        }
        if ($amortisationsbetrag < 0) {
            $amortisationsbetrag = 0;
        }

        $gesammt = ($zins + $amortisationsbetrag + $unterhaltskosten) / 12;
        return number_format($gesammt, 2, ".", "'");
    }

    function autocompleteKaufpreis($ek)
    {
        $kaufpreis = $ek * 5;
        return $kaufpreis;
    }
    function addToDB()
    {
        $dbdir = 'C:/XAMPPREAL/htdocs/FormularSA/DB';
        /* Datenbankdatei ausserhalb htdocs öffnen bzw. erzeugen */
        $db = new SQLite3("$dbdir/SA_Lfimmo.db");
        $sqlstr = "INSERT INTO TInformationen (InfoEK, InfoJahreseinkommen, InfoKaufpreis, InfoHypothekarzins, InfoAmortisation, InfoUnterhaltskosten, InfoMGesamtkosten, InfoVorname, InfoNachname, InfoEmail) VALUES";
        $db->query($sqlstr . "('" . $_SESSION['Eigenkapital'] . "','" . $_SESSION['Einnahmen'] . "','" . $_SESSION['Kaufpreis'] . "','" . calcZins($_SESSION['Kaufpreis'], $_SESSION['Eigenkapital'] ) . "','" . calcAmotisation($_SESSION['Kaufpreis'], $_SESSION['Eigenkapital'] ) . "','" . $_SESSION['Kaufpreis'] * 0.007 . "','" . calcMonatlichegesammtkosten($_SESSION['Kaufpreis'], $_SESSION['Eigenkapital'] ) . "','" . $_POST['vorname'] . "','" . $_POST['nachname'] . "','" . $_POST['email'] . "');");
        $db->close();
        function sendPDF()
        {
        require('phpToPDF.php');

        //It is possible to include a file that outputs html and store it in a variable 
    }
        
    }
    //Session variables for Print page
    function initializeSession($kaufpreis, $ek, $einkommen, $vorname, $nachname, $mail)
    {
        $_SESSION['Kaufpreis'] = $kaufpreis;
        $_SESSION['Eigenkapital'] = $ek;
        $_SESSION['Hypothek1'] = $kaufpreis * 0.66;
        $_SESSION['Hypothek2'] = calcAmotisation($kaufpreis, $ek);
        $_SESSION['TotalBankFin'] = $_SESSION['Hypothek1'] + $_SESSION['Hypothek2'];
        $_SESSION['NebenK'] = $kaufpreis * 0.007;
        $_SESSION['TotalBelastungJ'] = ($_SESSION['TotalBankFin'] * 0.05) + $_SESSION['NebenK'];
        $_SESSION['Einnahmen'] = $einkommen;
        $_SESSION['Tragbarkeit'] = calcTragbarkeit($kaufpreis, $ek, $einkommen);
        $_SESSION['Finnanzierung'] = 100-calcBelehnung($kaufpreis, $ek);
        $_SESSION['Vorname'] = $vorname;
        $_SESSION['Nachname'] = $nachname;
        $_SESSION['Email'] = $mail;
    }
    ?>


    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="Library/jquery-3.5.1.js"></script>
    <script src="/src/js/script.js"></script>
    <script src="/src/js/chart.js"></script>
</body>

</html>