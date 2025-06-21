<?php

    include "autoLoader.inc.php";

    # GRABBING DATA
    $id = $_POST['id-delete'];
    $firstname = $_POST['fname-delete'];
    $lastname = $_POST['lname-delete'];
    $age = $_POST['age-delete'];

    # INSTANTIATION - CLASS OBJECT
    $delete = new StudentControl($id, $firstname, $lastname, $age);
    $delete->accessDeletion();

    # REDIRECTING TO HOME PAGE
    header("location: ../home.php");

?>