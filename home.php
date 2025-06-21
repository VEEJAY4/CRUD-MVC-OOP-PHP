<?php
    # DISPLAYING ERRORS (ChromeBook)
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    include "includes/autoLoader.inc.php";
    $dataTable = new StudentView();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-OOP-CRUD</title>

    <!-- BOOTSTRAP 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SWEETALERT 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Jquery Ajax CDN -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- DATA TABLES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="assets/script.js"></script>

</head>
<body>

    <!-- HEADER -->
    <div class="container-fluid bg-dark">
        <div class="title">
            <div class="d-flex justify-content-between pt-4">
                <h2>DATATABLE CRUD</h2>  
                <p>By: Ville Joe L. Catig<br>From: CIS201</p> 
            </div>
        </div>
    </div><!--END HEADER -->

    <!-- CONTENTS -->
    <div class="container p-4">
        <div class="d-flex justify-content-between mb-4">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertStudent"><i class="bi bi-plus-lg"></i> Add Student</button>
            <a href="archived.php"><button class="btn btn-secondary"><i class="bi bi-archive"></i> Show Archived</button></a>
        </div>

        <!-- DATA TABLE -->
        <table id="myTable" class="table table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>FIRSTNAME</th>
                    <th>LASTNAME</th>
                    <th>AGE</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody class="table-light">
                <?php $dataTable->dataTable(""); ?>
            </tbody>
            <tfoot class="table-dark">
                <th>ID</th>
                <th>FIRSTNAME</th>
                <th>LASTNAME</th>
                <th>AGE</th>
                <th>ACTIONS</th>
            </tfoot>
        </table><!-- END DATA TABLE -->
    </div><!-- END CONTENTS -->

    <!--############################## MODALS ##############################-->
    <?php $dataTable->insertModalStudents(); ?>
    <?php $dataTable->updateModalStudents(); ?>
    <?php $dataTable->deleteModalStudents(); ?>

</body>
</html>