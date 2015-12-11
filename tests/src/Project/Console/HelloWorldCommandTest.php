<?php
namespace Project\Console;

/**
 * Defines the hello world command tests
 */
class HelloWorldCommandTest extends ApplicationTestCase
{
    /**
     * Tests calling the command without options
     */
    public function testWithoutOptions()
    {
        $this->call("hello:world", [], [], [], false)
            ->assertResponse
            ->outputEquals("Hello, world!" . PHP_EOL);
    }

    /**
     * Tests calling the command with the yell option
     */
    public function testYelling()
    {
        $this->call("hello:world", [], ["--yell"], [], false)
            ->assertResponse
            ->outputEquals("HELLO, WORLD!" . PHP_EOL);
    }
}