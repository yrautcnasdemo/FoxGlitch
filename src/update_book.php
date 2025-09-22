<?php
session_start();
require_once "pdo/connexionBDD.php";

if (!empty($_POST)) {
    $book_id = (int) $_POST["id"];
    $user_id = $_SESSION["user"]["id"];

    // Vérifier que le livre appartient à l’utilisateur
    $check = $db->prepare("SELECT id FROM user_books WHERE id = :id AND user_id = :user_id");
    $check->execute([":id" => $book_id, ":user_id" => $user_id]);
    if (!$check->fetch()) {
        die("⚠️ Unauthorized update.");
    }

    $title = strip_tags($_POST["title"]);
    $category = $_POST["category"];
    $volumeCount = (int)$_POST["volume_count"];
    $publication = $_POST["publication"];
    $owned_volumes = !empty($_POST["volumes"]) ? $_POST["volumes"] : [];
    $owned_volumes_json = json_encode($owned_volumes);

    $sql = "UPDATE user_books 
            SET title = :title, category = :category, volume_count = :volume_count, 
                publication = :publication, owned_volumes = :owned_volumes
            WHERE id = :id AND user_id = :user_id";

    $query = $db->prepare($sql);
    $query->bindValue(":title", $title, PDO::PARAM_STR);
    $query->bindValue(":category", $category, PDO::PARAM_STR);
    $query->bindValue(":volume_count", $volumeCount, PDO::PARAM_INT);
    $query->bindValue(":publication", $publication, PDO::PARAM_STR);
    $query->bindValue(":owned_volumes", $owned_volumes_json, PDO::PARAM_STR);
    $query->bindValue(":id", $book_id, PDO::PARAM_INT);
    $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);

    if ($query->execute()) {
        header("Location: backoffice.php?updated=1");
        exit;
    } else {
        echo "❌ Update failed.";
    }
}
