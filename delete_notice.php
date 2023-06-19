<?php
    $id = $_GET['id'];

    $server = "localhost"; $user = "wbip"; $pw = "wbip123"; $db = "lost_and_found";
    $connect = mysqli_connect($server, $user, $pw, $db);
    if(!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $userQuery = "DELETE FROM notices 
                    WHERE id = '$id'";

    $result = mysqli_query($connect, $userQuery); //Deleting from NOTICES table.
         
    mysqli_close($connect);
?>