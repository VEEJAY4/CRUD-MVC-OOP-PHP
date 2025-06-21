<?php

    include "autoLoader.inc.php";

    # GRABBING DATA
    $id = $_POST['id-retrieve'];
    $firstname = $_POST['fname-retrieve'];
    $lastname = $_POST['lname-retrieve'];
    $age = $_POST['age-retrieve'];

    # INSTANTIATION - CLASS OBJECT
    $retrieve = new StudentControl($id, $firstname, $lastname, $age);
    $retrieve->accessRestoration();

    # REDIRECTING TO HOME PAGE
    header("location: ../archived.php");

?>