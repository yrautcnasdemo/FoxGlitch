<?php
session_start();
// Supprime une variable
unset($_SESSION["user"]);

header("location: index.php");