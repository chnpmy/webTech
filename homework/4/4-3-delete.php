<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Homework 4-3-delete</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
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
if (isset($_POST['delete'])) {
    $array = $_POST['delete'];
    if (count($array) != 0) {
        foreach ($array as $value) {
            $num = (int)$value;
            $query = "DELETE FROM guest  WHERE Guest_ID=$num";
            #print $query;
            if (!mysql_query($query))
                print "ERROR query!";
        }
    }
    print "Delete successfully!";
}
print "<p>Click <a href='4-3-list.php'>here</a> to list the rest.</p>";

?>
</body>
</html>