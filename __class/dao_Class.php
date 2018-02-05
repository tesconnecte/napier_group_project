<?php
    class DAO {
        private $db;
        private $dbname = "social_media_memories";
        private $host = "127.0.0.1";
        private $dbuser = "root";
        private $dbpass = "";

        // Opens the database
        function __construct()
        {
            try {
                $this->db = new PDO("mysql:dbname=$this->dbname;host=$this->host", $this->dbuser, $this->dbpass);
            } catch (PDOException $e) {
                die("Connection error:   " . $e->getMessage());
            }
        }

        function getUsers()
        {
            $req = "select * from user";
            $sth = $this->db->query($req);
            $result = $sth->fetchAll();
            return $result;
        }

        function connection($login,$password) {
            $req = "select * from login where username='$login' and password='$password';";
            $sth = $this->db->query($req);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $result[0];
        }


    }


?>