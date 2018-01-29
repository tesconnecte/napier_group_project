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
   }
?>
