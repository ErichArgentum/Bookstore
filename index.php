
<?php
$host = '127.0.0.1';
$db   = 'Books';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

//var_dump($_GET);

$title= $_GET['title'];
$year= $_GET['year'];
$stmt = $pdo->prepare('SELECT title, first_name, last_name, release_date, authors.id
FROM books
LEFT JOIN book_authors ON books.id=book_authors.book_id 
LEFT JOIN authors ON authors.id=book_authors.author_id 
WHERE title LIKE :title AND release_date=:year');
$stmt->execute(['title'=> '%' . $title . '%', 'year' => $year]); 
?>
<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <body>
    </head>
    <h1>Otsing</h1>
    <form action="index.php" method="get">
        <input type="text" name="title" placeholder="Pealkiri" style="margin: 4px">
        <br>
        <form action="index.php" method="get">
        <input type="text" name="year" placeholder="Aasta" style="margin: 4px">
        <br>
        <input type="submit" value="Otsi" >
            
    </form>
    <head>
    <ul>
    <?php

while ($row = $stmt->fetch())
{
 //  var_dump($row); 
echo '<li>' . $row['title'].' <a href="author.php">'.$row['first_name'].' '.$row['last_name'] . "</a></li> ";
}
?>
<a href="url"></a>
<ul>
        </body>
</html> 




