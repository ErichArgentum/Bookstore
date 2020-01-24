<?php
require_once 'db_connection.php';
var_dump($_GET);
$id = $_GET['id'];
if ($_GET['save'] == 'Salvesta' ) {
  $year = $_GET['year'];
  $stmt = $pdo->prepare('UPDATE books SET release_date = :year WHERE id = :id');
  $stmt->execute(['id' => $id, 'year' => $year]);
  header("Location: book.php?id=".$id);
  die();

}


$stmt = $pdo->prepare('SELECT * FROM Books.books b LEFT JOIN book_authors ba ON ba.book_id = b.id
LEFT JOIN authors a ON ba.author_id = a.id WHERE b.id = :id');
$stmt->execute(['id' => $id]);
$book = $stmt->fetch();
?>




<!DOCTYPE html>
<html lang="en">
<style>
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
        <input type='submit' name='save' value='Salvesta'>

        <input type="hidden" name="id" value='<?php echo $id ?>'>
    </form>


</body>
</html>