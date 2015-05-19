<?php
/**
 * Defines the hello world command tests
 */
namespace Project\Console;

class HelloWorldCommandTest extends ApplicationTestCase
{
    /**
     * Tests calling the command without options
     */
    public function testWithoutOptions()
    {
        $this->call("hello:world", [], [], [], false);
        $this->assertOutputEquals("Hello, world!" . PHP_EOL);
    }

    /**
     * Tests calling the command with the yell option
     */
    public function testYelling()
    {
        $this->call("hello:world", [], ["--yell"], [], false);
        $this->assertOutputEquals("HELLO, WORLD!" . PHP_EOL);
    }
}