<?php
    include "koneksi.php";
    session_start();

    $komentarid=$_GET['komentarid'];
    $fotoid=$_POST['fotoid'];

    $sql=mysqli_query($conn,"delete from komentarfoto where komentarid='$komentarid'");

    header("location:index.php");
?>