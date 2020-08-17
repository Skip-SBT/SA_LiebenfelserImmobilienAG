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
            <input type="submit" name="calc" value="Berechnen">
        </div>
        <div class="results">
            <label>
                <h3>Tragbarkeit</h3>
                <input type="text" name="Result" value="<?php
                                                        if (isset($_POST['calc'])) {
                                                            echo calcTragbarkeit($_POST['Kaufpreis'], $_POST['Ek'], $_POST['Jahreseinkommen']);
                                                        } ?>" readonly>

            </label>
            <label>
                <h3>Hypothekarzinsen</h3>
                <input type="text" name="Result" value="<?php
                                                        if (isset($_POST['calc'])) {
                                                            $zins = calcZins($_POST['Kaufpreis'], $_POST['Ek']);
                                                            echo $zins . " CHF";
                                                        } ?>" readonly>


            </label>
            <label>
                <h3>Armotisation</h3>
                <input type="text" name="Result" value="<?php
                                                        if (isset($_POST['calc'])) {
                                                            echo calcAmotisation($_POST['Kaufpreis'], $_POST['Ek']) . " CHF";
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
                <input type="text" name="Result" value="<?php
                                                        if (isset($_POST['calc'])) {
                                                            echo calcMonatlichegesammtkosten($_POST['Kaufpreis'], $_POST['Ek']) . " CHF";
                                                        } ?>" readonly>

            </label>
            <label>
                <h3>Belehnung</h3>
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
        if ($zins < 0) {
            $zins = 0;
        }
        echo number_format($zins);
    }

    function calcTragbarkeit($kaufpreis, $ek, $einkommen)
    {
        $hypo = 100 - 100 / $kaufpreis * $ek;
        $amotisationsbetrag = (($kaufpreis - $ek) * ((100 - $hypo) / 100)) / 15;
        $zins =  ($kaufpreis - $ek) * 0.05;
        $unterhaltskosten = $kaufpreis * 0.01;
        $gesammt = ($zins + $amotisationsbetrag + $unterhaltskosten) / 12;

        $monatlicheseinkommen = $einkommen / 12;
        $res = (100 / $monatlicheseinkommen) * $gesammt;
        if ($res > 33.0) {
            if ($res > 100) {
                $res = 100;
            }
            echo number_format($res) . " % Tragbarkeit nicht gegeben";
        } else {
            if ($res < 0) {
                $res = 0;
            }
            echo number_format($res) . " % Tragbarkeit gegeben";
        }
    }

    function calcAmotisation($kaufpreis, $ek)
    {
        $hypo = 100 - 100 / $kaufpreis * $ek;
        $amotisationsbetrag = (($kaufpreis - $ek) * ((100 - $hypo) / 100)) / 15;
        if ($amotisationsbetrag < 0) {
            $amotisationsbetrag = 0;
        }
        echo number_format($amotisationsbetrag);
    }
    function calcMonatlichegesammtkosten($kaufpreis, $ek)
    {
        $hypo = 100 - 100 / $kaufpreis * $ek;
        $amotisationsbetrag = (($kaufpreis - $ek) * ((100 - $hypo) / 100)) / 15;
        $zins =  ($kaufpreis - $ek) * 0.05;
        $unterhaltskosten = $kaufpreis * 0.01;
        if ($zins < 0) {
            $zins = 0;
        }
        if ($amotisationsbetrag < 0) {
            $amotisationsbetrag = 0;
        }

        $gesammt = ($zins + $amotisationsbetrag + $unterhaltskosten) / 12;
        echo number_format($gesammt);
    }
    ?>

</body>

</html>