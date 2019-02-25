<?php
/**
 * Created by PhpStorm.
 * User: Thibaut
 * Date: 27/12/2018
 * Time: 17:17
 */
class XmlParser
{
    private $path;
    private $result;
    private $con;

    public function __construct(Connexion $con)
    {
        $this -> con = $con;
    }

    public function getResult(){
        return $this -> result;
    }

    public function parseAll(){
        $query = 'SELECT guid FROM FLUX';
        $this->con->executeQuery($query);
        $res = $this->con->getResults();
        foreach ($res as $row) {
            $this->path = $row[0];
            if(Validation::validerRSS($this->path))
                $this->parse();
        }
    }

    public function parse(){

        if(!($rss = simplexml_load_file($this->path))) return;
        if($rss->count() == 0) return;
        foreach ($rss->channel->item as $item){
            $titre = Validation::sanitizeString($item->title);
            $guid = Validation::sanitizeString($item->link);
            $url = Validation::sanitizeString($item->link);
            $datePubli=Validation::sanitizeString($item->pubDate);
            $datePubli = date_create($datePubli);
            $datePubli = date_format($datePubli,'Y-m-d');
            if(isset($titre) && isset($guid) && isset($url) && isset($datePubli)){
                $news = new News($titre,$guid,$url,$datePubli);
                if (($test = NewsGateway::findByNews($news,$this->con)) == NULL){
                    echo "<p>$item->title </p>";
                    echo "<p> $datePubli </p>";
                    echo "<p> $item->link</p>";
                    NewsGateway::insertNews2($news,$this->con);
                }
            }
        }


    }
}