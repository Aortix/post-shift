<?php

class Header
{
    private $title = "variety-shopping";
    private $description = "A place to find out how to do things for cheap.";

    public function __construct($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
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
