<?php
    class StudentModel extends Database
    {
        /* ==================== QUERY METHODS ==================== */ 
        protected function accessStudents($showType)
        {
            if ($showType == "Archived")
            {
                $sql = "SELECT * FROM std_table WHERE Status = 'Archived'";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetchAll();
                return $row;
            }
            else
            {
                $sql = "SELECT * FROM std_table WHERE Status = ''";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetchAll();
                return $row;
            }
        }

        protected function insertStudent($fname, $lname, $age)
        {
            $sql = "INSERT INTO std_table VALUES(NULL, ?, ?, ?, '')";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$fname, $lname, $age]);
        }

        protected function checkUserExisting($fname, $lname)
        {
            $sql = "SELECT * FROM std_table WHERE fname = ? AND lname = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$fname, $lname]);

            if($stmt->fetch() > 0)
                $getResult = false;
            else
                $getResult = true;
            
            $stmt = null;
            return $getResult;
        }

        protected function updateStudent($id, $fname, $lname, $age)
        {
            if(!empty($fname))
            {
                $sql = "UPDATE std_table SET fname = ? WHERE id = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$fname, $id]);
            }
            else if(!empty($lname))
            {
                $sql = "UPDATE std_table SET lname = ? WHERE id = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$lname, $id]);
            }
            else if(!empty($age))
            {
                $sql = "UPDATE std_table SET age = ? WHERE id = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$age, $id]);
            }
        }

        protected function deleteStudent($id)
        {
            $sql = "UPDATE std_table SET Status = 'Archived' WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
        }

        protected function retrieveStudent($id)
        {
            $sql = "UPDATE std_table SET Status = '' WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
        }
    }

?>