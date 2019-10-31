<?php
include 'content/functions/new_user_create.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New User</title>
    <link rel="stylesheet" href="content/css/new_user.css">
</head>
<body>



    <h1>Create new user</h1>
<form method="post">
    <input type="text" name="username" id="name" placeholder="Username"><br>
    <input type="email" name="email" id="email" placeholder="E-mail"><br>
    <input type="password" name="pass" id="pass" placeholder="Password"><br>
    <?php echo $message; ?>
    <input class ="create" type="submit" value="Create" name="submit">
    <a class="cancel" href="index.php">Cancel</a>
</form>
</body>
</html>