<?php
   class Album {
       public $id;   // album's id
       public $name; // name of the Album
       public $isPublic; // boolean to check if the album is plublic or private
       public $users; // list of users that have access to the album

       public function __construct($id, $name, $isPublic, $users)
       {
           $this->id = $id;
           $this->name = $name;
           $this->isPublic = $isPublic;
           $this->users = $users;
       }


   }
?>
