<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Formular</title>
    <link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>
<header>
    <h1>Modellrechnung</h1>
</header>

<body>
    <form action="index.php" method="POST" id="form">
        <div class="input">
            <label>
                <h3>Kaufpreis/Total Investition</h3>
                <input type="number" name="Kaufpreis" value="<?php echo $_POST['Kaufpreis'] ?>" />
            </label>

            <label>
                <h3>Eigenkapital</h3>
                <input type="number" name="Ek" value="<?php echo $_POST['Ek'] ?>" />
            </label>

            <label>
                <h3>Jahreseinkommen</h3>
                <input type="number" name="Jahreseinkommen" value="<?php echo $_POST['Jahreseinkommen'] ?>" />
            </label>
            <button type="submit" name="calc">Berechnen</button>
        </div>
        <div class="results">
            <label>
                <h3>Tragbarkeit</h3>
                <input type="number" name="Result" value="<?php
                                                            if (isset($_POST['calc'])) {
                                                                echo calcBelehnung($_POST['Kaufpreis'], $_POST['Ek'], $_POST['Jahreseinkommen']);
                                                            } ?>" readonly>

            </label>
            <label>
                <h3>Hypothekarzinsen</h3>
                <input type="text" name="Result" value="<?php
                                                        if (isset($_POST['calc'])) {
                                                            $zins = calcZins($_POST['Kaufpreis'], $_POST['Ek']);
                                                            echo $zins. " CHF";
                                                        } ?>" readonly>


            </label>
            <label>
                <h3>Armotisation</h3>
                <input type="number" name="Result" value="<?php
                                                            if (isset($_POST['calc'])) {
                                                                echo calcBelehnung($_POST['Kaufpreis'], $_POST['Ek'], $_POST['Jahreseinkommen']);
                                                            } ?>" readonly>
            </label>
            <label>
                <h3>Unterhalts- und Nebenkosten</h3>
                <input type="text" name="Result" value="<?php
                                                        if (isset($_POST['calc'])) {
                                                            $nebenkosten = $_POST['Kaufpreis'] * 0.01;
                                                            echo number_format($nebenkosten) . " CHF";
                                                        } ?>" readonly>

            </label>
            <label>
                <h3>Monatliche Gesammtkosten</h3>
                <input type="number" name="Result" value="<?php
                                                            if (isset($_POST['calc'])) {
                                                                echo calcBelehnung($_POST['Kaufpreis'], $_POST['Ek'], $_POST['Jahreseinkommen']);
                                                            } ?>" readonly>

            </label>
            <label>
                <h3>Belehung</h3>
                <input type="Text" name="Result" value="<?php
                                                        if (isset($_POST['calc'])) {
                                                            echo calcBelehnung($_POST['Kaufpreis'], $_POST['Ek']);
                                                        } ?>" readonly>

            </label>
        </div>
    </form>

    <?php
    function calcBelehnung($kaufpreis, $ek)
    {
        if ($kaufpreis * 0.2 <= $ek) {
            $check = true;
        } else {
            $check = false;
        }
        $hypo = 100 - 100 / $kaufpreis * $ek;
        $eig = 100 / $kaufpreis * $ek;

        if ($hypo < 0) {
            $hypo = 0;
        }

        if ($check) {
            echo (round($hypo)) . "% Belehnung Ausreichend";
        } else {
            echo (round($hypo)) . "% Belehung zu Hoch";
        }
    }
    function calcZins($kaufpreis, $ek)
    {
        $hypo = $kaufpreis - $ek;
        $zins = $hypo * 0.05;
        echo number_format($zins);
    }

    function calcTragbarkeit($kaufpreis, $einkommen){
        
    }

    ?>

</body>

</html>