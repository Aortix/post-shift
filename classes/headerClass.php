<?php

class Header
{
    private $title;
    private $description;

    public function __construct($title, $description)
    {
        if (empty($title)) {
            $this->title = "post-shift";
        } else {
            $this->title = $title;
        }

        if (empty($description)) {
            $this->description = "Just another WordPress theme.";
        } else {
            $this->description = $description;
        }
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }
}
