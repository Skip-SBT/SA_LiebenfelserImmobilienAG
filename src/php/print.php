<!DOCTYPE html>


<html>

<head>
    <title>print</title>
    <link href="/style/print.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>
    <header>
        <h3>Modellrechnung</h3>
    </header>

    <h2 class="title">Standartberechnung</h2>
    <div class="object">
        <h4>Angaben zum Objekt</h4>
        <hr class="titleHr">
        <div class="subObject">
            <h5>Kosten</h5>
            <hr class="subTitleHr">
            <!-- subObject 1 -->
            <div class="content">
                <h5 class="left">Kaufpreis / Anlagekosten</h5>
                <h5 class="right">879879</h5>
                <br>
                <hr class="subTitleHr">
                <!-- subObject 2 -->
                <div class="content">
                    <h5 class="left">Total Anlagekosten</h5>
                    <h5 class="right">879879</h5>
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
                <h5 class="left">Barmittel</h5>
                <h5 class="rightS">879879</h5>
                <br>
                <hr class="subTitleHrSplit">
                <!-- subObject 2 -->
                <div class="content">
                    <h5 class="left">Total eigene Mittel</h5>
                    <h5 class="rightS">879879</h5>
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
                <h5 class="left">1. Hypothek¹</h5>
                <h5 class="rightS">879879</h5>
                <br>
                <hr class="subTitleHrSplit">
                <!-- subObject 2 -->
                <div class="content">
                    <h5 class="left">2. Hypothek²</h5>
                    <h5 class="rightS">879879</h5>
                    <br>
                    <hr class="subTitleHrSplit">
                    <!-- subObject 2 -->
                    <div class="content">
                        <h5 class="left">Total Bankfinanzierung</h5>
                        <h5 class="rightS">0</h5>
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
                <h5 class="left">pro Monat</h5>
                <h5 class="rightS1">879879</h5>
                <br>
                <hr class="subTitleHrSplit1">
                <!-- subObject 2 -->
                <div class="content">
                    <h5 class="left">Schuldzinsen</h5>
                    <h5 class="rightS1">879879</h5>
                    <br>
                    <hr class="subTitleHrSplit1">
                </div>
                <!-- subObject 3 -->
                <div class="content">
                    <h5 class="left">Nebenkosten <br>(inkl. allfällige Baurechtszinsen)</h5>
                    <h5 class="rightS1">879879</h5>
                    <br>
                    <hr class="subTitleHrSplit1">
                </div>
                <br>
                <div class="content">
                    <h5 class="left">Gesamtbelastung</h5>
                    <h5 class="rightS1">879879</h5>
                    <br>
                    <hr class="subTitleHrSplit1">
                </div>
                <div class="content">
                    <h5 class="left">Gesamtbelastung pro Monat</h5>
                    <h5 class="rightS1">879879</h5>
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
                <h5 class="left">pro Monat</h5>
                <h5 class="rightS1">879879</h5>
                <br>
                <hr class="subTitleHrSplit">
                <!-- subObject 2 -->
                <div class="content">
                    <h5 class="left1">Total nachhaltige Einnahmen NAME VORNAME</h5>
                    <h5 class="rightS1">879879</h5>
                    <br>
                    <hr class="subTitleHrSplit">
                </div>
                <br>
                <br>
                <div class="content">
                    <h5 class="left">Gesamteinnahmen</h5>
                    <h5 class="rightS1">879879</h5>
                    <br>
                    <hr class="subTitleHrSplit1">
                </div>
                <div class="content">
                    <h5 class="left">Gesamteinnahmen pro Monat</h5>
                    <h5 class="rightS1">879879</h5>
                    <br>
                    <hr class="subTitleHrSplit1">
                </div>
                <div class="content">
                    <h5 class="left">Tragbarkeit</h5>
                    <h5 class="rightS1">879879</h5>
                    <br>
                    <hr class="subTitleHrSplit1">
                </div>
            </div>
        </div>
    </div>
    <canvas class="pie" id="doughnut-chart2"></canvas>
    <div class="object">
        <h4>Empfehlung</h4>
        <hr class="titleHr">
        <h5>Text from Legend</h5>
    </div>
    </div>
   <br>
   <br>
    <footer>
        <h6>1 Zur Berechnung der langfristigen Tragbarkeit werden nicht die aktuellen, sondern langfristige durchschnittlichen Zinssätze verwendet.</h6>
        <h6>2 2. Hypothek ist in 15 Jahren abzubezahlen</h6>
        <h6>Standartberechnung für: NAME VORNAME | DATE | Liebenfelser Immobilien AG</h6>
    </footer>
    <script>
        window.print();
        setTimeout(()=>{window.location = "/index.php";},2000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="/js/piechartPrint.js"></script>
</body>