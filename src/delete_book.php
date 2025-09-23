<?php
session_start();
require_once "pdo/connexionBDD.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("⚠️ Aucun livre spécifié.");
}

$book_id = (int) $_GET['id'];
$user_id = $_SESSION['user']['id'];

// Supprimer uniquement si le livre appartient à l'utilisateur
$sql = "DELETE FROM user_books WHERE id = :id AND user_id = :user_id";
$query = $db->prepare($sql);
$query->bindValue(":id", $book_id, PDO::PARAM_INT);
$query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
$query->execute();

// Retour vers le backoffice
header("Location: backoffice.php");
exit;
