<?php

// Wenn die Session noch nicht gestartet wurde, starte sie.
if (session_status() === PHP_SESSION_NONE)
{
    // Startet die Session, bzw. stellt sie wieder her, falls vorhanden.
    session_start();
}

// Funktion um den Benutzer einzuloggen
function login($username, $password)
{
    /*
        Pseudo Datenbank mit Benutzername und Passwort.
        Hier wäre sonst eine Datenbankabfrage.
    */
    $db_username= 'admin';
    $db_password = '1234';
    

    /* 
        Vergleicht den Benutzernamen und das Passwort mit den Daten aus der Datenbank.
        Wenn die Daten übereinstimmen, gib true zurück, ansonsten false.
    */
    if($username == $db_username && $password == $db_password)
    {
        return true;
    }else{
        return false;
    }
}

// Wenn die Anfrage eine POST Anfrage ist, dann führe den Code aus.
if($_SERVER['REQUEST_METHOD'] == 'POST')
{ 
    // Speichere die Benutzerdaten aus dem Formular in Variablen.
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if(login($username, $password)) 
    {
        // Wenn der Benutzername und das Passwort übereinstimmen, dann speichere den Benutzernamen in der Session.
        $_SESSION['username'] = $username;
        header("Location: /dashboard.php");
    }else{
        header("Location: /index.php");
    }
}else{
    header("Location: /index.php");
}
