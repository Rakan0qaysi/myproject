<?php
$conn = mysqli_connect('localhost','root','','almsroe');

if (!$conn) {
    echo 'Error: ' . mysqli_connect_error();
}
?>