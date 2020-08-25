<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Hypothekenrechner – Liebenfelser Immobilien AG</title>
    <link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>
<nav>
<img src="Pictures\logo.svg" >

</nav>
<header>
    <h1>Modellrechnung</h1>
</header>

<body>
    <div class="upper">
       
        <form action="index.php" method="POST" id="form">
            <div class="input">
                <label>
                    <h3>Eigenkapital</h3>
                    <input type="number" name="Ek" value="<?php echo $_POST['Ek'] ?>" />
                </label>

                <label>
                    <h3>Jahreseinkommen</h3>
                    <input type="number" name="Jahreseinkommen" value="<?php echo $_POST['Jahreseinkommen'] ?>" />
                </label>

                <label>
                    <h3>Kaufpreis/Total Investition</h3>
                    <input type="number" name="Kaufpreis" value="<?php echo $_POST['Kaufpreis'] ?>" />
                </label>
                <input type="submit" name="calc" value="Berechnen" id="b1">
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
                    <h3>Belehnungsgrad</h3>
                    <input type="Text" name="Result" id="b22" value="<?php
                                                                        if (isset($_POST['calc'])) {
                                                                            echo calcBelehnung($_POST['Kaufpreis'], $_POST['Ek']);
                                                                        } ?>" readonly>
                </label>
                <label>
                    <h3>Hypothekarzinsen j.</h3>
                    <input type="text" name="Result" value="<?php
                                                            if (isset($_POST['calc'])) {
                                                                $zins = calcZins($_POST['Kaufpreis'], $_POST['Ek']);
                                                                echo $zins . " CHF";
                                                            } ?>" readonly>


                </label>
                <label>
                    <h3>Amortisation j.</h3>
                    <input type="text" name="Result" value="<?php
                                                            if (isset($_POST['calc'])) {
                                                                echo calcAmotisation($_POST['Kaufpreis'], $_POST['Ek']) . " CHF";
                                                            } ?>" readonly>
                </label>
                <label>
                    <h3>Unterhalts- und Nebenkosten j.</h3>
                    <input type="text" name="Result" value="<?php
                                                            if (isset($_POST['calc'])) {
                                                                $nebenkosten = $_POST['Kaufpreis'] * 0.007;
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

            </div>
        </form>
    </div>

    <div class="text">
        <h2>FRAGEN ZUM HYPOTHEKENRECHNER UND TRAGBARKEIT</h2>

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
        $eig = 100 / $kaufpreis * $ek;

        if ($hypo < 0) {
            $hypo = 0;
        }

        if ($check) {
            echo (round($hypo)) . "% | Belehnung Ausreichend";
        } else {
            echo (round($hypo)) . "% | Belehung zu Hoch";
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
            echo number_format($res) . " % | Tragbarkeit nicht gegeben";
        } else {
            if ($res < 0) {
                $res = 0;
            }
            echo number_format($res) . " % | Tragbarkeit gegeben";
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
        //$amortisationsbetrag = (($kaufpreis - $ek) * ((100 - $hypo) / 100)) / 15;
        $amortisationsbetrag = calcAmotisation($_POST['Kaufpreis'], $_POST['Ek']); // Only works if numberFormat isn't in function
        $zins =  ($kaufpreis - $ek) * 0.05;
        $unterhaltskosten = $kaufpreis * 0.01;
        if ($zins < 0) {
            $zins = 0;
        }
        if ($amortisationsbetrag < 0) {
            $amortisationsbetrag = 0;
        }

        $gesammt = ($zins + $amortisationsbetrag + $unterhaltskosten) / 12;
        echo number_format($gesammt);
    }

    function autocompleteKaufpreis ($ek){
        $kaufpreis = $ek*5;
        return $kaufpreis;
    }
    ?>
    <div id="demo"></div>

</body>

<script src="js/script.js"></script>
<script src="Library/jquery-3.5.1.js"></script>


</html>