<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Homework 4-4&5</title>
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
$info = $_POST["info"];
$num = 1;
foreach ($info as $info_1){
    $query = "UPDATE party SET Time='$info_1[1]', Place='$info_1[2]', Host_Name='$info_1[3]' WHERE Party_Num=$num";
    $num++;
    trim($query);
    if(!mysql_query($query))
        print $query."<br/>";
}
print "<p>Click <a href='4-4-input_info.php'>here</a> to return.</p>";
?>
</body>
</html>