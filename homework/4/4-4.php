<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Homework 4-4&5</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<table>
    <tr>
        <th>User</th>
        <th>Query functions</th>
    </tr>
    <tr>
        <td>guest</td>
        <td>
            What parties will be given and when and where?
            <?php
            //TODO modify in server
            //$db = mysql_connect("localhost", "usr_2014_106", "8388608ymp"); #Server
            $db = mysql_connect("localhost", "root", "");
            if (!$db) {
                print "ERROR - Could not connect to MySQL";
                exit;
            }

            $er = mysql_select_db("db_2014_106");
            if (!$er) {
                print "Error - the query could not be executed";
                $error = mysql_error();
                print "<p>" . $error . "</p>";
                exit;
            }

            // Clean up the given query (delete leading and trailing whitespace)
            $query = "SELECT * FROM party";

            trim($query);
            #print "<p> <b> The query is: </b> " . $query . "</p>";

            // Execute the query

            $result = mysql_query($query);
            if (!$result) {
                print "Error - the query could not be executed";
                $error = mysql_error();
                print "<p>" . $error . "</p>";
                exit;
            }

            print "<table><caption> <h2> Query Results </h2> </caption>";
            print "<tr align = 'center'>";

            // Get the number of rows in the result, as well as the first row
            // and the number of fields in the rows

            $num_rows = mysql_num_rows($result);
            $row = mysql_fetch_array($result);
            $num_fields = sizeof($row);

            // Produce the column labels

            while ($next_element = each($row)) {
                $next_element = each($row);
                $next_key = $next_element['key'];
                print "<th>" . $next_key . "</th>";
            }

            print "</tr>";

            // Output the values of the fields in the row

            for ($row_num = 0; $row_num < $num_rows; $row_num++) {
                reset($row);
                if ($row_num % 2 == 0)
                    print "<tr align = 'center'>";
                else
                    print "<tr align = 'center' class='alt'>";
                for ($field_num = 0; $field_num < $num_fields / 2; $field_num++)
                    print "<td>" . $row[$field_num] . "</td> ";
                print "</tr>";
                $row = mysql_fetch_array($result);

            }

            print "</table>";
            ?>
        </td>
    </tr>
    <tr class="alt">
        <td>All Users</td>
        <td>
            Choose what parties you to go:<br/>
            <?php
            //TODO modify in server
            //$db = mysql_connect("localhost", "usr_2014_106", "8388608ymp"); #Server
            $db = mysql_connect("localhost", "root", "");
            if (!$db) {
                print "ERROR - Could not connect to MySQL";
                exit;
            }

            $er = mysql_select_db("db_2014_106");
            if (!$er) {
                print "Error - the query could not be executed";
                $error = mysql_error();
                print "<p>" . $error . "</p>";
                exit;
            }

            // Clean up the given query (delete leading and trailing whitespace)
            $query = "SELECT party.Time, party.Place, party.Host_Name, guest.Guest_Name, guest.Age, guest.Gender
 FROM party, guest, guest_party WHERE guest.Guest_ID=guest_party.Guest_ID AND party.Party_Num=guest_party.Party_Num";

            trim($query);
            #print "<p> <b> The query is: </b> " . $query . "</p>";

            // Execute the query

            $result = mysql_query($query);
            if (!$result) {
                print "Error - the query could not be executed";
                $error = mysql_error();
                print "<p>" . $error . "</p>";
                exit;
            }

            print "<table><caption> <h2> Query Results </h2> </caption>";
            print "<tr align = 'center'>";

            // Get the number of rows in the result, as well as the first row
            // and the number of fields in the rows

            $num_rows = mysql_num_rows($result);
            $row = mysql_fetch_array($result);
            $num_fields = sizeof($row);

            // Produce the column labels

            while ($next_element = each($row)) {
                $next_element = each($row);
                $next_key = $next_element['key'];
                print "<th>" . $next_key . "</th>";
            }

            print "</tr>";

            // Output the values of the fields in the row

            for ($row_num = 0; $row_num < $num_rows; $row_num++) {
                reset($row);
                if ($row_num % 2 == 0)
                    print "<tr align = 'center'>";
                else
                    print "<tr align = 'center' class='alt'>";
                for ($field_num = 0; $field_num < $num_fields / 2; $field_num++)
                    print "<td>" . $row[$field_num] . "</td> ";
                print "</tr>";
                $row = mysql_fetch_array($result);

            }

            print "</table>";
            ?>
        </td>
    </tr>
    <tr>
        <td>Organizer</td>
        <td>
            <a href="4-4-input_info.php" target="_blank">Input information about the parties will be given:</a>
        </td>
    </tr>
</table>
<hr/>
<h1>More query:</h1>
<ul>
    <li>
        Who will go to the party held in Peking University?<br/>
        <?php
        //TODO modify in server
        //$db = mysql_connect("localhost", "usr_2014_106", "8388608ymp"); #Server
        $db = mysql_connect("localhost", "root", "");
        if (!$db) {
            print "ERROR - Could not connect to MySQL";
            exit;
        }

        $er = mysql_select_db("db_2014_106");
        if (!$er) {
            print "Error - the query could not be executed";
            $error = mysql_error();
            print "<p>" . $error . "</p>";
            exit;
        }

        // Clean up the given query (delete leading and trailing whitespace)
        $query = "SELECT guest.Guest_ID, guest.Guest_Name, guest.E_mail, party.Party_Num, party.Time, party.Place FROM guest, party, guest_party WHERE party.Party_Num=guest_party.Party_Num AND guest_party.Guest_ID=guest.Guest_ID AND party.Place='Peking University'";

        trim($query);
        #print "<p> <b> The query is: </b> " . $query . "</p>";

        // Execute the query

        $result = mysql_query($query);
        if (!$result) {
            print "Error - the query could not be executed";
            $error = mysql_error();
            print "<p>" . $error . "</p>";
            exit;
        }

        print "<table><caption> <h2> Query Results </h2> </caption>";
        print "<tr align = 'center'>";

        // Get the number of rows in the result, as well as the first row
        // and the number of fields in the rows

        $num_rows = mysql_num_rows($result);
        $row = mysql_fetch_array($result);
        $num_fields = sizeof($row);

        // Produce the column labels

        while ($next_element = each($row)) {
            $next_element = each($row);
            $next_key = $next_element['key'];
            print "<th>" . $next_key . "</th>";
        }

        print "</tr>";

        // Output the values of the fields in the row

        for ($row_num = 0; $row_num < $num_rows; $row_num++) {
            reset($row);
            if ($row_num % 2 == 0)
                print "<tr align = 'center'>";
            else
                print "<tr align = 'center' class='alt'>";
            for ($field_num = 0; $field_num < $num_fields / 2; $field_num++)
                print "<td>" . $row[$field_num] . "</td> ";
            print "</tr>";
            $row = mysql_fetch_array($result);

        }

        print "</table>";
        ?>
    </li>
</ul>
</body>
</html>