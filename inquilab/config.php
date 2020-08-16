<?php
$dbHost = 'localhost';
// MySQL Database Name
$dbName = 'inquilabdb';
// MySQL Database User
$dbUser = 'root';
// MySQL Database Password
$dbPass = '';

// DAtabase Connection
try
{
$dbConnect = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName, $dbUser, $dbPass);
$dbConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>