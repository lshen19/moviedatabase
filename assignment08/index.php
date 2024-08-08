<!doctype html>
<html>
    <head>
        <title>Assignment 08</title>
        <style>
            body {
                display: flex;
                flex-direction: column;
            }

            #links {
                display: flex;
            }

            a {
                padding: 15px;
                margin-left: 5px;
                margin-bottom: 15px;
                border: solid 1px black;
            }

            a:hover {
                background-color: #E5E4E2;
            }

            table {
                max-width: 500px;
                border: solid 1px black;
            }

            tr {
                border: solid 1px black;
            }

            td {
                border: solid 1px black;
            }

            button {
                background: none;
                cursor: pointer;
            }

            button:hover {
                background-color: #E5E4E2
            }

            p {
                background-color: #FFB7C5; 
            }
        </style>
    </head>
    <body>

        <h1>My Movie Database</h1>
        <div id='links'>
            <a href='index.php'>View All</a>
            <a href='add_form.php'>Add Movie</a>
            <a href='search_form.php'>Search Movies</a>
        </div>

        <?php
            if (isset($_GET['success']) && $_GET['success'] == 'deleted') {
                print "<p>Movie was deleted successfully!</p>";
            }
        ?>
        <?php
            print "<table><tr><td>Title</td><td>Year</td><td>Options</td></tr>";

            $path = '/Users/liliettegrace/Documents/MAMP/webdev/assignment08';
            $db = new SQLite3($path.'/movies.db');
            
            $sql = "SELECT id, title, year FROM movies";

            $statement = $db->prepare($sql);
            $result = $statement->execute();
            while ($row = $result->fetchArray()) {
                $id = $row[0];
                $title = $row[1];
                $year = $row[2];
                print "<tr><td>$title</td>";
                print "<td>$year</td>";
                print "<td><form action='delete.php' method='GET'>";
                print "<input type='hidden' name='id' value=$id>";
                print "<button type='submit'>Delete</button></form></td></tr>";
            }

            $db->close();
            unset($db);

            print "</table>";

        ?>
        
    </body>
</html>