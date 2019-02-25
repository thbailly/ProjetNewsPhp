<?php

class Flux
{
    private $guid;
    private $titre;
    function __construct(string $guid, string $titre)
    {
        $this->guid=$guid;
        $this->titre=$titre;
    }

    function getGuid():String{
        return $this->guid;
    }

    function getTitre():String{
        return $this->titre;
    }
}