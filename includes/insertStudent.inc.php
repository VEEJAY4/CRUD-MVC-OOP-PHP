<?php

    include "autoLoader.inc.php";

    if(isset($_POST['submit']))
    {
        # GRABBING DATA
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $age = $_POST['age'];

        # INSTANTIATION - CLASS OBJECT
        $insert = new StudentControl("", $firstname, $lastname, $age);
        $validationType = $insert->accessInsertValidation();

        # DISPLAYING VALIDATIONS
        $object = new StudentView();
        $object->displayValidation($validationType);
    }

?>