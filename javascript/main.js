// function showHint(str) {
//     if (str.length == 0) {
//         document.getElementById("txtHint").innerHTML = "";
//         return;
//     } else {
//         var xmlhttp = new XMLHttpRequest();
//         xmlhttp.onreadystatechange = function() {
//             if (this.readyState == 4 && this.status == 200) {
//                 document.getElementById("txtHint").innerHTML = this.responseText;
//             }
//         };
//         xmlhttp.open("GET", "index.php?username=" + str, true);
//         xmlhttp.send();
//     }
// }