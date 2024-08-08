<?php
    $path = '/Users/liliettegrace/documents/MAMP/webdev/assignment08';
    $db = new SQLite3($path.'/movies.db');

    $title = $_GET['title'];
    $year = $_GET['year'];
    if (!$title || !$year) {
        header("Location:  add_form.php?error=missing");
    }
    else{
        // step 3: construct an INSERT query
        $sql = "INSERT INTO movies (title, year) VALUES (:substitution1, :substitution2)";

        // step 4: prepare a SQL statement object
        $statement = $db->prepare($sql);

        // step 5: safely substitute variables into our statement
        $statement->bindValue(':substitution1', $title);
        $statement->bindValue(':substitution2', $year);

        // step 6: run our query
        $result = $statement->execute();

        // step 7: if we are done with the database we should close it
        // this allows Apache to use it again quickly, rather than waiting for
        // the database's natural timeout to occur
        $db->close();
        unset($db);

        header("Location: add_form.php?success=added");
    }




?>