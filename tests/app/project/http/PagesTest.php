<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the page tests
 */
namespace Project\HTTP;

class PagesTest extends HTTPApplicationTestCase
{
    /**
     * Tests that the 404 template is set up correctly
     */
    public function test404PageIsSetUpCorrectly()
    {
        $this->route("GET", "/doesNotExist");
        $this->checkMasterTemplateSetup();
        $this->assertResponseIsNotFound();
        $this->assertTemplateVarEquals("title", "404 Error");
    }

    /**
     * Tests that the edit template is set up correctly
     */
    public function testEditPageIsSetUpCorrectly()
    {
        $this->route("GET", "/edit");
        $this->checkMasterTemplateSetup();
        $this->assertResponseIsOK();
        $this->assertTemplateVarEquals("title", "Editing This Project");
    }

    /**
     * Tests that the home template is set up correctly
     */
    public function testHomePageIsSetUpCorrectly()
    {
        $this->route("GET", "/");
        $this->checkMasterTemplateSetup();
        $this->assertResponseIsOK();
        $this->assertTemplateVarEquals("title", "My First RDev Application");
    }

    /**
     * Tests that the master template is set up correctly
     */
    private function checkMasterTemplateSetup()
    {
        $this->assertTemplateVarEquals("metaKeywords", []);
        $this->assertTemplateVarEquals("metaDescription", "");
        $this->assertTemplateVarEquals("css", "assets/css/style.css");
    }
}