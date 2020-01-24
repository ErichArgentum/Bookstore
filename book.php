<?php
require_once 'db_connection.php';
$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM Books.books b LEFT JOIN book_authors ba ON ba.book_id = b.id
LEFT JOIN authors a ON ba.author_id = a.id WHERE b.id = :id');
$stmt->execute(['id' => $id]);
$book = $stmt->fetch();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $book['title']; ?></title>

    
    
</head>
<body>
<a href="delete.php?id=<?php echo $id;  ?>">DELETE</a>
<br>
<br>
<a href="edit.php?id=<?php echo $id;  ?>">EDIT</a>
<br>
<?php  echo $book['title']; ?>  
<br>
<?php echo $book['release_date']; ?>  
<br>
<?php echo $book['language']; ?>  
<br>
<?php echo $book['summary']; ?>  
<br>
<?php echo $book['price']; ?>
<br> 
<?php echo $book['pages']; ?> 
<br> 
<?php echo $book['first_name'] ." ". $book['last_name']; ?> 
</body>
</html>