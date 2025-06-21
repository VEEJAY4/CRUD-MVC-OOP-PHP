<head>
    <style> body { background-color: #23395d; } </style>
</head>
<body>
    <!-- SWEETALERT CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        function updateSubmitForm(type)
        {
            if(type == 11)
            {
                Swal.fire({
                    icon: 'error',
                    title: "Update can't be performed!",
                    text: 'Please enter 1 or more new Information.',
                    confirmButtonText: 'Ok'
                }).then(() => {
                    window.location.replace("../home.php")
                });
            }
            else if(type == 22)
            {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Record updated!',
                    showConfirmButton: false,
                    timer: 2000
                }).then(() => {
                    window.location.replace("../home.php")
                });
            }
        }
    </script>
</body>



<?php
    include "autoLoader.inc.php";

    # GRABBING DATA
    $id = $_POST['id-update'];
    $firstname = $_POST['fname-update'];
    $lastname = $_POST['lname-update'];
    $age = $_POST['age-update'];

    # INSTANTIATION - CLASS OBJECT
    $update = new StudentControl($id, $firstname, $lastname, $age);
    $validationType = $update->accessUpdateValidation();

    # CALLING SWEETALERT FUNCTION
    $object = new StudentView();
    $object->displayValidation($validationType);
?>