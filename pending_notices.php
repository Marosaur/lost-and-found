<?php
    $server = "localhost"; $user = "wbip"; $pw = "wbip123"; $db = "lost_and_found";
    $connect = mysqli_connect($server, $user, $pw, $db);
    if(!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $userQuery = "SELECT * FROM notices";

    $result = mysqli_query($connect, $userQuery);

    if (mysqli_num_rows($result) == 0) {
        print "No notice records were found.";
    }
    else {
        print "<table>";
        print "<tr><th>Type</th><th>Title</th><th>User ID</th><th>Venue</th>
        <th>Date</th></tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['notice_type'] == 'lost') {
                print "<tr class = 'lost'><td>" . ucfirst($row['notice_type']) . "</td><td>";
            }
            else {
                print "<tr class = 'found'><td>" . ucfirst($row['notice_type']) . "</td><td>";
            }
            print $row['title'] . "</td><td>" .
                $row['userid'] . "</td><td>" .
                $row['venue'] . "</td><td>" .
                $row['date_lost'] . "</td></tr>";
        }

        print "</table>";
        
    }
    
    mysqli_close($connect);
?>