<?php
/**
 * Created by PhpStorm.
 * User: legueret
 * Date: 30/11/18
 * Time: 14:44
 */

class NewsGateway
{
    private $con;
    private $nb_news_par_page=10;

    public function __construct(Connexion $con)
    {
        $this->con=$con;
    }

    public function getNbPages():int{
        $nb_news_par_page=10;
        $query='SELECT COUNT(guid) FROM News';
        $this->con->executeQuery($query);
        $total=$this->con->getResults();
        $ftotal=floatval($total);
        $fnbnewsparpage=floatval($nb_news_par_page);
        $nb_pages=ceil($ftotal/$fnbnewsparpage)+1;
        return $nb_pages;
    }

    public function findNews(int $page):array
    {
        //$page=(isset($_GET['p'])) ? abs(intval($_GET['p'])) :1;
        //$page=($page==0) ? 1 : $page;
        $premierNews = ($page - 1) * $this->nb_news_par_page;
        $NbNews = $this->nb_news_par_page;
        $query = "SELECT * FROM News ORDER BY datePubli DESC LIMIT :premierNews,:NbNews";
        $this->con->executeQuery($query, array(
            ':premierNews' => array($premierNews, PDO::PARAM_INT),
            ':NbNews' => array($NbNews, PDO::PARAM_INT)
        ));
        $res = $this->con->getResults();
        foreach ($res as $value) {
            $tabN[] = new News($value['titre'],$value['guid'],$value['url'],$value['datePubli']);
        }
        if (isset($tabN))
            return $tabN;
        else return null;
    }

    public function insertNews(string $titre,string $guid, string $url, string $date)
    {
        $query = 'INSERT INTO News VALUES(:titre,:guid,:url,:datePubli)';
        $this->con->executeQuery($query, array(
            ':titre' => array($titre, PDO::PARAM_STR),
            ':guid' => array($guid, PDO::PARAM_STR),
            ':url' => array($url, PDO::PARAM_STR),
            ':datePubli' => array($date, PDO::PARAM_STR)
        ));
    }

    public function supprimerNews(string $guid){
        $query='DELETE FROM News WHERE guid=:guid';
        $this->con->executeQuery($query,array(
            ':guid'=> array($guid,PDO::PARAM_STR)
        ));
    }

    public static function findByNews(News $news, Connexion $con){
        $query = 'Select * FROM NEWS WHERE guid = :guid';
        $con->executeQuery($query,array(
            ':guid'=>array($news->getGuid(),PDO::PARAM_STR)
        ));
        $res = $con->getResults();
        foreach ($res as $value) {
            $tabN[] = new News($value['titre'],$value['guid'],$value['url'],$value['datePubli']);
        }
        if (isset($tabN))
            return $tabN;
        else return null;
    }

    public static function insertNews2(News $news,Connexion $con)
    {
        $query = 'INSERT INTO News VALUES(:titre,:guid,:url,:datePubli)';
        $con->executeQuery($query, array(
            ':titre' => array($news->getTitle(), PDO::PARAM_STR),
            ':guid' => array($news->getGuid(), PDO::PARAM_STR),
            ':url' => array($news->getUrl(), PDO::PARAM_STR),
            ':datePubli' => array($news->getDatePublication(), PDO::PARAM_STR)
        ));
    }
}