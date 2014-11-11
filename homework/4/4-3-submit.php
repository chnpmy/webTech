<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Homework 4-3-submit</title>
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

$result = mysql_query("SELECT * FROM guest");
$row_num = mysql_num_rows($result);
$row_num++;

#." ".$_POST['first_name']." ".$_POST['last_name']." ".$_POST['age']." ".$_POST['gender']." ".$_POST['email'];
$name = $_POST['first_name']." ".$_POST['last_name'];
#print $row_num.$name;

$query = "INSERT INTO guest(Guest_ID, Guest_Name, Age, Gender, E_mail)
VALUES
($row_num, '$name', $_POST[age], '$_POST[gender]', '$_POST[email]')";

trim($query);
#print "<p> <b> The query is: </b> " . $query . "</p>";

if (!mysql_query($query, $db))
    print "<h2>Sorry, but something bad happened.</h2>";
else
    print "<h2>Thank you for your time!</h2>"
?>
</body>
</html>