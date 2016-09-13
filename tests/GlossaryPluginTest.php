<?php

require dirname(__DIR__) . '/functions.php';

class GlossarytTest extends PHPUnit_Framework_TestCase
{

    public function testTemplateGeneration()
    {
        $this->assertTrue(function_exists('get_glossary'));
    }

    /**
     * @expectedFalse
     */
    public function testReturnFalseIfNoArgumentsPassed()
    {
        // No arguments
        $this->assertFalse(get_glossary());
    }

    public function testReturnContent()
    {
        $this->assertEquals('fake-term', get_glossary(array('term'=>'blah'), 'fake-term'));
        $this->assertEquals('fake-term', get_glossary(array('term'=>''), 'fake-term'));
        $this->assertEquals('<span class="research-guide-glossary-term" title="Agreement between copyright holder and maker of work.">assignments</span>', get_glossary(array('term'=>'assignments'), ''));
        $this->assertEquals('<span class="research-guide-glossary-term" title="Agreement between copyright holder and maker of work.">assignment</span>', get_glossary(array('term'=>'assignments'), 'assignment'));
    }


}
