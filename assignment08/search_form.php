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

            form {
                display: flex;
                flex-direction: column;
                width: 500px;
            }

            #title {
                width: 300px;
            } 

            #year {
                width: 150px;
            }

            form span {
                margin: 3px;
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

        <form action='search_form.php' method='POST'>
        <span>Title: <input type='text' name='title' id='title'></input></span>
            <span>
                Year: <input type='text' name='year' id='year'></input>
                <input type='submit' value='Search'>
            </span>
        </form>

    <?php
        $path = '/Users/liliettegrace/documents/mamp/webdev/assignment08';
        $db = new SQLite3($path.'/movies.db');
        
        if (isset($_POST['title']) && isset($_POST['year'])) {
            $title = $_POST['title'];
            $year = $_POST['year'];
        }
        else {
            $title = null;
            $year = null;
        }
       
        $sql = null;

        if ($title && !$year) {
            $sql = "SELECT * FROM movies WHERE title LIKE '%$title%'";
        }
        else if ($year && !$title) {
            $sql = "SELECT * FROM movies WHERE year = '$year'";
        }
        else if ($year && $title) {
            $sql = "SELECT * FROM movies WHERE title LIKE '%$title%' AND year = '$year'";
        }

        // step 4: prepare a SQL statement object
        if ($sql) {
            $statement = $db->prepare($sql);

            // step 5: run the query
            $result = $statement->execute();
    
            print "<ul>";
            // step 6: iterate over the results
            while ($row = $result->fetchArray()) {
                // extract the relevant info from the query into some variables
                $id = $row[0];
                $movietitle = $row[1];
                $movieyear = $row[2];
    
                print "<li>$movietitle ($movieyear)</li>";
    
            }
    
            print "</ul>";
        }
  

    ?>
    </body>
</html>