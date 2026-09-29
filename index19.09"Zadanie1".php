<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Funkcje PHP</title>
</head>
<body>

<h2>1. SUMA</h2>

<form method="post">
    <input type="number" name="suma1">
    <input type="number" name="suma2">
    <button type="submit" name="suma">Oblicz sumę</button>
</form>

<?php

function SUMA($liczba1, $liczba2)
{
    $wynik = $liczba1 + $liczba2;
    echo "Suma: " . $wynik;
}

function PODSTAWY($liczba1, $liczba2)
{
    $roznica = $liczba1 - $liczba2;
    $iloczyn = $liczba1 * $liczba2;

    echo "Różnica: " . $roznica . "<br>";
    echo "Iloczyn: " . $iloczyn . "<br>";

    if ($liczba2 == 0) {
        echo "Nie można dzielić przez 0";
    } else {
        echo "Iloraz: " . ($liczba1 / $liczba2);
    }
}

function KALKULATOR($liczba1, $liczba2, $operacja)
{
    switch ($operacja) {
        case "+":
            $rezultat = $liczba1 + $liczba2;
            break;

        case "-":
            $rezultat = $liczba1 - $liczba2;
            break;

        case "*":
            $rezultat = $liczba1 * $liczba2;
            break;

        case "/":
            if ($liczba2 == 0) {
                $rezultat = "Nie można dzielić przez 0";
            } else {
                $rezultat = $liczba1 / $liczba2;
            }
            break;

        default:
            $rezultat = "Nieprawidłowe działanie";
    }

    echo "<div id='wynik'>" . $rezultat . "</div>";
}

function MAKS($liczba1, $liczba2, $liczba3)
{
    $najwieksza = $liczba1;

    if ($liczba2 > $najwieksza) {
        $najwieksza = $liczba2;
    }

    if ($liczba3 > $najwieksza) {
        $najwieksza = $liczba3;
    }

    echo "Największa liczba: " . $najwieksza;
}

function WZROST($cm)
{
    if ($cm < 150) {
        echo "Niski";
    } elseif ($cm > 180) {
        echo "Wysoki";
    } else {
        echo "Średni";
    }
}

function BMI($cm, $kg)
{
    $metry = $cm / 100;
    $wynik = $kg / ($metry * $metry);

    if ($wynik < 18.5) {
        $tekst = "za mało!";
    } elseif ($wynik > 25) {
        $tekst = "za dużo!";
    } else {
        $tekst = "OK!";
    }

    echo "<div id='wynik'>" . round($wynik, 2) . " - " . $tekst . "</div>";
}

function STARSZY($pierwszaData, $drugaData)
{
    $pierwszaData = new DateTime($pierwszaData);
    $drugaData = new DateTime($drugaData);

    if ($pierwszaData < $drugaData) {
        echo "Pierwsza osoba jest starsza";
    } elseif ($pierwszaData > $drugaData) {
        echo "Druga osoba jest starsza";
    } else {
        echo "Osoby są w tym samym wieku";
    }
}

function PRZESTEPNY($liczba)
{
    $przestepny = ($liczba % 400 == 0) ||
                  ($liczba % 4 == 0 && $liczba % 100 != 0);

    if ($przestepny) {
        echo "Rok jest przestępny";
    } else {
        echo "Rok nie jest przestępny";
    }
}

function SILA($haslo)
{
    $ileZnakow = strlen($haslo);

    if ($ileZnakow <= 4) {
        echo "Hasło słabe";
    } elseif ($ileZnakow <= 8) {
        echo "Hasło średnie";
    } else {
        echo "Hasło mocne";
    }

    if (preg_match("/[0-9]/", $haslo) == 0) {
        echo "<br>Brak cyfry - hasło słabe";
    }

    if (preg_match("/[A-Z]/", $haslo) == 0) {
        echo "<br>Brak dużej litery - hasło słabe";
    }

    if (preg_match("/[a-z]/", $haslo) == 0) {
        echo "<br>Brak małej litery - hasło słabe";
    }

    if (preg_match("/[^a-zA-Z0-9]/", $haslo) == 0) {
        echo "<br>Brak znaku specjalnego - hasło słabe";
    }
}

function TROJKAT($bokA, $bokB, $bokC)
{
    $mozliwy = ($bokA + $bokB > $bokC) &&
               ($bokA + $bokC > $bokB) &&
               ($bokB + $bokC > $bokA);

    if ($mozliwy) {
        echo "Można utworzyć trójkąt";
    } else {
        echo "Nie można utworzyć trójkąta";
    }
}

function SZYFR($wiadomosc)
{
    $zaszyfrowany = "";

    for ($i = 0; $i < strlen($wiadomosc); $i++) {
        $litera = $wiadomosc[$i];

        if ($litera >= 'a' && $litera <= 'z') {
            $kod = ord($litera) + 2;

            if ($kod > ord('z')) {
                $kod -= 26;
            }

            $zaszyfrowany .= chr($kod);
        } else {
            $zaszyfrowany .= $litera;
        }
    }

    echo $zaszyfrowany;
}

if (isset($_POST["suma"])) {
    SUMA($_POST["suma1"], $_POST["suma2"]);
}

if (isset($_POST["podstawy"])) {
    PODSTAWY($_POST["podstawy1"], $_POST["podstawy2"]);
}

if (isset($_POST["kalkulator"])) {
    KALKULATOR(
        $_POST["kalk1"],
        $_POST["kalk2"],
        $_POST["dzialanie"]
    );
}

if (isset($_POST["maks"])) {
    MAKS(
        $_POST["maks1"],
        $_POST["maks2"],
        $_POST["maks3"]
    );
}

if (isset($_POST["wzrost"])) {
    WZROST($_POST["wzrost"]);
}

if (isset($_POST["bmi"])) {
    BMI(
        $_POST["bmiwzrost"],
        $_POST["bmiwaga"]
    );
}

if (isset($_POST["starszy"])) {
    STARSZY(
        $_POST["data1"],
        $_POST["data2"]
    );
}

if (isset($_POST["przestepny"])) {
    PRZESTEPNY($_POST["rok"]);
}

if (isset($_POST["sila"])) {
    SILA($_POST["haslo"]);
}

if (isset($_POST["trojkat"])) {
    TROJKAT(
        $_POST["bok1"],
        $_POST["bok2"],
        $_POST["bok3"]
    );
}

if (isset($_POST["szyfr"])) {
    SZYFR($_POST["tekst"]);
}

?>

<hr>

<h2>2. PODSTAWY</h2>

<form method="post">
    <input type="number" step="any" name="podstawy1">
    <input type="number" step="any" name="podstawy2">
    <button type="submit" name="podstawy">Oblicz</button>
</form>

<h2>3. KALKULATOR</h2>

<form method="post">
    <input type="number" step="any" name="kalk1">
    <input type="number" step="any" name="kalk2">

    <select name="dzialanie">
        <option value="+">Suma</option>
        <option value="-">Różnica</option>
        <option value="*">Iloczyn</option>
        <option value="/">Iloraz</option>
    </select>

    <button type="submit" name="kalkulator">Oblicz</button>
</form>

<h2>4. MAKS</h2>

<form method="post">
    <input type="number" name="maks1">
    <input type="number" name="maks2">
    <input type="number" name="maks3">
    <button type="submit" name="maks">Sprawdź</button>
</form>

<h2>5. WZROST</h2>

<form method="post">
    <input type="number" name="wzrost">
    <button type="submit" name="wzrost">Sprawdź</button>
</form>

<h2>6. BMI</h2>

<form method="post">
    <input type="number" step="any" name="bmiwzrost" placeholder="Wzrost cm">
    <input type="number" step="any" name="bmiwaga" placeholder="Waga kg">
    <button type="submit" name="bmi">Oblicz BMI</button>
</form>

<h2>7. STARSZY</h2>

<form method="post">
    <input type="date" name="data1">
    <input type="date" name="data2">
    <button type="submit" name="starszy">Sprawdź</button>
</form>

<h2>8. PRZESTĘPNY</h2>

<form method="post">
    <input type="number" name="rok">
    <button type="submit" name="przestepny">Sprawdź</button>
</form>

<h2>9. SIŁA HASŁA</h2>

<form method="post">
    <input type="text" name="haslo">
    <button type="submit" name="sila">Sprawdź</button>
</form>

<h2>10. TRÓJKĄT</h2>

<form method="post">
    <input type="number" name="bok1">
    <input type="number" name="bok2">
    <input type="number" name="bok3">
    <button type="submit" name="trojkat">Sprawdź</button>
</form>

<h2>11. SZYFR</h2>

<form method="post">
    <input type="text" name="tekst">
    <button type="submit" name="szyfr">Szyfruj</button>
</form>

</body>
</html>
