<?php

/**
 * This is a PHP project to learn about PDO (PHP Data Object) from basic. Course instructor is Brad Traversy. Tutorial Link: https://youtu.be/kEW6f7Pilc4
 */

//  Database info
$host = "localhost";
$user = "root";
$password = "";
$dbname = "pdo";


// Set DSN (Data Source Name)
$dsn = "mysql:host={$host}; dbname={$dbname}";

// Create a PDO instance
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
/* if we set a default attribute, then we don't have to define a fetch mode again on the loop. But we can override a default method if we want */

// PDO Query
$statement = $pdo->query("SELECT * FROM posts");

// Fetch the db data and iterate through a while loop
// while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
//     echo $row["title"] . "<br>";
// }

// while ($row = $statement->fetch()) {
//     echo $row->title . "<br>";
// }
