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
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // it disabled the emulation mode
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
// $statement = $pdo->prepare("SELECT * FROM posts WHERE author = ? && is_published = ?");

// $statement->execute([$author, $is_published]);
// $postCount = $statement->rowCount();

// echo "{$author} has {$postCount} available posts";


// Insert/Create Data
// $title = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, assumenda!";
// $body = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis dignissimos corrupti voluptate rem voluptatibus dolorem quas amet porro? Nisi, accusamus. Assumenda a adipisci optio voluptate cumque tenetur incidunt dolores totam?";
// $author = "Al Nahian";

// $statement = $pdo->prepare("INSERT posts(title, body, author) VALUES(:title, :body,:author)");

// $statement->execute(["title" => $title, "body" => $body, "author" => $author,]);
// echo "Post Added";


// Update Data
// $id = 5;
// $title = "Lorem ipsum updated title";
// $body = "Post body updated";

// $statement = $pdo->prepare("UPDATE posts SET title = :title, body = :body WHERE id = :id");

// $statement->execute(["id" => $id, "title" => $title, "body" => $body]);
// echo "Post Updated";


// Delete Data
// $id = 4;
// $statement = $pdo->prepare("DELETE FROM posts WHERE id = ?");
// $statement->execute([$id]);
// echo "Post Deleted";


// Search Data
// $search = "%lorem%"; // case insensitive
// $statement = $pdo->prepare("SELECT * FROM posts WHERE title LIKE ?");
// $statement->execute([$search]);
// $posts = $statement->fetchAll();

// foreach ($posts as $post) {
//     echo "Match Found in: {$post->title} <br>";
// }


/**
 * While we're trying to limit posts using positional parameter,
 * then we must need to configure and disable emulation mode first.
 * Otherwise it will copy the value like this "LIMIT 2 2" and won't work.
 * */

// Limit How Many Rows Data to Be Shown
$limit = 2;

$statement = $pdo->prepare("SELECT * FROM posts WHERE author = ? LIMIT ?");
$statement->execute(["Al Nahian", $limit]);
$posts = $statement->fetchAll();

foreach ($posts as $post) {
    echo "{$post->title} <br>";
}
?>