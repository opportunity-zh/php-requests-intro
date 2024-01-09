<?php
if (session_status() === PHP_SESSION_NONE)
{
    session_start(); // Startet die Session, bzw. stellt sie wieder her, falls vorhanden.
}
session_unset(); // löscht alle session variablen
session_destroy(); // löscht die session
header("Location: /index.php"); // leitet den benutzer auf die index.php weiter
    
