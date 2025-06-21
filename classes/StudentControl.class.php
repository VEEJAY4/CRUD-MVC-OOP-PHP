<?php

    class StudentControl extends StudentModel
    {
        # NULL PROPERTIES
        private $id;
        private $firstname;
        private $lastname;
        private $age;

        # METHODS
        public function __construct($id, $new_fname, $new_lname, $new_age)
        {
            $this->id = $id;
            $this->firstname = $new_fname;
            $this->lastname = $new_lname;
            $this->age = $new_age;
        }

        /* ==================== INSERT - CHECKING VALIDATION METHODS ==================== */ 
        public function accessInsertValidation()
        {
            if($this->emptyInput() == false)
                return 1;
            elseif($this->takenCheck() == false)
                return 2;
            else
            {
                parent::insertStudent($this->firstname, $this->lastname, $this->age);
                return 3;
            }
        }

        /* ==================== INSERT - VALIDATION METHODS ==================== */ 
        private function emptyInput()
        {
            if(empty($this->firstname) || empty($this->lastname) || empty($this->age))
                $result = false;
            else
                $result = true;
            
            return $result;
        }

        private function takenCheck()
        {
            if(!parent::checkUserExisting($this->firstname, $this->lastname))
                $result = false;
            else
                $result = true;   
            
            return $result;
        }

        /* ==================== UPDATE - CHECKING VALIDATION METHODS ==================== */ 
        public function accessUpdateValidation()
        {
            if($this->noUpdateInput() == false)
                return 11;
            else
            {
                parent::updateStudent($this->id, $this->firstname, $this->lastname, $this->age);
                return 22;
            }
        }

        /* ==================== UPDATE - VALIDATION METHODS ==================== */
        private function noUpdateInput()
        {
            if(empty($this->firstname) && empty($this->lastname) && empty($this->age))
                $result = false;
            else
                $result = true;
            
            return $result;
        }

        /* ==================== PASSING DATA ==================== */
        public function accessDeletion()
        {
            parent::deleteStudent($this->id);
        }

        public function accessRestoration()
        {
            parent::retrieveStudent($this->id);
        }
    }

?>