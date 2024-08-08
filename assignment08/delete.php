<?php
     $path = '/Users/liliettegrace/documents/MAMP/webdev/assignment08';
     $db = new SQLite3($path.'/movies.db');

     $id = $_GET['id'];

     $sql = "DELETE FROM movies WHERE id = '$id'";
     $statement = $db->prepare($sql);
     $result = $statement->execute();
     $rows_affected = $db->changes();
     
     print $rows_affected;
     $db->close();
     unset($db);

     header("Location: index.php?success=deleted");
     exit();
?>