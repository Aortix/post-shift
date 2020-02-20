<?php

class Footer
{
    private $cliffnote = "Bottom";

    public function __construct()
    {
        print "Does the footer work?";
    }

    public function getCliffNote()
    {
        return $this->cliffnote;
    }
}
