<?php
    print "<input type='button' value='x' class = 'close_button' autofocus placeholder = 'User ID' onclick='close_details();'>";
    print "<h1>Search by User ID</h1>";
    print "<input type='text' class = 'input' size = '50' id = 'userid'><br>";
    print "<input type='button' class = 'buttons' value='Search' onclick='notices_by_userid();'>";
    print "<div id = error></div>";
?>