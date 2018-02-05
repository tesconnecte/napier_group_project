<?php
   class User {
       public $id;   // person's id
       public $firstName;  // person's $firstName
       public $surname; // person's $surname
       public $email; // person's email
       public $password; // person's password
       public $birthDate; // person's birth date
       public $albums; // list of person's albums

       public function __construct($id, $firstName, $surname, $email, $password, $birthDate, $albums)
       {
         $this->id = $id;
         $this->firstName = $firstName;
         $this->surname = $surname;
         $this->email = $email;
         $this->password = $password; // to change
         $this->birthDate = $birthDate;
         $this->albums = $albums; // to change
       }

       /**
        * @return mixed
        */
       public function getId()
       {
           return $this->id;
       }

       /**
        * @param mixed $id
        */
       public function setId($id)
       {
           $this->id = $id;
       }

       /**
        * @return mixed
        */
       public function getFirstName()
       {
           return $this->firstName;
       }

       /**
        * @param mixed $firstName
        */
       public function setFirstName($firstName)
       {
           $this->firstName = $firstName;
       }

       /**
        * @return mixed
        */
       public function getSurname()
       {
           return $this->surname;
       }

       /**
        * @param mixed $surname
        */
       public function setSurname($surname)
       {
           $this->surname = $surname;
       }

       /**
        * @return mixed
        */
       public function getEmail()
       {
           return $this->email;
       }

       /**
        * @param mixed $email
        */
       public function setEmail($email)
       {
           $this->email = $email;
       }

       /**
        * @return mixed
        */
       public function getPassword()
       {
           return $this->password;
       }

       /**
        * @param mixed $password
        */
       public function setPassword($password)
       {
           $this->password = $password;
       }

       /**
        * @return mixed
        */
       public function getBirthDate()
       {
           return $this->birthDate;
       }

       /**
        * @param mixed $birthDate
        */
       public function setBirthDate($birthDate)
       {
           $this->birthDate = $birthDate;
       }

       /**
        * @return mixed
        */
       public function getAlbums()
       {
           return $this->albums;
       }

       /**
        * @param mixed $albums
        */
       public function setAlbums($albums)
       {
           $this->albums = $albums;
       }

   }
?>
