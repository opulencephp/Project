<?php
namespace Project\Application\Console;

/**
 * Defines the hello world command tests
 */
class HelloWorldCommandTest extends IntegrationTestCase
{
    /**
     * Tests calling the command without options
     */
    public function testWithoutOptions()
    {
        $this->command('hello:world')
            ->withStyle(false)
            ->execute()
            ->assertResponse
            ->outputEquals('Hello, world!' . PHP_EOL);
    }

    /**
     * Tests calling the command with the yell option
     */
    public function testYelling()
    {
        $this->command('hello:world')
            ->withOptions('--yell')
            ->withStyle(false)
            ->execute()
            ->assertResponse
            ->outputEquals('HELLO, WORLD!' . PHP_EOL);
    }
}
