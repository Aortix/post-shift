<?php

class Footer
{
    private $cliffnote = "Bottom";

    function __construct()
    {
        print "Does the footer work?";
    }

    function getCliffNote()
    {
        return $this->cliffnote;
    }
}
