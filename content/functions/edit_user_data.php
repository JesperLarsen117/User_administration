<?php
$host = 'localhost';
$dbname = 'skole';
$user = 'root';
$pass = '';
$pdoOptions = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
];
// $pdo = new PDO(
//     "mysql:host=" . MYSQL_HOST . "port=1025;dbname=" . MYSQL_DATABASE,
//     MYSQL_USER, //Username
//     MYSQL_PASSWORD, //Password
//     $pdoOptions //Options
// );
try {
    $pdo = new PDO("mysql:host={$host};dbname={$dbname}", $user, $pass, $pdoOptions);
} catch (PDOExeption $e) {
    echo "fejl ".$e->getMessage();
}
$name = '';
global $message;
//tjekker om knappen er blevet trykket.
$id = isset($_GET['id']) ? $_GET['id'] : '';
if (!isset($_GET['id'])) {
    header('Location: index.php');
}

    // query string med named placeholders.
    $check = "SELECT * FROM users WHERE id = :id";
    // sikkerhed. prepared statement.
    $checkStmt = $pdo->prepare($check);
    // Binder $username til :username
    $checkStmt->bindValue(':id', $id);
    // Udfører handlingerne oven over.
    $checkStmt->execute();

if (isset($_POST['submit'])) {
    // henter data fra formen, og laver en variable med dens værdi.
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

        // Checker om der er  en fundet et username på databsen, ud fra hvad man skriver i formen.
            // query string med named placeholders.
            $sql = "UPDATE users SET username = :username, email = :email, password = :password WHERE id=".$id;
            // sikkerhed. prepared statement.
            $stmt = $pdo->prepare($sql);
            // sikkerhed. prepared statement.
            $stmt->bindValue(':username', $username);
            // sikkerhed. prepared statement.
            $stmt->bindValue(':email', $email);
            // sikkerhed. prepared statement.
            $stmt->bindValue(':password', $password);
            // Udfører handlingerne oven over.
            $stmt->execute();
            header('Location: index.php');
            session_start();
            $_SESSION["added"] = '<p class="confirmation__message">User has been updated</p>';
}
while($row = $checkStmt->fetch(PDO::FETCH_ASSOC)) {
    echo 
        '<input type="text" name="username" id="name" value="'.$row['username'].'">
        <input type="text" name="email" id="email" value="'.$row['email'].'">
        <input type="text" name="pass" id="pass" value="'.$row['password'].'">';
    }
?>