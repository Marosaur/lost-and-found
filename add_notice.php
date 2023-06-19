<?php
    print "<input type='button' class = 'close_button' value='x' onclick='close_details();'>
            <table> 
                <tr>
                    <td>Type of Report:</td>
                    <td><select name = 'type' id = 'type'>
                            <option value='lost'>Lost your belonging.</option>
                            <option value='found'>Found an item.</option>
                    </td>
                </tr>
                <tr>
                    <td>Date lost:</td>
                    <td><input type = 'date' name = 'date' id = 'date'>
                </tr>
                <tr>
                    <td>Venue:</td>
                    <td><input type = 'text' name = 'venue' id = 'venue'>
                </tr>
                <tr>
                    <td>Contact:</td>
                    <td><input type = 'text' name = 'contact' id = 'contact'>
                </tr>
                <tr>
                    <td>Title:</td>
                    <td><input type = 'text' name = 'title' id = 'title'>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><input type = 'text' name = 'description' id = 'description'>
                </tr>
            </table>
            <div id = status></div>
            <input type = 'button' value = 'Submit' class = 'submit_button' onclick = 'submit_new_notice();'>"
?>