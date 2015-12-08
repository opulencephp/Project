<?php
namespace Project\Http;

/**
 * Defines the page tests
 */
class PagesTest extends ApplicationTestCase
{
    /**
     * Tests that the 404 template is set up correctly
     */
    public function test404PageIsSetUpCorrectly()
    {
        $this->get("/doesNotExist")
            ->go()
            ->assertResponseIsNotFound();
    }

    /**
     * Tests that the home template is set up correctly
     */
    public function testHomePageIsSetUpCorrectly()
    {
        $this->get("/")
            ->go()
            ->assertResponseIsOK()
            ->assertViewVarEquals("title", "My First Opulence Application");
        $this->checkMasterTemplateSetup();
    }

    /**
     * Tests that the master template is set up correctly
     */
    private function checkMasterTemplateSetup()
    {
        $this->assertViewVarEquals("metaKeywords", []);
        $this->assertViewVarEquals("metaDescription", "");
        $this->assertViewVarEquals("css", "/assets/css/style.css");
    }
}