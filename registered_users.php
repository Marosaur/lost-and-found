<?php
    $server = "localhost"; $user = "wbip"; $pw = "wbip123"; $db = "lost_and_found";
    $connect = mysqli_connect($server, $user, $pw, $db);
    if(!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $userQuery = "SELECT * FROM users
                    WHERE user_type = 'user'
                    ORDER BY nickname";

    $result = mysqli_query($connect, $userQuery);

    if (mysqli_num_rows($result) == 0) {
        print "No notice records were found.";
    }
    else {
        print "<table>";
        print "<tr><th>User ID</th><th>Nickname</th>
        <th>email</th><th>Gender</th><th>Birthday</th><th>Notices</th><th>Responses</th></tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            print "<tr><td>" . $row['userid'] . "</td><td>" .
                $row['nickname'] . "</td><td>" .
                $row['email'] . "</td><td>" .
                $row['gender'] . "</td><td>" .
                $row['birthday'] . "</td><td>" .
                $row['notices'] . "</td><td>" .
                $row['responses'] . "</td></tr>";
                
        }

        print "</table>";
        
    }
    
    mysqli_close($connect);
?>