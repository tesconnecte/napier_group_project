<?php
    require_once ('post_Class.php');
    class personalPost extends Post {
        public $description; // description of the post
        public $image; // Optional - link of the image
        public $text; // Optional - text of the post

        public function __construct($description, $image, $text)
        {
            $this->description = $description;
            $this->image = $image;
            $this->text = $text;
        }


    }
