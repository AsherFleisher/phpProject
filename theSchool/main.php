<?php
session_start();
?>
<!DOCTYPE html>
<?php if(!isset($_SESSION["username"])){header("Location: index.html");
           die();} ?>
   <html>
            <head>
            <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="main.css">
            </head>

            <body background="book_sky_small-1024x705.jpg">
            
                <nav class="navbar navbar-default">
                     <div class="container-fluid">
                        <img src=""></img>  
                        <button class="btn btn-danger" name="logout" value="logout" onclick="ajax(this)">logout</button>
                        <button class="btn btn-info" name="school" onclick="ajax(this)">School</button> 
                        <?php 
                        if( $_SESSION["role2"] === "owner"  || $_SESSION["role2"] === "manager")
                        {echo "<button class='btn btn-warning' name='administration' onclick='ajax(this)'>Administration</button>";}  
                        ?>
                        <?php echo $_SESSION["username"] . "  " . $_SESSION["role2"] ?>
                        <form action="API.php" method="post">
                    </form>
                  </div>  
                </nav>
                <div id="student"></div>
                <div id="course"></div>
                <div id="ajax"></div>
                <div id="ajax2"  class="allAjax"></div>
                <div id="addStudent" class="allAjax"></div>
                <script src="ajax.js"></script>
            
            </body>
    </html>