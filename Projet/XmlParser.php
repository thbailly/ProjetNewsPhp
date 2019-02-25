<?php

class XmlParser
{
    private $path;
    private $con;

    public function __construct(Connexion $con)
    {
        $this -> con = $con;
    }

    public function resetNews(){
        $query = 'DELETE FROM NEWS WHERE DATEDIFF(CURDATE(), datePubli) > 7';
        $this->con->executeQuery($query);
    }

    public function parseAll(){
        $this->resetNews();
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
                if (NewsGateway::findByNews($news,$this->con) == NULL){
                   /*echo "<p>$item->title </p>";
                    echo "<p> $datePubli </p>";
                    echo "<p> $item->link</p>";*/
                    NewsGateway::insertNews2($news,$this->con);
                }
            }
        }


    }
}