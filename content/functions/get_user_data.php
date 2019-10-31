<?php
include 'content/includes/db.php';
include 'content/functions/new_user_create.php';
session_start();

if (isset($_GET['page'])) {
    $offset = $_GET['page'] -1;
} else {
    $offset = 0;
}
    $pages = DB::query("SELECT * FROM users");
    $results = DB::query("SELECT * FROM users ORDER BY username LIMIT 8 OFFSET " . 8 * $offset);
    
    $pageCount = ceil(count($pages) / 8+1);
    if (isset($_SESSION["added"])) {
        echo $_SESSION['added'];
        unset($_SESSION['added']);
    } else {

    }
    if (isset($_SESSION["delete"])) {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    } else {

    }
echo '<h1>All Users('.count($pages).')</h1>';
// echo '<input type="text" placeholder="Search user.." />';
echo '<div class="columns">';
    echo '<p>Username</p>';
    echo '<p>E-mail</p>';
    echo '<p>Password</p>';
    echo '<p>Edit</p>';
    echo '<p>Delete</p>';
echo '</div>';
foreach ($results as $res) {
    echo "<div class='user__row'>";
        echo "<p class='user__username'>{$res['username']}</p>";
        echo "<p class='user__email'>{$res['email']}</p>";
        echo "<p class='user__password'>{$res['password']}</p>";
        echo '<a class="user__edit" href="edit_user.php?id='.$res['id'].'"><i class="material-icons">edit</i></a>';
        echo '<a class="user__delete" href="delete_user.php?id='.$res['id'].'"><i class="material-icons">delete</i></a>';
    echo '</div>';
}
echo '<div class="page__wrapper">';
    echo '<a class="new__user"href="new_user.php">New user</a>';
    echo '<div class="page__number-wrapper">';
    $page = isset($_GET['page']) ?  $_GET['page'] : 1;
        $prev = $page - 1;
        $next = $page + 1;
        if (isset($_GET['page'])) {
            if ($_GET['page'] <= 1) {
                $prev = 1;
            } else if ($_GET['page'] >= $pageCount-1) {
                $next = $pageCount-1;
            }
        }
    echo '<a class="page__change-btn" href="index.php?page='. $prev .'">Prev<a/>';
    // for ($i = 1; $i < $pageCount; $i++) { 
        // for($i = max(0, $page -6); $i <= min($page, $pageCount-2); $i++) {
            for($i = $page; $i <= $page + 5 && $i <= $pageCount -1  ; $i++) {
        if (isset($_GET['page'])) {
            if ($i == $_GET['page']) {
                echo '<a class="page__number active" href="index.php?page='.$i.'">'.$i.'</a>';
            } else {
                echo '<a class="page__number" href="index.php?page='.$i.'">'.$i.'</a>';
            }
        } else {
            echo '<a class="page__number" href="index.php?page='.$i.'">'.$i.'</a>';
        }
    }
    echo '<a class="page__change-btn" href="index.php?page='. $next .'">Next<a/>';
    echo '</div>';
echo '</div>';