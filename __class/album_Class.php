<?php
   class Album {
       public $id;  // album's id
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
       public function getName()
       {
           return $this->name;
       }

       /**
        * @param mixed $name
        */
       public function setName($name)
       {
           $this->name = $name;
       }

       /**
        * @return mixed
        */
       public function getisPublic()
       {
           return $this->isPublic;
       }

       /**
        * @param mixed $isPublic
        */
       public function setIsPublic($isPublic)
       {
           $this->isPublic = $isPublic;
       }

       /**
        * @return mixed
        */
       public function getUsers()
       {
           return $this->users;
       }

       /**
        * @param mixed $users
        */
       public function setUsers($users)
       {
           $this->users = $users;
       }


   }
?>
