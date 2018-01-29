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
    }
?>