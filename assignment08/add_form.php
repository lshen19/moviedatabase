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

        <?php
            if (isset($_GET['error']) && $_GET['error'] == 'missing') {
                print "<p>Missing a title or year.</p>";
            }
            
            if (isset($_GET['success']) && $_GET['success'] == 'added'){
                print "<p>Movie was added successfully!</p>";
            }
        
        ?>

        <form action='add_save.php' method='GET'>
            <span>Title: <input type='text' name='title' id='title'></input></span>
            <span>
                Year: <input type='text' name='year' id='year'></input>
                <input type='submit' value='Save'>
            </span>
        </form>


    </body>
</html>