<?php session_start(); ?>
<!-- 
Creater: Maximilian Hubrath 
Version: 1.0
Updated: 26.2.2021
Copyright: C Maximilian Hubrath
-->

<html>
<title>Admin</title>

<head>
    <link rel="stylesheet" href="/src/css/admin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@700&display=swap" rel="stylesheet">

</head>
<?php


/* Datenbankdatei ausserhalb htdocs öffnen bzw. erzeugen */
// $dbdir = 'C:/XAMPPREAL/htdocs/FormularSA/DB';
$dbdir = '/kunden/364182_8001/web/2871458/A2871458/calc/DB';
$db = new SQLite3("$dbdir../SA_Lfimmo.db");
function createTables($db)
{
    $res1 = $db->query("SELECT * FROM TInformationen");
    echo ' <div class="content">';
    echo '<table><tr><th>Eigenkapital</th><th>Einkommen</th><th>Kaufpreis</th><th>Hypothekarzins</th><th>Amortisation</th><th>Unterhaltskosten</th><th>Gesammtkosten</th><th>Vorname</th><th>Nachname</th><th>e-Mail</th>';
    while ($dsatz2 = $res1->fetchArray(SQLITE3_ASSOC)) {
        echo '<tr><td>' . $dsatz2["InfoEK"] . ' CHF' . '</td><td>' . $dsatz2["InfoJahreseinkommen"] . ' CHF' . '</td><td>' . $dsatz2["InfoKaufpreis"] . ' CHF' . '</td><td>' . $dsatz2["InfoHypothekarzins"] . ' CHF' . '</td><td>' . $dsatz2["InfoAmortisation"] . ' CHF' . '</td><td>' . $dsatz2["InfoUnterhaltskosten"] . ' CHF' . '</td><td>' . $dsatz2["InfoMGesamtkosten"] . ' CHF' . '</td><td>' . $dsatz2["InfoVorname"] . '</td><td>' . $dsatz2["InfoNachname"] . '</td><td>' . $dsatz2["InfoEmail"] . '</td></tr>';
    }
    echo '</table></div>';
}

?>


<body>
    <header>
        <div class="top">
            <h1>Admin-Tool</h1>
        </div>
    </header>
    <div class="main">

        <div class="rightNav">
            <div class="buttonGroup">
                <h1>Anzahl Aufrufe: <?php echo $_SESSION['anzahlbesuche'] ?></h1>
                <button onClick="Javascript:window.location.href = '/index.php';">Home</button>
            </div>
        </div>

        <div class="mainContent">
            <!-- here comes the Tabele to check the respective Database output-->
            <form action="index.php" method="get" id="form">
                <?php createTables($db) ?>
            </form>
        </div>
    </div>

    <footer>
        <p>Creator: Maximilian Hubrath</p>
        <p>Lf-ImmobilienAG</p>
        <p>Updated: 2021</p>
    </footer>