<?php

namespace Snowdog\DevTest\Model;

use Snowdog\DevTest\Core\Database;

class PageManager
{

    /**
     * @var Database|\PDO
     */
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getAllByWebsite(Website $website)
    {
        $websiteId = $website->getWebsiteId();
        /** @var \PDOStatement $query */
        $query = $this->database->prepare('SELECT * FROM pages WHERE website_id = :website');
        $query->bindParam(':website', $websiteId, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_CLASS, Page::class);
    }

    public function create(Website $website, $url)
    {
        $websiteId = $website->getWebsiteId();
        /** @var \PDOStatement $statement */
        $statement = $this->database->prepare('INSERT INTO pages (url, website_id) VALUES (:url, :website)');
        $statement->bindParam(':url', $url, \PDO::PARAM_STR);
        $statement->bindParam(':website', $websiteId, \PDO::PARAM_INT);
        $statement->execute();
        return $this->database->lastInsertId();
    }
    public function addDataVisit(Website $website){
        var_dump("timeVisit pagemanager");
        $time_visit = date('Y-m-d H:i:s');
        $websiteId = $website->getWebsiteId();
        var_dump($websiteId);
        /** @var \PDOStatement $query */
         $query = $this->database->prepare('UPDATE websites SET time_visit = :time_visit WHERE website_id = :website_id');
        $query->bindParam(':website_id', $websiteId, \PDO::PARAM_INT);
        $query->bindParam(':time_visit', $time_visit, \PDO::PARAM_STR);
        $query->execute();
        return $this->database->lastInsertId();
    }

}