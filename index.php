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


// User Inputs
$author = "Al Nahian";
$is_published = true;
$id = 1;
// PDO Query
// $statement = $pdo->query("SELECT * FROM posts");

// Fetch the db data and iterate through a while loop
// while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
//     echo $row["title"] . "<br>";
// }

// while ($row = $statement->fetch()) {
//     echo $row->title . "<br>";
// }


// Prepared Statements (Prepare & Execute). Let's fetch some posts with prepared statement, which is the safe way!

// Positional Prameters
// $sql = "SELECT * FROM posts WHERE author = ?"; // '?' is like a placeholder.
// $author = "Al Nahian";
// $statement = $pdo->prepare($sql); // prepare the sql

// $statement->execute([$author]);
// // execute is too sensitive. we have to maintain order if we are using multiple placeholder in our sql

// $posts = $statement->fetchAll(); // fetch all the data

// Named Parameters
// $sql = "SELECT * FROM posts WHERE author = :author && :is_published = is_published";
// $author = "Kevin Malone";
// $statement = $pdo->prepare($sql);
// $statement->execute(["author" => $author, "is_published" => $is_published]);
// $posts = $statement->fetchAll();

// // Show all data using a foreach loop
// foreach ($posts as $post) {
//     echo "ID:{$post->id} {$post->title} [{$post->is_published}] <br>";
// }


// Fetch Single Post
// $sql = "SELECT * FROM posts WHERE id = :id";
// $statement = $pdo->prepare($sql);
// $statement->execute(["id" => $id]);
// $post = $statement->fetch();

// $time = strtotime($post->date);
// $date = date("h:i:s D m, Y", $time);
// 
?>

<!--
<h1><? //echo $post->title; 
    ?></h1>
<small><? //echo $date; 
        ?></small>
<p><? //echo $post->body; 
    ?></p>
-->


<?php
// Get Row Count
$statement = $pdo->prepare("SELECT * FROM posts WHERE author = ? && is_published = ?");

$statement->execute([$author, $is_published]);
$postCount = $statement->rowCount();

echo "{$author} has {$postCount} available posts";
?>