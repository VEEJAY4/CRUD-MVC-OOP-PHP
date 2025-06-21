<?php

    /*=============== ALL IN ONE --- MVC NOT APPLIED ===============*/

    class Student extends Database
    {
        # DISPLAY STUDENTS
        public function displayStudents()
        {
            $sql = "SELECT * FROM std_table WHERE Status = ''";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            while($row = $stmt->fetch())
            {
                echo "ID = " . $row["id"] . "<br>";
                echo "FIRSTNAME = " . $row["fname"] . "<br>";
                echo "LASTNAME = " . $row["lname"] . "<br>";
                echo "AGE = " . $row["age"] . "<br><br>";
            }
        }

        # DISPLAY STUDENTS BY CATEGORY
        public function displayStudentsby($Firstname, $Lastname)
        {
            $sql = "SELECT * FROM std_table WHERE fname = ? OR lname = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$Firstname, $Lastname]);
            $row = $stmt->fetchAll();

            foreach($row as $row)
            {
                echo "ID = " . $row["id"] . "<br>";
                echo "FIRSTNAME = " . $row["fname"] . "<br>";
                echo "LASTNAME = " . $row["lname"] . "<br>";
                echo "AGE = " . $row["age"] . "<br><br>";
            }
        }

        # INSERT
        public function insertStudent($fname, $lname, $age)
        {
            $sql = "SELECT * FROM std_table WHERE fname = ? OR lname = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$fname, $lname]);

            if($stmt->rowCount() > 0)
                echo "INFO IS ALREADY EXIST!";
            else
            {
                $sql = "INSERT INTO std_table VALUES(NULL, ?, ?, ?)";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$fname, $lname, $age]); 
                echo "SUCCESSFULLY INSERTED!";
            }
        }

        # UPDATE
        public function updateStudent($fname, $lname, $age, $id)
        {
            $sql = "UPDATE std_table SET fname = ?, lname = ?, age = ? WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$fname, $lname, $age, $id]);
        }

        # DELETE
        public function deleteStudent($id)
        {
            $sql = "UPDATE std_table SET Status = 'Archived' WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
        }
    }

?>