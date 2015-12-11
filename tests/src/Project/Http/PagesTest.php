<?php
namespace Project\Http;

/**
 * Defines the page tests
 */
class PagesTest extends IntegrationTestCase
{
    /**
     * Tests that the 404 template is set up correctly
     */
    public function test404PageIsSetUpCorrectly()
    {
        $this->get("/doesNotExist")
            ->go()
            ->assertResponse
            ->isNotFound();
    }

    /**
     * Tests that the home template is set up correctly
     */
    public function testHomePageIsSetUpCorrectly()
    {
        $this->get("/")
            ->go()
            ->assertResponse
            ->isOK();
        $this->assertView->varEquals("title", "My First Opulence Application");
        $this->checkMasterTemplateSetup();
    }

    /**
     * Tests that the master template is set up correctly
     */
    private function checkMasterTemplateSetup()
    {
        $this->assertView->varEquals("metaKeywords", [])
            ->varEquals("metaDescription", "")
            ->varEquals("css", "/assets/css/style.css");
    }
}