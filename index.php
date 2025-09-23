<?php

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Dati Temperature Registrate</title>
</head>
<body>
    <h1>Dati Temperature Registrate</h1>
    
    <?php
    if ($_POST) {
        $localita = $_POST['localita'];
        $data = $_POST['data'];
        $temp_min = $_POST['temperatura_min'];
        $temp_max = $_POST['temperatura_max'];
        $umidita = $_POST['umidita'];
        $valore_umidita = $_POST['valore_umidita'];
        $clima = $_POST['clima_attuale'];
        
        echo "<h2>Riepilogo Dati Meteorologici</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Campo</th><th>Valore</th></tr>";
        echo "<tr><td><strong>Località</strong></td><td>$localita</td></tr>";
        echo "<tr><td><strong>Data</strong></td><td>$data</td></tr>";
        echo "<tr><td><strong>Temperatura Minima</strong></td><td>$temp_min °C</td></tr>";
        echo "<tr><td><strong>Temperatura Massima</strong></td><td>$temp_max °C</td></tr>";
        echo "<tr><td><strong>Escursione Termica</strong></td><td>" . ($temp_max - $temp_min) . " °C</td></tr>";
        echo "<tr><td><strong>Tipo Umidità</strong></td><td>$umidita</td></tr>";
        echo "<tr><td><strong>Valore Umidità</strong></td><td>$valore_umidita%</td></tr>";
        echo "<tr><td><strong>Clima Attuale</strong></td><td>$clima</td></tr>";
        echo "</table>";
        
        // Analisi delle condizioni
        echo "<h3>Analisi Condizioni</h3>";
        echo "<ul>";
        
        if ($temp_max > 25) {
            echo "<li>Giornata calda (temperatura massima superiore a 25°C)</li>";
        } elseif ($temp_max < 10) {
            echo "<li>Giornata fredda (temperatura massima inferiore a 10°C)</li>";
        } else {
            echo "<li>Temperatura nella norma</li>";
        }
        
        if ($valore_umidita > 70) {
            echo "<li>Umidità elevata (oltre il 70%)</li>";
        } elseif ($valore_umidita < 30) {
            echo "<li>Umidità bassa (sotto il 30%)</li>";
        } else {
            echo "<li>Umidità nella norma</li>";
        }
        
        if ($clima == "PIOGGIA") {
            echo "<li>Condizioni meteorologiche avverse - si consiglia l'uso di ombrello</li>";
        } elseif ($clima == "SERENO") {
            echo "<li>Ottime condizioni meteorologiche</li>";
        }
        
        echo "</ul>";
        
    } else {
        echo "<p>Nessun dato ricevuto. <a href='form.html'>Torna al form</a></p>";
    }
    ?>
    
    <br>
    <a href="form.html">Inserisci nuove temperature</a>
</body>
</html>