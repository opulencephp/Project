<?php
/**
 * Defines the page tests
 */
namespace Project\HTTP;

class PagesTest extends ApplicationTestCase
{
    /**
     * Tests that the 404 template is set up correctly
     */
    public function test404PageIsSetUpCorrectly()
    {
        $this->route("GET", "/doesNotExist");
        $this->checkMasterTemplateSetup();
        $this->assertResponseIsNotFound();
        $this->assertViewVarEquals("title", "404 Error");
    }

    /**
     * Tests that the home template is set up correctly
     */
    public function testHomePageIsSetUpCorrectly()
    {
        $this->route("GET", "/");
        $this->checkMasterTemplateSetup();
        $this->assertResponseIsOK();
        $this->assertViewVarEquals("title", "My First Opulence Application");
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