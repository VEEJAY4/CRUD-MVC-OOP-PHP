<?php

    class StudentView extends StudentModel
    {
        # DISPLAYING VALIDATION MESSAGES
        public function displayValidation($validationType)
        {
            if($validationType == 1)
            {
                echo "<i class='bi bi-exclamation-diamond'></i> Please complete the form!";
                echo "<script> $('.form-error-message-insert').addClass('error-insert') </script>";
            }
            elseif($validationType == 2)
            {
                echo "<i class='bi bi-exclamation-diamond'></i> Record already exist!";
                echo "<script> $('.form-error-message-insert').addClass('error-insert') </script>";
            }
            elseif($validationType == 3)
            {
                echo "<script> $('.form-error-message-insert').removeClass('error-insert') </script>";
                echo "<script> notifInserted() </script>";
            }
            elseif($validationType == 11)
                echo "<script> updateSubmitForm(11) </script>";
            elseif($validationType == 22)
                echo "<script> updateSubmitForm(22) </script>";
        }

        # DISPLAYING DATA
        public function dataTable($displayType)
        {
            $row = $this->accessStudents($displayType);

            if($displayType == "Archived")
                foreach($row as $row):
                    echo "
                        <tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["fname"] . "</td>
                            <td>" . $row["lname"] . "</td>
                            <td>" . $row["age"] . "</td>
                            <td>
                                <button class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#retrieve" . $row["id"] . "'><i class='bi bi-arrow-counterclockwise'></i> Retrieve</button>
                            </td>
                        </tr>
                    ";
                endforeach;
            else
                foreach($row as $row):
                    echo "
                        <tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["fname"] . "</td>
                            <td>" . $row["lname"] . "</td>
                            <td>" . $row["age"] . "</td>
                            <td>
                                <button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#update" . $row["id"] . "'><i class='bi bi-pencil-square'></i> Edit</button>
                                <button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#delete" . $row["id"] . "'><i class='bi bi-archive'></i> Delete</button> 
                            </td>
                        </tr>
                    ";
                endforeach;
        }

        # INSERT MODAL FORM
        public function insertModalStudents()
        {
            echo "
                <div class='modal fade' id='insertStudent' data-bs-backdrop='static' data-bs-keyboard='false'>
                    <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable'>
                        <div class='modal-content'>
                            <div class='modal-header bg-primary'>
                                <h5 class='modal-title'>INSERT STUDENT</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                <form action='includes/insertStudent.inc.php' method='POST' class='form-insert p-2' id='insertForm'>
                                    <p id='form-error-message-insert' class='form-error-message-insert'></p>
                                    
                                    <label class='form-label text-dark'>FIRSTNAME:</label>
                                    <input class='form-control' type='text' id='fname-insert' placeholder='Enter firstname'>

                                    <label class='form-label text-dark pt-3'>LASTNAME:</label>
                                    <input class='form-control' type='text' id='lname-insert' placeholder='Enter lastname'>

                                    <label class='form-label text-dark pt-3'>AGE:</label>
                                    <input class='form-control' type='text' id='age-insert' placeholder='Enter Age'>
                            </div>
                            <div class='modal-footer'>
                                    <input class='btn btn-primary' type='submit' id='submit-insert' value='Submit'></input>
                                    <input type='button' class='btn btn-danger' onclick='resetForm()' value='Reset'>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            ";
        }

        # UPDATE MODAL FORM
        public function updateModalStudents()
        {
            $row = $this->accessStudents("");

            foreach($row as $row):
                echo "
                    <div class='modal fade' id='update" . $row["id"] . "' data-bs-backdrop='static' data-bs-keyboard='false'>
                        <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable'>
                            <div class='modal-content'>
                                <div class='modal-header bg-success'>
                                    <h5 class='modal-title'>UPDATE STUDENT</h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    <form action='includes/updateStudent.inc.php' method='POST' onsubmit='return confirmUpdate(this)' class='p-2'>
                                        <label class='form-label text-dark'>ID:</label>
                                        <input class='form-control' type='text' name='id-update' value='" . $row["id"] . "' readOnly>

                                        <label class='form-label text-dark pt-3'>FIRSTNAME:</label>
                                        <input class='form-control' type='text' name='fname-update' placeholder='" . $row["fname"] . "'>
                
                                        <label class='form-label text-dark pt-3'>LASTNAME:</label>
                                        <input class='form-control' type='text' name='lname-update' placeholder='" . $row["lname"] . "'>
                
                                        <label class='form-label text-dark pt-3'>AGE:</label>
                                        <input class='form-control' type='text' name='age-update' placeholder='" . $row["age"] . "'>
                                </div>
                                <div class='modal-footer'>
                                        <input class='btn btn-success' type='submit' value='Save Changes'></input>
                                        <input type='button' class='btn btn-secondary' data-bs-dismiss='modal' value='Cancel'>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            endforeach;
        }

        # DELETE MODAL FORM
        public function deleteModalStudents()
        {
            $row = $this->accessStudents("");

            foreach($row as $row):
                echo "
                    <div class='modal fade' id='delete" . $row["id"] . "' data-bs-backdrop='static' data-bs-keyboard='false'>
                        <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable'>
                            <div class='modal-content'>
                                <div class='modal-header bg-danger'>
                                    <h5 class='modal-title'>DELETE STUDENT</h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    <form action='includes/deleteStudent.inc.php' method='POST' onsubmit='return deleteSubmitForm(this)' class='p-2'>
                                        <p class='info-delete'><i class='bi bi-info-circle'></i> Are you sure you want to delete this record?</p>
                                        
                                        <div class='container d-flex'>
                                            <div class='bg-light mx-auto p-4'>
                                                <label class='form-label text-dark'>ID: " . $row["id"] . "</label><br>
                                                <label class='form-label text-dark'>Firstname: " . $row["fname"] . "</label><br>
                                                <label class='form-label text-dark'>Lastname: " . $row["lname"] . "</label><br>
                                                <label class='form-label text-dark'>Age: " . $row["age"] . "</label><br>

                                                <input class='form-control' type='text' name='id-delete' value='" . $row["id"] . "' hidden>
                                                <input class='form-control' type='text' name='fname-delete' value='" . $row["fname"] . "' hidden>
                                                <input class='form-control' type='text' name='lname-delete' value='" . $row["lname"] . "' hidden>
                                                <input class='form-control' type='text' name='age-delete' value='" . $row["age"] . "' hidden>
                                            </div>
                                        </div>
                                </div>
                                <div class='modal-footer'>
                                        <input class='btn btn-danger' type='submit' value='Delete'></input>
                                        <input type='button' class='btn btn-secondary' data-bs-dismiss='modal' value='Cancel'>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            endforeach;
        }

        public function retrieveModalStudents()
        {
            $row = $this->accessStudents("Archived");

            foreach($row as $row):
                echo "
                    <div class='modal fade' id='retrieve" . $row["id"] . "' data-bs-backdrop='static' data-bs-keyboard='false'>
                        <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable'>
                            <div class='modal-content'>
                                <div class='modal-header bg-warning'>
                                    <h5 class='modal-title'>RESTORE STUDENT</h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    <form action='includes/retrieveStudent.inc.php' method='POST' onsubmit='return retrieveSubmitForm(this)' class='p-2'>
                                        <p class='info-delete'><i class='bi bi-info-circle'></i> Are you sure you want to restore this record?</p>
                                        
                                        <div class='container d-flex'>
                                            <div class='bg-light mx-auto p-4'>
                                                <label class='form-label text-dark'>ID: " . $row["id"] . "</label><br>
                                                <label class='form-label text-dark'>Firstname: " . $row["fname"] . "</label><br>
                                                <label class='form-label text-dark'>Lastname: " . $row["lname"] . "</label><br>
                                                <label class='form-label text-dark'>Age: " . $row["age"] . "</label><br>

                                                <input class='form-control' type='text' name='id-retrieve' value='" . $row["id"] . "' hidden>
                                                <input class='form-control' type='text' name='fname-retrieve' value='" . $row["fname"] . "' hidden>
                                                <input class='form-control' type='text' name='lname-retrieve' value='" . $row["lname"] . "' hidden>
                                                <input class='form-control' type='text' name='age-retrieve' value='" . $row["age"] . "' hidden>
                                            </div>
                                        </div>
                                </div>
                                <div class='modal-footer'>
                                        <input class='btn btn-warning' type='submit' value='Confirm'></input>
                                        <input type='button' class='btn btn-secondary' data-bs-dismiss='modal' value='Cancel'>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            endforeach;
        }
    }

?>