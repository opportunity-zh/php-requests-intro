<?php
// startet die Session, bzw. stellt sie wieder her, falls vorhanden.
if (session_status() === PHP_SESSION_NONE)
{
    session_start();
}

// Wenn der Benutzer nicht eingeloggt (nicht vorhanden) ist, dann leite ihn auf die index.php weiter.
if(!isset($_SESSION['username']))
{

    // Holt die IP Adresse des Benutzers
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    
    // Schreibt die IP Adresse des Benutzers in eine Log Datei
    // du kannst diese Datei im Ordner /log/login-activity.txt finden.
    $logFile = fopen($_SERVER["DOCUMENT_ROOT"] . "/../log/login-activity.txt", "a") or die("Unable to open file!");
    $txt = date("Y-m-d h:i:sa") . " from IP " . $ip . ': An anonymous user tried to access the route "' .$_SERVER['PHP_SELF'] . "\n";
    fwrite($logFile, $txt);
    fclose($logFile);
    
    // leitet den Benutzer auf die index.php weiter.
    header("Location: /index.php");
} 



