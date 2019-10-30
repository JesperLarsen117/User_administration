<?php
$servername = "localhost";
$username ="root";
$password="";
$dbname="skole";


try{
    $db = new PDO ("mysql:host=$servername;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  

} catch (PDOException $e)
{
    echo "connection faild:" .$e->getMessage();
}
if (isset($_GET['id'])){
    $id=$_GET['id'];
    $sql = "DELETE FROM users WHERE id = $id";
    $db -> excc($sql);
    if (isset($_POST['delete'])){
        // header ('Location: index.php');
    }
}
