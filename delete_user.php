<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete</title>
    <link rel="stylesheet" href="content/css/main.css">
    <link rel="stylesheet" href="content/css/delete_user.css">
</head>
<body>
<div class="container">
    <h1 class="container-header">Delete user</h1>
<?php
include 'content/functions/delete_user_data.php';
?>
<div class="container_wrapper">
<button id="myBtn" onclick="myFunction()" class="container_wrapper-del_btn">Delete</button>
<button id="myButton" class="container_wrapper-cancel_btn"">Cancel</button>
</div>
 </div> 
<div id="myModal" class="modal">
  <form method="POST" class="modal-content">
    <p>Are you sure you want to delete this user?</p>
    <button id="okBtn" name="delete">Yes</button>
    <button id="noBtn" name="deleteNo">No</button>
</form>
</div>
 
 <script>
     
  document.getElementById("myButton").onclick = function () {
        location.href = "index.php";
    };
    document.getElementById("okBtn").onclick = function () {
        location.href = "index.php";
    };
    document.getElementById("noBtn").onclick = function () {
        modal.style.display = "none";

    };
    // Get the modal
var modal = document.getElementById("myModal");
// Get the button that opens the modal
var btn = document.getElementById("myBtn");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
function myFunction() {
  alert("User deleted");
}
// onclick="location.href = 'index.php';"
</script>
</body>
</html>