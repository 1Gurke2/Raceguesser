<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rätselspiel</title>
    <link rel="stylesheet" href="styles.css"> <!-- CSS-Stylesheet einbinden -->
</head>
<body>
    <div class="container">
    <?php

echo '<p class="head">Raceguesser></p>';
// Cookie-Name für die Speicherung der Anzahl der Aktionen
$zaehlerCookieName = "aktion_zaehler";

// Überprüfen, ob das Zähler-Cookie schon existiert
$zaehler = isset($_COOKIE[$zaehlerCookieName]) ? (int)$_COOKIE[$zaehlerCookieName] : 0;

// Cookie-Name für Punktestand
$punkteCookieName = "punktestand";

// Prüfen, ob das Punktestand-Cookie schon existiert
$punkte = isset($_COOKIE[$punkteCookieName]) ? (int)$_COOKIE[$punkteCookieName] : 0;

// Cookie-Name für Länder (speichern als String)
$landCookieName = "land";

// Überprüfen, ob das Länder-Cookie existiert
if (isset($_COOKIE[$landCookieName])) {
    // Cookie-Wert wieder in ein Array umwandeln
    $leander = explode(",", $_COOKIE[$landCookieName]);
    $hauptland = array_shift($leander); // Hauptland ist das erste Element
} else {
    // Falls kein Cookie vorhanden ist, neue Daten setzen
    $leander = [];
    $hauptland = null;
}




// Arrays für jeden Kontinent
$arrayeuropa = array('Albanien', 'Andorra', 'Belgien', 'Bosnien und Herzegowina', 'Bulgarien', 'Dänemark', 'Deutschland', 'Estland', 'Finnland', 'Frankreich', 'Griechenland', 'Irland', 'Island', 'Italien', 'Kosovo', 'Kroatien', 'Lettland', 'Liechtenstein', 'Litauen', 'Luxemburg', 'Malta', 'Moldau', 'Monaco', 'Montenegro', 'Niederlande', 'Nordmazedonien', 'Norwegen', 'Österreich', 'Polen', 'Portugal', 'Rumänien', 'San Marino', 'Schweden', 'Schweiz', 'Serbien', 'Slowakei', 'Slowenien', 'Spanien', 'Tschechien', 'Ukraine', 'Ungarn', 'Vatikanstadt', 'Vereinigtes Königreich', 'Weißrussland');
$arrayasien = array('Afghanistan', 'Armenien', 'Aserbaidschan', 'Bahrain', 'Bangladesch', 'Bhutan', 'Brunei', 'China', 'Georgien', 'Indien', 'Indonesien', 'Iran', 'Irak', 'Israel', 'Japan', 'Jemen', 'Jordanien', 'Kambodscha', 'Kasachstan', 'Katar', 'Kirgisistan', 'Kuwait', 'Laos', 'Libanon', 'Malaysia', 'Malediven', 'Mongolei', 'Myanmar', 'Nepal', 'Nordkorea', 'Oman', 'Pakistan', 'Philippinen', 'Saudi-Arabien', 'Singapur', 'Südkorea', 'Sri Lanka', 'Syrien', 'Tadschikistan', 'Thailand', 'Timor-Leste', 'Turkmenistan', 'Usbekistan', 'Vereinigte Arabische Emirate', 'Vietnam', 'Zypern');
$arrayafrika = array('Ägypten', 'Algerien', 'Angola', 'Äthiopien', 'Benin', 'Botswana', 'Burkina Faso', 'Burundi', 'Elfenbeinküste', 'Gabun', 'Gambia', 'Ghana', 'Kamerun', 'Kenia', 'Lesotho', 'Liberia', 'Madagaskar', 'Malawi', 'Mali', 'Marokko', 'Mosambik', 'Namibia', 'Niger', 'Nigeria', 'Ruanda', 'Sambia', 'Senegal', 'Sierra Leone', 'Simbabwe', 'Südafrika', 'Sudan', 'Tansania', 'Togo', 'Uganda');
$arraynordamerika = array('Antigua und Barbuda', 'Bahamas', 'Barbados', 'Belize', 'Kanada', 'Costa Rica', 'Dominikanische Republik', 'El Salvador', 'Grenada', 'Guatemala', 'Haiti', 'Honduras', 'Jamaika', 'Mexiko', 'Nicaragua', 'Panama', 'St. Kitts und Nevis', 'St. Lucia', 'St. Vincent und die Grenadinen', 'Trinidad und Tobago', 'Vereinigte Staaten');
$arraysuedamerika = array('Argentinien', 'Bolivien', 'Brasilien', 'Chile', 'Ecuador', 'Guyana', 'Kolumbien', 'Paraguay', 'Peru', 'Suriname', 'Uruguay', 'Venezuela');
$arrayaustralien = array('Australien', 'Fidschi', 'Kiribati', 'Marshallinseln', 'Mikronesien', 'Nauru', 'Neuseeland', 'Palau', 'Papua-Neuguinea', 'Salomonen', 'Samoa', 'Tonga', 'Tuvalu', 'Vanuatu');


// Eingabe überprüfen und Kontinent ermitteln
if (isset($_POST['race'])) {
    $country = $_POST['race'];
    $benutzerAntwort = $_POST['race'];


    if (in_array($country, $arrayeuropa)) {

        if(in_array($hauptland, $arrayeuropa)){
            echo 'Der kontinent ist richtig du bekommst einen Punkt <br><br>';
            $punkte ++;

            if ($benutzerAntwort == $hauptland) {
                echo 'Du hast das Land richtig geraten! Plus 4 Punkte<br>';
                // Punktestand um 2 erhöhen
                $punkte += 4;
            } 
            elseif (in_array($benutzerAntwort, $leander)) {
                echo 'Du hast ein Nachbarland richtig geraten! Du bekommst 2 Punkte. Das Richtige Land ist :'.$hauptland.'<br>';
                // Punktestand um 1 erhöhen für ein Nachbarland
                $punkte += 2;
            }
            else{

                echo 'Das Land war falsch richtig wäre '.$hauptland.'.';

            }

            

        }
        else{

            echo 'Der Kontinent war nicht Europa.<br><br>';

            if (in_array($benutzerAntwort, $leander)) {
            echo 'Du hast ein Nachbarland richtig geraten! Du bekommst 2 Punkte. Das Richtige Land ist :'.$hauptland.'<br>';
            // Punktestand um 1 erhöhen für ein Nachbarland
            $punkte += 2;
            }
            else{

                echo 'Das Land war falsch richtig wäre '.$hauptland.'.';

            }
            }

    }

    elseif (in_array($country, $arrayafrika)) {

        if(in_array($hauptland, $arrayafrika)){
            echo 'Der kontinent ist richtig du bekommst einen Punkt <br><br>';
            $punkte ++;

            if ($benutzerAntwort == $hauptland) {
                echo 'Du hast das Land richtig geraten! Plus 4 Punkte<br>';
                // Punktestand um 2 erhöhen
                $punkte += 4;
            } elseif (in_array($benutzerAntwort, $leander)) {
                echo 'Du hast ein Nachbarland richtig geraten! Du bekommst 2 Punkte. Das Richtige Land ist :'.$hauptland.'<br>';
                // Punktestand um 1 erhöhen für ein Nachbarland
                $punkte += 2;
            }
            else{

                echo 'Das Land war falsch richtig wäre '.$hauptland.'.';

            }
        

        }
        else{

            echo 'Der Kontinent war nicht Afrika.<br><br>';

            if (in_array($benutzerAntwort, $leander)) {
            echo 'Du hast ein Nachbarland richtig geraten! Du bekommst 2 Punkte. Das Richtige Land ist :'.$hauptland.'<br>';
            // Punktestand um 1 erhöhen für ein Nachbarland
            $punkte += 2;
            }
            else{

                echo 'Das Land war falsch richtig wäre '.$hauptland.'.';

            }
            }

    }

    elseif (in_array($country, $arrayasien)) {

        if(in_array($hauptland, $arrayasien)){
            echo 'Der kontinent ist richtig du bekommst einen Punkt <br><br>';
            $punkte ++;

            if ($benutzerAntwort == $hauptland) {
                echo 'Du hast das Land richtig geraten! Plus 4 Punkte<br>';
                // Punktestand um 2 erhöhen
                $punkte += 4;
            } elseif (in_array($benutzerAntwort, $leander)) {
                echo 'Du hast ein Nachbarland richtig geraten! Du bekommst 2 Punkte. Das Richtige Land ist :'.$hauptland.'<br>';
                // Punktestand um 1 erhöhen für ein Nachbarland
                $punkte += 2;
            }
            else{

                echo 'Das Land war falsch richtig wäre '.$hauptland.'.';

            }
        

        }
        else{

            echo 'Der Kontinent war nicht Asien.<br><br>';

            if (in_array($benutzerAntwort, $leander)) {
            echo 'Du hast ein Nachbarland richtig geraten! Du bekommst 2 Punkte. Das Richtige Land ist :'.$hauptland.'<br>';
            // Punktestand um 1 erhöhen für ein Nachbarland
            $punkte += 2;
            }
            else{

                echo 'Das Land war falsch richtig wäre '.$hauptland.'.';

            }
            }

    }

    elseif (in_array($country, $arraynordamerika)) {

        if(in_array($hauptland, $arraynordamerika)){
            echo 'Der kontinent ist richtig du bekommst einen Punkt <br><br>';
            $punkte ++;

            if ($benutzerAntwort == $hauptland) {
                echo 'Du hast das Land richtig geraten! Plus 4 Punkte<br>';
                // Punktestand um 2 erhöhen
                $punkte += 4;
            } elseif (in_array($benutzerAntwort, $leander)) {
                echo 'Du hast ein Nachbarland richtig geraten! Du bekommst 2 Punkte. Das Richtige Land ist :'.$hauptland.'<br>';
                // Punktestand um 1 erhöhen für ein Nachbarland
                $punkte += 2;
            }
            else{

                echo 'Das Land war falsch richtig wäre '.$hauptland.'.';

            }
        

        }
        else{

            echo 'Der Kontinent war nicht Nordamerika.<br><br>';

            if (in_array($benutzerAntwort, $leander)) {
            echo 'Du hast ein Nachbarland richtig geraten! Du bekommst 2 Punkte. Das Richtige Land ist :'.$hauptland.'<br>';
            // Punktestand um 1 erhöhen für ein Nachbarland
            $punkte += 2;
            }
            else{

                echo 'Das Land war falsch richtig wäre '.$hauptland.'.';

            }
            }

    }

    elseif (in_array($country, $arraysuedamerika)) {

        if(in_array($hauptland, $arraysuedamerika)){
            echo 'Der kontinent ist richtig du bekommst einen Punkt <br><br>';
            $punkte ++;

            if ($benutzerAntwort == $hauptland) {
                echo 'Du hast das Land richtig geraten! Plus 4 Punkte<br>';
                // Punktestand um 2 erhöhen
                $punkte += 4;
            } elseif (in_array($benutzerAntwort, $leander)) {
                echo 'Du hast ein Nachbarland richtig geraten! Du bekommst 2 Punkte. Das Richtige Land ist :'.$hauptland.'<br>';
                // Punktestand um 1 erhöhen für ein Nachbarland
                $punkte += 2;
            }
            else{

                echo 'Das Land war falsch richtig wäre '.$hauptland.'.';

            }
        

        }
        else{

            echo 'Der Kontinent war nicht Südamerika.<br><br>';

            if (in_array($benutzerAntwort, $leander)) {
            echo 'Du hast ein Nachbarland richtig geraten! Du bekommst 2 Punkte. Das Richtige Land ist :'.$hauptland.'<br>';
            // Punktestand um 1 erhöhen für ein Nachbarland
            $punkte += 2;
            }
            else{

                echo 'Das Land war falsch richtig wäre '.$hauptland.'.';

            }
            }

    }

    elseif (in_array($country, $arrayaustralien)) {

        if(in_array($hauptland, $arrayaustralien)){
            echo 'Der kontinent ist richtig du bekommst einen Punkt <br><br>';
            $punkte ++;

            if ($benutzerAntwort == $hauptland) {
                echo 'Du hast das Land richtig geraten! Plus 4 Punkte<br>';
                // Punktestand um 2 erhöhen
                $punkte += 4;
            } elseif (in_array($benutzerAntwort, $leander)) {
                echo 'Du hast ein Nachbarland richtig geraten! Du bekommst 2 Punkte. Das Richtige Land ist :'.$hauptland.'<br>';
                // Punktestand um 1 erhöhen für ein Nachbarland
                $punkte += 2;
            }
            else{

                echo 'Das Land war falsch richtig wäre '.$hauptland.'.';

            }
       
        }
         else{

            echo 'Der Kontinent war nicht Australien.<br><br>';

            if (in_array($benutzerAntwort, $leander)) {
            echo 'Du hast ein Nachbarland richtig geraten! Du bekommst 2 Punkte. Das Richtige Land ist :'.$hauptland.'<br>';
            // Punktestand um 1 erhöhen für ein Nachbarland
            $punkte += 2;
            }
            else{

                echo 'Das Land war falsch richtig wäre '.$hauptland.'.';

            }
            }


    }
}


// if ($benutzerAntwort == $hauptland) {
//     echo 'Du hast das Land richtig geraten! Plus 4 Punkte<br>';
//     // Punktestand um 2 erhöhen
//     $punkte += 4;
// } elseif (in_array($benutzerAntwort, $leander)) {
//     echo 'Du hast ein Nachbarland richtig geraten! Du bekommst 2 Punkte. Das Richtige Land ist :'.$hauptland.'<br>';
//     // Punktestand um 1 erhöhen für ein Nachbarland
//     $punkte += 2;
// } else {
//     echo 'Du hast falsch geraten. Die richtige Antwort war: ' . $hauptland . '<br>';
// }


// Beispielbilder und erwartete Länder
$hallo = array(
    'AfganeM - Afghanistan - Pakistan - Iran - Turkmenistan - Usbekistan - Tadschikistan - China', 
    'AfganeW - Afghanistan - Pakistan - Iran - Turkmenistan - Usbekistan - Tadschikistan - Kirgisistan',
    'AlbanerM - Albanien - Montenegro - Kosovo - Nordmazedonien - Griechenland',
    'AlbanerW - Albanien - Montenegro - Kosovo - Nordmazedonien - Griechenland',
    'AlgererM - Algerien - Tunesien - Libyen - Niger - Mali - Mauretanien - Marokko',
    'AlgererW - Algerien - Tunesien - Libyen - Niger - Mali - Mauretanien - Marokko',
    'AngolerM - Angola - Namibia - Sambia - Demokratische Republik Kongo',
    'AngolerW - Angola - Namibia - Sambia - Demokratische Republik Kongo',
    'ArgentinerM - Argentinien - Chile - Bolivien - Paraguay - Brasilien - Uruguay',
    'ArgentinerW - Argentinien - Chile - Bolivien - Paraguay - Brasilien - Uruguay',
    'ArmenerM - Armenien - Georgien - Aserbaidschan - Türkei - Iran',
    'ArmenerW - Armenien - Georgien - Aserbaidschan - Türkei - Iran',
    'AserbaidschanerM - Aserbaidschan - Georgien - Armenien - Iran - Russland',
    'AserbaidschanerW - Aserbaidschan - Georgien - Armenien - Iran - Russland',
    'ÄgypterM - Ägypten - Libyen - Sudan - Israel - Gazastreifen',
    'ÄgypterW - Ägypten - Libyen - Sudan - Israel - Gazastreifen',
    'ÄquatorialguineerM - Äquatorialguinea - Gabun - Kamerun',
    'ÄquatorialguineerW - Äquatorialguinea - Gabun - Kamerun',
    'ÄthiopierM - Äthiopien - Eritrea - Dschibuti - Somalia - Kenia - Sudan - Südsudan',
    'ÄthiopierW - Äthiopien - Eritrea - Dschibuti - Somalia - Kenia - Sudan - Südsudan',
    'AustralischerM - Australien - keine',
    'AustralischerW - Australien - keine',
    'BahamasM - Bahamas - keine',
    'BahamasW - Bahamas - keine',
    'BahrainM - Bahrain - keine',
    'BahrainW - Bahrain - keine',
    'BangladeschM - Bangladesch - Indien - Myanmar',
    'BangladeschW - Bangladesch - Indien - Myanmar',
    'BarbadosM - Barbados - keine',
    'BarbadosW - Barbados - keine',
    'BelgienM - Belgien - Niederlande - Deutschland - Luxemburg - Frankreich',
    'BelgienW - Belgien - Niederlande - Deutschland - Luxemburg - Frankreich',
    'BelizeM - Belize - Mexiko - Guatemala',
    'BelizeW - Belize - Mexiko - Guatemala',
    'BeninM - Benin - Togo - Burkina Faso - Niger - Nigeria',
    'BeninW - Benin - Togo - Burkina Faso - Niger - Nigeria',
    'BhutanM - Bhutan - China - Indien',
    'BhutanW - Bhutan - China - Indien',
    'BolivienM - Bolivien - Peru - Brasilien - Paraguay - Argentinien - Chile',
    'BolivienW - Bolivien - Peru - Brasilien - Paraguay - Argentinien - Chile',
    'Bosnien und HerzegowinaM - Bosnien und Herzegowina - Kroatien - Serbien - Montenegro',
    'Bosnien und HerzegowinaW - Bosnien und Herzegowina - Kroatien - Serbien - Montenegro',
    'BotswanaM - Botswana - Namibia - Sambia - Simbabwe - Südafrika',
    'BotswanaW - Botswana - Namibia - Sambia - Simbabwe - Südafrika',
    'BrasilienM - Brasilien - Französisch-Guayana - Suriname - Guyana - Venezuela - Kolumbien - Peru - Bolivien - Paraguay - Argentinien - Uruguay',
    'BrasilienW - Brasilien - Französisch-Guayana - Suriname - Guyana - Venezuela - Kolumbien - Peru - Bolivien - Paraguay - Argentinien - Uruguay',
    'BruneiM - Brunei - Malaysia',
    'BruneiW - Brunei - Malaysia',
    'BulgarienM - Bulgarien - Rumänien - Serbien - Nordmazedonien - Griechenland - Türkei',
    'BulgarienW - Bulgarien - Rumänien - Serbien - Nordmazedonien - Griechenland - Türkei',
    'Burkina FasoM - Burkina Faso - Mali - Niger - Benin - Togo - Ghana - Elfenbeinküste',
    'Burkina FasoW - Burkina Faso - Mali - Niger - Benin - Togo - Ghana - Elfenbeinküste',
    'BurundiM - Burundi - Ruanda - Tansania - Demokratische Republik Kongo',
    'BurundiW - Burundi - Ruanda - Tansania - Demokratische Republik Kongo',
    'ChileM - Chile - Peru - Bolivien - Argentinien',
    'ChileW - Chile - Peru - Bolivien - Argentinien',
    'ChinaM - China - Nordkorea - Russland - Mongolei - Kasachstan - Kirgisistan - Tadschikistan - Afghanistan - Pakistan - Indien - Nepal - Bhutan - Myanmar - Laos - Vietnam',
    'ChinaW - China - Nordkorea - Russland - Mongolei - Kasachstan - Kirgisistan - Tadschikistan - Afghanistan - Pakistan - Indien - Nepal - Bhutan - Myanmar - Laos - Vietnam',
    'Costa RicaM - Costa Rica - Nicaragua - Panama',
    'Costa RicaW - Costa Rica - Nicaragua - Panama',
    'DänemarkM - Dänemark - Deutschland',
    'DänemarkW - Dänemark - Deutschland',    
    'DeutschlandM - Deutschland - Dänemark - Polen - Tschechien - Österreich - Schweiz - Frankreich - Luxemburg - Belgien - Niederlande',
    'DeutschlandW - Deutschland - Dänemark - Polen - Tschechien - Österreich - Schweiz - Frankreich - Luxemburg - Belgien - Niederlande',
    'Dominikanische RepublikM - Dominikanische Republik - Haiti',
    'Dominikanische RepublikW - Dominikanische Republik - Haiti',
    
);

$anzahl = count($hallo);

// Prüfen, ob es ein neues Bild gibt

    // Zufälliges Bild und Länder setzen, falls noch kein Cookie vorhanden ist
    $rando = mt_rand(0, $anzahl - 1);
    list($image, $races) = explode(" - ", $hallo[$rando], 2);

    // Die Länder in ein Array umwandeln
    $leander = explode(" - ", $races);
    $hauptland = array_shift($leander); // Hauptland ist das erste Element

    // Speichern des Länder-Arrays im Cookie als String
    $landString = implode(",", $leander); // Array in String umwandeln
    setcookie($landCookieName, $hauptland . ',' . $landString, time() + (30 * 24 * 60 * 60), "/");



// Punkte und Zähler erhöhen, wenn eine Antwort gegeben wurde
if (isset($_POST['race'])) {
    // Zähler um 1 erhöhen
    $zaehler++;
    // Cookies aktualisieren
    setcookie($punkteCookieName, $punkte, time() + (30 * 24 * 60 * 60), "/");
    setcookie($zaehlerCookieName, $zaehler, time() + (30 * 24 * 60 * 60), "/");

    // Bild und Länder für die nächste Runde zurücksetzen
    unset($_COOKIE[$landCookieName]);
}

// Prüfen, ob der Zähler 10 erreicht hat
if ($zaehler < 10) {
    // Bild anzeigen (Beispielbild, sollte angepasst werden)
    echo '<img src="image/'.$image.'.jpg"><br><br>';
    // Punktestand anzeigen
    echo "Dein aktueller Punktestand: " . $punkte . "<br>";

    // Formular für die Benutzereingabe anzeigen
    $selectedCountry = isset($_POST['race']) ? $_POST['race'] : '';
    
    
    echo '<form method="post" style="display: flex; gap: 20px;">';

    // Europa-Liste
    echo '<details style="width: 200px;">';
        echo '<summary>Europa</summary>';
        echo '<select name="race" size="10" style="width: 100%; margin-top: 10px;">';
        echo '<option value="Albanien">Albanien</option>';
        echo '<option value="Andorra">Andorra</option>';
        echo '<option value="Belgien">Belgien</option>';
        echo '<option value="Bosnien und Herzegowina">Bosnien und Herzegowina</option>';
        echo '<option value="Bulgarien">Bulgarien</option>';
        echo '<option value="Dänemark">Dänemark</option>';
        echo '<option value="Deutschland">Deutschland</option>';
        echo '<option value="Estland">Estland</option>';
        echo '<option value="Finnland">Finnland</option>';
        echo '<option value="Frankreich">Frankreich</option>';
        echo '<option value="Griechenland">Griechenland</option>';
        echo '<option value="Irland">Irland</option>';
        echo '<option value="Island">Island</option>';
        echo '<option value="Italien">Italien</option>';
        echo '<option value="Kosovo">Kosovo</option>';
        echo '<option value="Kroatien">Kroatien</option>';
        echo '<option value="Lettland">Lettland</option>';
        echo '<option value="Liechtenstein">Liechtenstein</option>';
        echo '<option value="Litauen">Litauen</option>';
        echo '<option value="Luxemburg">Luxemburg</option>';
        echo '<option value="Malta">Malta</option>';
        echo '<option value="Moldau">Moldau</option>';
        echo '<option value="Monaco">Monaco</option>';
        echo '<option value="Montenegro">Montenegro</option>';
        echo '<option value="Niederlande">Niederlande</option>';
        echo '<option value="Nordmazedonien">Nordmazedonien</option>';
        echo '<option value="Norwegen">Norwegen</option>';
        echo '<option value="Österreich">Österreich</option>';
        echo '<option value="Polen">Polen</option>';
        echo '<option value="Portugal">Portugal</option>';
        echo '<option value="Rumänien">Rumänien</option>';
        echo '<option value="San Marino">San Marino</option>';
        echo '<option value="Schweden">Schweden</option>';
        echo '<option value="Schweiz">Schweiz</option>';
        echo '<option value="Serbien">Serbien</option>';
        echo '<option value="Slowakei">Slowakei</option>';
        echo '<option value="Slowenien">Slowenien</option>';
        echo '<option value="Spanien">Spanien</option>';
        echo '<option value="Tschechien">Tschechien</option>';
        echo '<option value="Ukraine">Ukraine</option>';
        echo '<option value="Ungarn">Ungarn</option>';
        echo '<option value="Vatikanstadt">Vatikanstadt</option>';
        echo '<option value="Vereinigtes Königreich">Vereinigtes Königreich</option>';
        echo '<option value="Weißrussland">Weißrussland</option>';
        echo '</select>';
    echo '</details>';
    
    // Asien-Liste
    echo '<details style="width: 200px;">';
        echo '<summary>Asien</summary>';
        echo '<select name="race" size="10" style="width: 100%; margin-top: 10px;">';
        echo '<option value="Afghanistan">Afghanistan</option>';
        echo '<option value="Armenien">Armenien</option>';
        echo '<option value="Aserbaidschan">Aserbaidschan</option>';
        echo '<option value="Bangladesch">Bangladesch</option>';
        echo '<option value="Bhutan">Bhutan</option>';
        echo '<option value="Brunei">Brunei</option>';
        echo '<option value="China">China</option>';
        echo '<option value="Georgien">Georgien</option>';
        echo '<option value="Indien">Indien</option>';
        echo '<option value="Indonesien">Indonesien</option>';
        echo '<option value="Irak">Irak</option>';
        echo '<option value="Iran">Iran</option>';
        echo '<option value="Israel">Israel</option>';
        echo '<option value="Japan">Japan</option>';
        echo '<option value="Jordanien">Jordanien</option>';
        echo '<option value="Kasachstan">Kasachstan</option>';
        echo '<option value="Katar">Katar</option>';
        echo '<option value="Kambodscha">Kambodscha</option>';
        echo '<option value="Kirgisistan">Kirgisistan</option>';
        echo '<option value="Laos">Laos</option>';
        echo '<option value="Libanon">Libanon</option>';
        echo '<option value="Malaysia">Malaysia</option>';
        echo '<option value="Malediven">Malediven</option>';
        echo '<option value="Mongolei">Mongolei</option>';
        echo '<option value="Myanmar">Myanmar</option>';
        echo '<option value="Nepal">Nepal</option>';
        echo '<option value="Nordkorea">Nordkorea</option>';
        echo '<option value="Oman">Oman</option>';
        echo '<option value="Pakistan">Pakistan</option>';
        echo '<option value="Philippinen">Philippinen</option>';
        echo '<option value="Saudi-Arabien">Saudi-Arabien</option>';
        echo '<option value="Singapur">Singapur</option>';
        echo '<option value="Südkorea">Südkorea</option>';
        echo '<option value="Syrien">Syrien</option>';
        echo '<option value="Tadschikistan">Tadschikistan</option>';
        echo '<option value="Thailand">Thailand</option>';
        echo '<option value="Turkmenistan">Turkmenistan</option>';
        echo '<option value="Usbekistan">Usbekistan</option>';
        echo '<option value="Vereinigte Arabische Emirate">Vereinigte Arabische Emirate</option>';
        echo '<option value="Vietnam">Vietnam</option>';
        echo '<option value="Jemen">Jemen</option>';
        echo '</select>';
    echo '</details>';

    // Afrika-Liste
    echo '<details style="width: 200px;">';
        echo '<summary>Afrika</summary>';
        echo '<select name="race" size="10" style="width: 100%; margin-top: 10px;">';
        echo '<option value="Ägypten">Ägypten</option>';
        echo '<option value="Algerien">Algerien</option>';
        echo '<option value="Angola">Angola</option>';
        echo '<option value="Äthiopien">Äthiopien</option>';
        echo '<option value="Benin">Benin</option>';
        echo '<option value="Botswana">Botswana</option>';
        echo '<option value="Burkina Faso">Burkina Faso</option>';
        echo '<option value="Burundi">Burundi</option>';
        echo '<option value="Elfenbeinküste">Elfenbeinküste</option>';
        echo '<option value="Gabun">Gabun</option>';
        echo '<option value="Gambia">Gambia</option>';
        echo '<option value="Ghana">Ghana</option>';
        echo '<option value="Kamerun">Kamerun</option>';
        echo '<option value="Kenia">Kenia</option>';
        echo '<option value="Lesotho">Lesotho</option>';
        echo '<option value="Liberia">Liberia</option>';
        echo '<option value="Madagaskar">Madagaskar</option>';
        echo '<option value="Malawi">Malawi</option>';
        echo '<option value="Mali">Mali</option>';
        echo '<option value="Marokko">Marokko</option>';
        echo '<option value="Mosambik">Mosambik</option>';
        echo '<option value="Namibia">Namibia</option>';
        echo '<option value="Niger">Niger</option>';
        echo '<option value="Nigeria">Nigeria</option>';
        echo '<option value="Ruanda">Ruanda</option>';
        echo '<option value="Sambia">Sambia</option>';
        echo '<option value="Senegal">Senegal</option>';
        echo '<option value="Sierra Leone">Sierra Leone</option>';
        echo '<option value="Simbabwe">Simbabwe</option>';
        echo '<option value="Südafrika">Südafrika</option>';
        echo '<option value="Sudan">Sudan</option>';
        echo '<option value="Tansania">Tansania</option>';
        echo '<option value="Togo">Togo</option>';
        echo '<option value="Uganda">Uganda</option>';
        echo '</select>';
    echo '</details>';

    // Nordamerika-Liste
    echo '<details style="width: 200px;">';
        echo '<summary>Nordamerika</summary>';
        echo '<select name="race" size="10" style="width: 100%; margin-top: 10px;">';
        echo '<option value="Antigua und Barbuda">Antigua und Barbuda</option>';
        echo '<option value="Bahamas">Bahamas</option>';
        echo '<option value="Barbados">Barbados</option>';
        echo '<option value="Belize">Belize</option>';
        echo '<option value="Kanada">Kanada</option>';
        echo '<option value="Costa Rica">Costa Rica</option>';
        echo '<option value="Dominikanische Republik">Dominikanische Republik</option>';
        echo '<option value="El Salvador">El Salvador</option>';
        echo '<option value="Grenada">Grenada</option>';
        echo '<option value="Guatemala">Guatemala</option>';
        echo '<option value="Haiti">Haiti</option>';
        echo '<option value="Honduras">Honduras</option>';
        echo '<option value="Jamaika">Jamaika</option>';
        echo '<option value="Mexiko">Mexiko</option>';
        echo '<option value="Nicaragua">Nicaragua</option>';
        echo '<option value="Panama">Panama</option>';
        echo '<option value="St. Kitts und Nevis">St. Kitts und Nevis</option>';
        echo '<option value="St. Lucia">St. Lucia</option>';
        echo '<option value="St. Vincent und die Grenadinen">St. Vincent und die Grenadinen</option>';
        echo '<option value="Trinidad und Tobago">Trinidad und Tobago</option>';
        echo '<option value="Vereinigte Staaten">Vereinigte Staaten</option>';
        echo '</select>';
    echo '</details>';


    // Südamerika-Liste
    echo '<details style="width: 200px;">';
        echo '<summary>Südamerika</summary>';
        echo '<select name="race" size="10" style="width: 100%; margin-top: 10px;">';
        echo '<option value="Argentinien">Argentinien</option>';
        echo '<option value="Bolivien">Bolivien</option>';
        echo '<option value="Brasilien">Brasilien</option>';
        echo '<option value="Chile">Chile</option>';
        echo '<option value="Ecuador">Ecuador</option>';
        echo '<option value="Guyana">Guyana</option>';
        echo '<option value="Kolumbien">Kolumbien</option>';
        echo '<option value="Paraguay">Paraguay</option>';
        echo '<option value="Peru">Peru</option>';
        echo '<option value="Suriname">Suriname</option>';
        echo '<option value="Uruguay">Uruguay</option>';
        echo '<option value="Venezuela">Venezuela</option>';
        echo '</select>';
    echo '</details>';

    // Australien/Ozeanien-Liste
    echo '<details style="width: 200px;">';
        echo '<summary>Australien</summary>';
        echo '<select name="race" size="10" style="width: 100%; margin-top: 10px;">';
        echo '<option value="Australien">Australien</option>';
        echo '<option value="Fidschi">Fidschi</option>';
        echo '<option value="Kiribati">Kiribati</option>';
        echo '<option value="Marshallinseln">Marshallinseln</option>';
        echo '<option value="Mikronesien">Mikronesien</option>';
        echo '<option value="Nauru">Nauru</option>';
        echo '<option value="Neuseeland">Neuseeland</option>';
        echo '<option value="Palau">Palau</option>';
        echo '<option value="Papua-Neuguinea">Papua-Neuguinea</option>';
        echo '<option value="Salomonen">Salomonen</option>';
        echo '<option value="Samoa">Samoa</option>';
        echo '<option value="Tonga">Tonga</option>';
        echo '<option value="Tuvalu">Tuvalu</option>';
        echo '<option value="Vanuatu">Vanuatu</option>';
        echo '</select>';
    echo '</details>';
    
echo '<br>';
echo '<button type="submit" style="margin-top: 20px;">Raten</button>';
echo '</form>';

} else {
    echo "Du hast " . $punkte . "Punkte erreicht<br>";
    // Wenn der Zähler 10 erreicht hat, Endauswertung
    if ($punkte == 0) {
        echo 'Entweder bist du dumm oder woke.';
    } elseif ($punkte >= 1 && $punkte <= 3) {
        echo 'Na immerhin ein paar Punkte.';
    } elseif ($punkte >= 4 && $punkte <= 6) {
        echo 'Halbe Miete ist drin.';
    } elseif ($punkte >= 7 && $punkte <= 9) {
        echo 'Ziemlich rassistisch, aber noch nicht ganz.';
    } elseif ($punkte == 10) {
        echo '100% rassistisch, du willst bestimmt wieder Master-Slave-Kategorien in Git einführen.';
    }

    // Zähler und Punkte zurücksetzen
    $zaehler = 0;
    $punkte = 0;

    setcookie($zaehlerCookieName, $zaehler, time() + (30 * 24 * 60 * 60), "/");
    setcookie($punkteCookieName, $punkte, time() + (30 * 24 * 60 * 60), "/");

    // Button zum Neustarten
    echo '<form method="get"><button type="submit">Neu starten</button></form>';

}
echo 'Achtung das ist Satire nicht ernstnemen';
?>
    </div>
</body>
</html>


