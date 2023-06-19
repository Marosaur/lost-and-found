<?php
    $userid = $_GET['id'];
    $server = "localhost"; $user = "wbip"; $pw = "wbip123"; $db = "lost_and_found";
    $connect = mysqli_connect($server, $user, $pw, $db);
    if(!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $userQuery = "SELECT * FROM notices
                WHERE userid = '$userid'";

    $result = mysqli_query($connect, $userQuery);

    print "<table>";
    print "<tr><th>Type</th><th>Title</th><th>User ID</th><th>Venue</th>
    <th>Date</th><th>Status</th></tr>";
        
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
            $row['date_lost'] . "</td><td>Pending</td></tr>";
    }

    $userQuery = "SELECT * FROM completed_notices
        WHERE userid = '$userid'";

    $result = mysqli_query($connect, $userQuery);

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
            $row['date_lost'] . "</td><td>Completed</td></tr>";
    }

    print "</table>";
        

    mysqli_close($connect);
?>