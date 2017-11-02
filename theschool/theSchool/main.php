<?php
session_start();
?>
<!DOCTYPE html>

   <html>
            <head>

            </head>

            <body>
            
                <menu>
            <img src=""></img>  
            <button name="school" onclick="ajax(this)">School</button> 
            <?php 
             if( $_SESSION["role"] === "owner"  || $_SESSION["role"] === "manager")
            {echo "<button name='administration' onclick='ajax(this)'>Administration</button>";}  
             ?>
            <?php echo $_SESSION["username"] . "  " . $_SESSION["role"] ?>
            <form action="API.php" method="post">
                <button name="action" value="logout">logout</button>
            </form>  
                </menu>
                <div id="ajax"></div>
            <script src="ajax.js"></script>
            
            </body>
    </html>