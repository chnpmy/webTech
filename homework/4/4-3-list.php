<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Homework 4-3-list</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<?php

//TODO modify in server
//$db = mysql_connect("localhost", "usr_2014_106", "8388608ymp"); #Server
$db = mysql_connect("localhost", "root", "");
if (!$db){
    print "ERROR - Could not connect to MySQL";
    exit;
}

$er = mysql_select_db("db_2014_106");
if (!$er){
    print "Error - the query could not be executed";
    $error = mysql_error();
    print "<p>" . $error . "</p>";
    exit;
}

// Clean up the given query (delete leading and trailing whitespace)
$query = "SELECT * FROM guest";

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

print "<form action='4-3-delete.php' method='post'>";

print "<table><caption> <h2> Query Results </h2> </caption>";
print "<tr align = 'center'>";
print "<th>delete</th>";

// Get the number of rows in the result, as well as the first row
// and the number of fields in the rows

$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
$num_fields = sizeof($row);

// Produce the column labels

while ($next_element = each($row)){
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
    print "<td><input type='checkbox' name='delete[]' value='$row[0]' /></td>";
    for ($field_num = 0; $field_num < $num_fields / 2; $field_num++)
        print "<td>" . $row[$field_num] . "</td> ";
    print "</tr>";
    $row = mysql_fetch_array($result);

}

print "</table>";

print "<input type='submit' name='sd' value='delete' />";
print "</form>"
?>
</body>
</html>