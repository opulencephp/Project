<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines an example test
 */
namespace Project;

class ExampleTest extends HTTPApplicationTestCase
{
    /**
     * Tests that the 404 template is set up correctly
     */
    public function test404PageIsSetUpCorrectly()
    {
        $this->route("GET", "/doesNotExist");
        $this->checkMasterTemplateSetup();
        $this->assertResponseNotFound();
        $this->assertTemplateVarEquals("title", "404 Error");
    }

    /**
     * Tests that the edit template is set up correctly
     */
    public function testEditPageIsSetUpCorrectly()
    {
        $this->route("GET", "/edit");
        $this->checkMasterTemplateSetup();
        $this->assertResponseOK();
        $this->assertTemplateVarEquals("title", "Editing This Project");
    }

    /**
     * Tests that the home template is set up correctly
     */
    public function testHomePageIsSetUpCorrectly()
    {
        $this->route("GET", "/");
        $this->checkMasterTemplateSetup();
        $this->assertResponseOK();
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