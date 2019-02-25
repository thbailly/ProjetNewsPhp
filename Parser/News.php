<?php
/**
 * Created by PhpStorm.
 * User: legueret
 * Date: 30/11/18
 * Time: 14:46
 */

class News
{
    private $titre;
    private $guid;
    private $url;
    private $datePublication;

    function __construct(string $titre,string $guid,string $url,string $datePublication)
    {
        $this->titre=$titre;
        $this->guid=$guid;
        $this->url=$url;
        $this->datePublication=$datePublication;
    }

    function getTitle():String{
        return $this->titre;
    }

    function getUrl():String{
        return $this->url;
    }

    function getGuid():String{
        return $this->guid;
    }

    function getDatePublication() :String{
        return $this->datePublication;
    }

    public function toString():String{
        return "$this->titre $this->guid $this->url $this->datePublication";
    }

}