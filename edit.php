<?php
require_once 'db_connection.php';
var_dump($_GET);
$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM Books.books b LEFT JOIN book_authors ba ON ba.book_id = b.id
LEFT JOIN authors a ON ba.author_id = a.id WHERE b.id = :id');
$stmt->execute(['id' => $id]);
$book = $stmt->fetch();
?>




<!DOCTYPE html>
<html lang="en">
<style>
body {
  background-color: #ccbf9b;
}
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $book['title']; ?></title>
</head>
<body>
<br> 
<h3>Raamatu pealkiri</h3>
<?php echo $book['title']; ?>  
<br>
<h3>Raamatu ilmumisaasta</h3>
<form action="edit.php" method="get">
       
        <input type='text' name='year' value='<?php echo $book['release_date']; ?>'>
        <br>
        <input type='submit' value='Salvesta'>
    </form>

</body>
</html>