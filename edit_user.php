
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
<form method="post">
<h1>Create new user</h1>
    <div class="input__wrapper">
        <label for="username">Username</label>
        <label for="email">E-mail</label>
        <label for="pass">Password</label>
        <?php
        include 'content/functions/edit_user_data.php';
        ?>
    </div>
    <?php echo isset($message) ? $message : '' ?>
    <div class="button__wrapper">
        <input class ="create" type="submit" value="Update" name="submit">
        <a class="cancel" href="index.php">Cancel</a>
    </div>
</form>
</body>
</html>