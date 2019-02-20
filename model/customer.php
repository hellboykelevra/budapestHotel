<?php 
    class Customer {
        private $id;
        private $name;
        private $surname;
        private $dni;
        private $email;
        private $password;
        private $phone;
        private $cardNumber;
        
        public function __construct ($name, $surname, $dni, $email, $password, $phone, $cardNumber){
            $this->name = $name;
            $this->surname = $surname;
            $this->dni = $dni;
            $this->email = $email;
            $this->password = $password;
            $this->phone = $phone;
            $this->cardNumber = $cardNumber;
        }

        public function getInsertSQLQuery (){
            $values = "'$this->name', '$this->surname', '$this->dni', '$this->password', '$this->email', '$this->password', '$this->cardNumber'";
            $sql = "INSERT INTO customer (name, surname, dni, password, email, phone, card_number) VALUES ($values)";
            return $sql;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of surname
         */ 
        public function getSurname()
        {
                return $this->surname;
        }

        /**
         * Set the value of surname
         *
         * @return  self
         */ 
        public function setSurname($surname)
        {
                $this->surname = $surname;

                return $this;
        }

        /**
         * Get the value of dni
         */ 
        public function getDni()
        {
                return $this->dni;
        }

        /**
         * Set the value of dni
         *
         * @return  self
         */ 
        public function setDni($dni)
        {
                $this->dni = $dni;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of phone
         */ 
        public function getPhone()
        {
                return $this->phone;
        }

        /**
         * Set the value of phone
         *
         * @return  self
         */ 
        public function setPhone($phone)
        {
                $this->phone = $phone;

                return $this;
        }

        /**
         * Get the value of cardNumber
         */ 
        public function getCardNumber()
        {
                return $this->cardNumber;
        }

        /**
         * Set the value of cardNumber
         *
         * @return  self
         */ 
        public function setCardNumber($cardNumber)
        {
                $this->cardNumber = $cardNumber;

                return $this;
        }
    }

?>
