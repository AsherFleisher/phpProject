<?php
session_start();
?>
<!DOCTYPE html>

   <html>
            <head>
            <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            </head>

            <body>
            
                <nav class="navbar navbar-default">
                        <img src=""></img>  
                        <button class="btn btn-danger name="action" value="logout">logout</button>
                        <button class="btn btn-info name="school" onclick="ajax(this)">School</button> 
                        <?php 
                        if( $_SESSION["role"] === "owner"  || $_SESSION["role"] === "manager")
                        {echo "<button class='btn btn-warning' name='administration' onclick='ajax(this)'>Administration</button>";}  
                        ?>
                        <?php echo $_SESSION["username"] . "  " . $_SESSION["role"] ?>
                        <form action="API.php" method="post">
                    </form>  
                </nav>
                <div id="ajax"></div>
                <script src="ajax.js"></script>
            
            </body>
    </html>