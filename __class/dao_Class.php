<?php
    //require_once ("album_Class.php");
    //require_once ("post_class.php");
    //require_once ("personalPost_class.php");
    //require_once ("user_Class.php");
    require_once ("autoload_Class.php");
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

        // Returns an object Album given his id
        function getAlbum($id)
        {
            $req = $this->db->prepare("select * from album where id = :id;");
            $req->execute(array(':id' => $id));
            $result = $req->fetchAll();
            $req2 = $this->db->prepare("select ua.userid
                    from Useralbums ua 
                    where ua.albumid = :id ");
            $req2->execute(array(':id' => $id));
            $result2 = $req2->fetchAll();
            if(!empty($result)&&!empty($result2))
            {
                $album = new Album($result[0]['id'],$result[0]['name'],$result[0]['isPublic'],$result2[0]['userid']);
            }
            return $album;
        }

        // Returns an object Post given his id
        function getPost($id)
        {
            $req = $this->db->prepare("select * from personnalpost where id = :id;");
            $req->execute(array(':id' => $id));
            $result = $req->fetchAll();
            $req2 = $this->db->prepare("select ap.albumid
                    from AlbumPost ap
                    where ap.postid = :id ");
            $req2->execute(array(':id' => $id));
            $result2 = $req2->fetchAll();
            if(!empty($result)&&!empty($result2)){
                $post = new Personalpost($result[0]['id'],$result[0]['link'],$result2[0]['albumid'],$result[0]['description'],$result[0]['image'],$result[0]['text']);
            }
            return $post;
        }

        // Returns a list of albums owned by an user
        function getAlbums ($userId)
        {
            $req = $this->db->prepare("select a.* 
                                                from Album a, useralbums ua 
                                                where a.id = ua.albumid
                                                and ua.userid = :id");
            $req->execute(array(':id' => $userId));
            $result = $req->fetchAll();
            $albums = array();
            if(!empty($result)){
                for ($i=0; $i<count($result); $i++){
                    $req2 = $this->db->prepare("select ua.userid
                    from Useralbums ua 
                    where ua.albumid = :id ");
                    $req2->execute(array(':id' => $result[$i]['id']));
                    $result2 = $req2->fetchAll();
                    if(!empty($result2)) {
                        $album = new Album($result[$i]['id'], $result[$i]['name'], $result[$i]['isPublic'], $result2[0]['userid']);
                        $albums[$i] = $album;
                    }
                }
            }
            return $albums;
        }

        // Returns a list of posts contained by an Album
        function getPosts ($albumId)
        {
            $req = $this->db->prepare("select p.* 
                                                from Personnalpost p, albumpost ap
                                                where p.id = ap.postid
                                                and ap.albumid = :id");
            $req->execute(array(':id' => $albumId));
            $result = $req->fetchAll();
            $posts = array();
            if(!empty($result)){
                for ($i=0; $i<count($result); $i++){
                    $req2 = $this->db->prepare("select ap.albumid
                    from AlbumPost ap
                    where ap.postid = :id ");
                    $req2->execute(array(':id' => $result[$i]['id']));
                    $result2 = $req2->fetchAll();
                    //var_dump($result2[0]['albumid']);
                    if(!empty($result2)) {
                        $post = new Personalpost($result[$i]['id'], $result[$i]['link'], $result2[0]['albumid'], $result[$i]['description'], $result[$i]['image'], $result[$i]['text']);
                        $posts[$i] = $post;
                    }
                }
            }
            return $posts;
        }

        function getUser($id)
        {
            $req = $this->db->prepare("select *
                                                from user
                                                where id=:id");
            $req->execute(array(':id' => $id));
            $result = $req->fetchAll();
            if(!empty($result)){
                $user = new User($result[0]['id'],$result[0]['firstname'],$result[0]['surname'],$result[0]['email'],'Hidden',$result[0]['birthdate'],null);
            }
            return $user;
        }

        function getUserByEmail($email)
        {
            $req = $this->db->prepare("select *
                                                from user
                                                where email=:email");
            $req->execute(array(':email' => $email));
            $result = $req->fetchAll();
            if(!empty($result)){
                $user = new User($result[0]['id'],$result[0]['firstname'],$result[0]['surname'],$result[0]['email'],'Hidden',$result[0]['birthdate'],null);
            }
            return $user;
        }

        // Creates a user
        function insertUser($firstName, $surname, $email, $password, $birthDate)
        {
            $req = $this->db->prepare("insert into user(firstname,surname,email,password,birthdate) values(:fn,:sn,:em,:pw,STR_TO_DATE(:bd,'%d-%m-%Y'));");
            $req->execute(array(':fn' => $firstName,':sn' => $surname,':em' => $email, ':pw' => $password, ':bd' => $birthDate));
        }

        // Creates an album and adds its associated user to the users that have access to this album
        function insertAlbum($name,$isPublic,$user)
        {
            $req = $this->db->prepare("insert into album(name,isPublic) values(:name,:isPublic);");
            $req->execute(array(':name' => $name,':isPublic' => $isPublic));

            $req2 = $this->db->prepare("select MAX(id) as id
                    from album ");
            $req2->execute();
            $result2 = $req2->fetchAll();

            if(!empty($result2)) {
                $req3 = $this->db->prepare("insert into useralbums values(:user,:albumId);");
                $req3->execute(array(':user' => $user, ':albumId' => $result2[0]['id']));
            }
        }

        function insertPost($link,$description,$image,$text,$albumid)
        {

            $req = $this->db->prepare("insert into personnalpost(link,description,image,text) values(:link, :desc, :image, :text);");
            $req->execute(array(':link' => $link, ':desc' => $description, ':image' => $image, ':text' => $text));

            $req2 = $this->db->prepare("select MAX(id) as id
                    from personnalpost ");
            $req2->execute();
            $result2 = $req2->fetchAll();

            if(!empty($result2)) {
                $req3 = $this->db->prepare("insert into albumpost values(:albumId,:postId);");
                $req3->execute(array(':albumId' => $albumid, ':postId' => $result2[0]['id']));
            }
        }

        function deleteAlbum($id)
        {
            $req2 =  $this->db->prepare("delete from albumpost where albumid=:id;");
            $req2->execute(array(':id' => $id));

            $req3 =  $this->db->prepare("delete from useralbums where albumid=:id;");
            $req3->execute(array(':id' => $id));

            $req = $this->db->prepare("delete from album where id=:id;");
            $req->execute(array(':id' => $id));
        }

        function deletePost($id)
        {
            $req2 =  $this->db->prepare("delete from albumpost where postid=:id;");
            $req2->execute(array(':id' => $id));

            $req = $this->db->prepare("delete from personnalpost where id=:id;");
            $req->execute(array(':id' => $id));
        }

        function updateAlbum($id,$name,$isPublic)
        {
            $req = $this->db->prepare("Update album set name=:name where id=:id;");
            $req->execute(array(':name' => $name, ':id' => $id));

            $req2 = $this->db->prepare("Update album set isPublic=:isP where id=:id;");
            $req2->execute(array(':isP' => $isPublic, ':id' => $id));
        }

        function updatePost($id,$link,$description,$image,$text)
        {
            $req = $this->db->prepare("Update personnalpost set link=:link where id=:id");
            $req->execute(array(':id' => $id, ':link' => $link));

            $req = $this->db->prepare("Update personnalpost set description=:desc where id=:id");
            $req->execute(array(':id' => $id, ':desc' => $description));

            $req = $this->db->prepare("Update personnalpost set image=:image where id=:id");
            $req->execute(array(':id' => $id, ':image' => $image));

            $req = $this->db->prepare("Update personnalpost set text=:text where id=:id");
            $req->execute(array(':id' => $id, ':text' => $text));
        }

        function updateUser($userid, $firstName, $surname,  $email,  $birthDate){
                $req = $this->db->prepare("update user set firstname=:fn, surname=:sn, email=:em, birthdate=STR_TO_DATE(:bd,'%d-%m-%Y') where id=:uid");
                $req->execute(array(':fn' => $firstName,':sn' => $surname,':em' => $email, ':bd' => $birthDate, ':uid' => $userid));
        }

        function updateUserPassword($userid, $password){
            $req = $this->db->prepare("update user set password=:ps where id=:uid");
            $req->execute(array(':ps' => $password, ':uid' => $userid));
        }

        function connection($email,$password)
        {
            $req = $this->db->prepare("select id, firstname, surname, email, birthdate from user where user.email = :e and user.password = :p");
            $req->execute(array(':e' => $email, ':p' => $password));
            $result = $req->fetchAll();
            $user = null;
            if(!empty($result)){
                $user = new User($result[0]['id'],$result[0]['firstname'],$result[0]['surname'],$result[0]['email'],'Hidden',$result[0]['birthdate'],null);
            }

            return $user;
        }


    }


?>