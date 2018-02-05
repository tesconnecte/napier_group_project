<?php
    class Post {
        public $id; // id of the post
        public $link; // link of the post
        public $album; // the album the post belongs to

        public function __construct($id, $link)
        {
            $this->id = $id;
            $this->link = $link;
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
        public function getLink()
        {
            return $this->link;
        }

        /**
         * @param mixed $link
         */
        public function setLink($link)
        {
            $this->link = $link;
        }

        /**
         * @return mixed
         */
        public function getAlbum()
        {
            return $this->album;
        }

        /**
         * @param mixed $album
         */
        public function setAlbum($album)
        {
            $this->album = $album;
        }

    }
?>