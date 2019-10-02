<?php

namespace Snowdog\DevTest\Controller;

use Snowdog\DevTest\Model\User;
use Snowdog\DevTest\Model\UserManager;
use Snowdog\DevTest\Model\WebsiteManager;

class IndexAction
{

    /**
     * @var WebsiteManager
     */
    private $websiteManager;

    /**
     * @var User
     */
    private $user;

    public function __construct(UserManager $userManager, WebsiteManager $websiteManager)
    {
        $this->websiteManager = $websiteManager;
        if (isset($_SESSION['login'])) {
            $this->user = $userManager->getByLogin($_SESSION['login']);
        }
    }

    protected function getWebsites()
    {
        if($this->user) {
            return $this->websiteManager->getAllByUser($this->user);
        } 
        return [];
    }
    public function getCounterWebsites()
    {
        return $this->websiteManager->countWebsitesByUser($this->user);
    }
    public function MostRecentlyVisitedPage()
    {
        return $this->websiteManager->getMostRecentlyVisitedPage($this->user);
    }
    public function LastRecentlyVisitedPage()
    {
        return $this->websiteManager->getLastRecentlyVisitedPage($this->user);
    }

    public function execute()
    {
        require __DIR__ . '/../view/index.phtml';
    }
}