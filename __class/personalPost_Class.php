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

        /**
         * @return mixed
         */
        public function getDescription()
        {
            return $this->description;
        }

        /**
         * @param mixed $description
         */
        public function setDescription($description)
        {
            $this->description = $description;
        }

        /**
         * @return mixed
         */
        public function getImage()
        {
            return $this->image;
        }

        /**
         * @param mixed $image
         */
        public function setImage($image)
        {
            $this->image = $image;
        }

        /**
         * @return mixed
         */
        public function getText()
        {
            return $this->text;
        }

        /**
         * @param mixed $text
         */
        public function setText($text)
        {
            $this->text = $text;
        }


    }
