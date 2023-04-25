<?php
session_start();
//pdo connection
$pdo = new PDO('mysql:host=localhost;dbname=cse_bd', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],);
 
