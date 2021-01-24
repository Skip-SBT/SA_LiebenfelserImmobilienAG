<!DOCTYPE html>
<?php session_start(); ?>

<html>

<head>
    <title>print</title>
    <link href="/src/css/print.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<img src="/Pictures/logo.svg">
    <header>
    <h2 class="title">Modellrechnung</h2>
    
    </header>
    <div class="object">
        <h4>Angaben zum Objekt</h4>
        <hr class="titleHr">
        <div class="subObject">
            <h5>Kosten</h5>
            <hr class="subTitleHr">
            <!-- subObject 1 -->
            <div class="content">
                <h5 class="left">Kaufpreis/ Anlegekosten</h5>
                <h5 class="right"><?php echo $_SESSION['Kaufpreis']; ?></h5>
                <br>
                <hr class="subTitleHr">
                <!-- subObject 2 -->
                <div class="content">
                    <h5 class="left">Total Anlagekosten</h5>
                    <h5 class="right"><?php echo $_SESSION['Kaufpreis']; ?></h5>
                    <br>
                    <hr class="subTitleHr">
                    <!-- subObject 2 -->
                    <div class="content">
                        <h5 class="left">Wertkorrektur +/-</h5>
                        <h5 class="right">0</h5>
                        <br>
                        <hr class="subTitleHr">
                    </div>
                    <!-- subObject 3 -->
                    <div class="content">
                        <h5 class="left">Verkehrswert RB (Belehnungsbasis)</h5>
                        <h5 class="right">0</h5>
                        <br>
                        <hr class="subTitleHr">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="object">
        <h4>Finanzierung</h4>
        <hr class="titleHr">
        <div class="subObjectL">
            <h5>Eigene Mittel</h5>
            <hr class="subTitleHrSplit">
            <!-- subObject 1 -->
            <div class="content">
                <h5 class="left">Barmittel, PK, 3. Säule</h5>
                <h5 class="rightS"><?php echo $_SESSION['Eigenkapital']; ?></h5>
                <br>
                <hr class="subTitleHrSplit">
                <!-- subObject 2 -->
                <div class="content">
                    <h5 class="left">Total eigene Mittel</h5>
                    <h5 class="rightS"><?php echo $_SESSION['Eigenkapital']; ?></h5>
                    <br>
                    <hr class="subTitleHrSplit">
                </div>
            </div>
        </div>
        <div class="subObjectR">
            <h5>Fremde Mittel</h5>
            <hr class="subTitleHrSplit">
            <!-- subObject 1 -->
            <div class="content">
                <h5 class="left">1. Hypothek</h5>
                <h5 class="rightS"><?php echo number_format($_SESSION['Hypothek1'], 2, ".", "'"); ?></h5>
                <br>
                <hr class="subTitleHrSplit">
                <!-- subObject 2 -->
                <div class="content">
                    <h5 class="left">2. Hypothek²</h5>
                    <h5 class="rightS"><?php echo number_format($_SESSION['Hypothek2'], 2, ".", "'"); ?></h5>
                    <br>
                    <hr class="subTitleHrSplit">
                    <!-- subObject 2 -->
                    <div class="content">
                        <h5 class="left">Total Bankfinanzierung</h5>
                        <h5 class="rightS"><?php echo number_format($_SESSION['TotalBankFin'], 2, ".", "'"); ?></h5>
                        <br>
                        <hr class="subTitleHrSplit">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <canvas class="pie" id="doughnut-chart"></canvas>

    <div class="object">
        <h4>Tragbarkeit</h4>
        <hr class="titleHr">
        <div class="subObjectL">
            <h5>Wohnkosten Liegenschaft</h5>
            <hr class="subTitleHrSplit1">
            <!-- subObject 1 -->
            <div class="content">
                <h5 class="left">Kallkolatorische Schuldzinsen¹</h5>
                <h5 class="rightS1"><?php echo number_format($_SESSION['TotalBankFin'] * 0.05, 2, ".", "'"); ?></h5>
                <br>
                <hr class="subTitleHrSplit1">
            </div>
            <!-- subObject 3 -->
            <div class="content">
                <h5 class="left">Nebenkosten <br>(inkl. allfällige Baurechtszinsen)</h5>
                <h5 class="rightS1"><?php echo number_format($_SESSION['NebenK'], 2, ".", "'"); ?></h5>
                <br>
                <hr class="subTitleHrSplit1">
            </div>
            <br>
            <div class="content">
                <h5 class="left">Gesamtbelastung</h5>
                <h5 class="rightS1"><?php echo number_format($_SESSION['TotalBankFin'] * 0.05 + $_SESSION['NebenK'], 2, ".", "'"); ?></h5>
                <br>
                <hr class="subTitleHrSplit1">
            </div>
            <div class="content">
                <h5 class="left">Gesamtbelastung pro Monat</h5>
                <h5 class="rightS1"><?php echo number_format(($_SESSION['TotalBankFin'] * 0.05 + $_SESSION['NebenK']) / 12, 2, ".", "'"); ?></h5>
                <br>
                <hr class="subTitleHrSplit1">
            </div>
        </div>
    </div>

    <div class="subObjectR">
        <h5>Einnahmen ohne Liegenschaft</h5>
        <hr class="subTitleHrSplit">
        <!-- subObject 1 -->
        <div class="content">
            <h5 class="left">Gesamteinnahmen</h5>
            <h5 class="rightS1"><?php echo $_SESSION['Einnahmen']; ?></h5>
            <br>
            <hr class="subTitleHrSplit1">
        </div>
        <div class="content">
            <h5 class="left">Gesamteinnahmen pro Monat</h5>
            <h5 class="rightS1"><?php echo  number_format($_SESSION['Einnahmen'] / 12, 2, ".", "'"); ?></h5>
            <br>
            <hr class="subTitleHrSplit1">
        </div>
        <div class="content">
            <h5 class="left">Tragbarkeit</h5>
            <h5 class="rightS1"><?php echo $_SESSION['Tragbarkeit'] . '%'; ?></h5>
            <br>
            <hr class="subTitleHrSplit1">
        </div>
    </div>
    <canvas class="pie2" id="doughnut-chart2"></canvas>


    <div class="object">
        <h4>Empfehlung</h4>
        <hr class="titleHr">
        <?php
        
        if ($_SESSION['Tragbarkeit'] <= 30 && $_SESSION['Finnanzierung'] >= 20) {
            echo "<h5>Die finanzielle Tragbarkeit, wie auch die Finanzierung ist gemäss Ihren Informationen ausreichend.</h5>";
        } elseif ($_SESSION['Tragbarkeit'] > 30 && $_SESSION['Finnanzierung'] >= 20) {
            echo "<h5>Die finanzielle Tragbarkeit ist gemäss Ihren Angaben nicht ausreichend, jedoch sind genügend Eigenmittel vorhanden. Für den Kauf eines Objektes in dieser Kostendimension, müsste das Bruttohaushaltseinkommen um xy CHF grösser sein.</h5>";
        } elseif ($_SESSION['Tragbarkeit'] <= 30 && $_SESSION['Finnanzierung'] < 20) {
            echo "<h5>Leider ist Ihr Eigenkapital für den Kaufpreis gemäss Ihren angaben nicht ausreichend. Jedoch ist die Tragbarkeit ausreichend. Mit ".($_SESSION['Kaufpreis']*0.2-$_SESSION['Eigenkapital'])." CHF zusätzlichem Eigenkapital, könnten Sie sich Ihren Wohntraum erfüllen.</h5>";
        } elseif ($_SESSION['Tragbarkeit'] > 30 && $_SESSION['Finnanzierung'] < 20) {
            echo "<h5>Die finanzielle Tragbarkeit, wie auch der Eigenkapitalanteil sind nicht ausreichend. Damit Sie sich Ihren Wohntraum realisieren können benötigen Sie xy CHF mehr Bruttohaushaltseinkommen und ".($_SESSION['Kaufpreis']*0.2-$_SESSION['Eigenkapital'])." CHF mehr Eigenkapital.</h5>";
        }
        echo "<h5>Bitte beachten Sie, dass sich mindestens 10% Ihres Eigenkapitals aus Barmittel und der 3. Säule zusammesetzen. Entsprechend darf der Pensionskassenanteil nicht über 10% des Eigenkapitals betragen.</h5>";
        echo "<h5>Allenfalls empfiehlt sich die Verpfändung der Pensionskasse an der Stelle  deren Auszahlung.</h5>";

        ?>
    </div>

    <br>
    <br>
    <footer>
        <h6>1 Zur Berechnung der langfristigen Tragbarkeit werden nicht die aktuellen, sondern langfristige durchschnittlichen Zinssätze verwendet.</h6>
        <h6>2 2. Hypothek ist in 15 Jahren abzubezahlen</h6>
        <h6>Standartberechnung für: <?php echo ($_SESSION['Vorname'].' '. $_SESSION['Nachname'].' | '. date("Y.m.d"))?> | Liebenfelser Immobilien AG</h6>
    </footer>
    <input type="hidden" id="chartVal1" value="<?php echo $_SESSION['TotalBankFin']; ?>"></input>
    <input type="hidden" id="chartVal2" value="<?php echo $_SESSION['Eigenkapital']; ?>"></input>
    <input type="hidden" id="chart2Val1" value="<?php echo $_SESSION['Einnahmen']; ?>"></input>
    <input type="hidden" id="chart2Val2" value="<?php echo ($_SESSION['TotalBankFin'] * 0.05 + $_SESSION['NebenK']); ?>"></input>
    <script>
        window.print();
        setTimeout(() => {
            window.location = "/index.php";
        }, 2000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="/src/js/piechartPrint.js"></script>
</body>