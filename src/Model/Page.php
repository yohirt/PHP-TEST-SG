<?php

namespace Snowdog\DevTest\Model;

use Snowdog\DevTest\Model\WebsiteManager;
// use Snowdog\DevTest\Core\Database;

class Page
{


    public $page_id;
    public $url;
    public $website_id;
    public $time_visit;

    public function __construct()
    {

        $this->website_id = intval($this->website_id);
        $this->page_id = intval($this->page_id);
        $this->time_visit = date('Y-m-d H:i:s');


    }

    /**
     * @return int
     */
    public function getPageId()
    {
        return $this->page_id;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return int
     */
    public function getWebsiteId()
    {
        return $this->website_id;
    }
}
