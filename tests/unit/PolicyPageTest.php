<?php


namespace Firesphere\ISO27001Compliance\Tests;


use Firesphere\ISO27001Compliance\Pages\PolicyPage;
use SilverStripe\Dev\SapphireTest;

class PolicyPageTest extends SapphireTest
{

    public function testGetCMSFields()
    {
        $page = PolicyPage::create(['Title' => 'Test']);

        $this->assertNotNull($page->getCMSFields());
    }
}
