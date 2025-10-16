<?php
// Démarre la session uniquement si nécessaire
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Supprime toutes les variables de session
$_SESSION = [];

// Détruit complètement la session
session_destroy();

// Redirige vers la page d’accueil
header("Location: index.php");
exit;
