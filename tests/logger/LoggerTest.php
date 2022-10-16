<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Warning;
use App\Logger;

class LoggerTest extends TestCase
{
    public function Provider(): array
    {
        return [
            ["info","unit message",[]],
            ["error","unit message {key}",["key"=>"***"]],
        ];
    }

    /**
     * Check log method
     *
     * @dataProvider Provider
     *
     * @test
     * @param string $level - current level
     * @param object|string $message - value for sending
     * @param array $context
     */
    public function log(string $level, string|Stringable $message, array $context): void
    {
        try {
            $logger = new Logger();
            $this->assertIsString($level, "Parameter level is not string ");
            $this->assertTrue(is_string($message) or is_object($message), "Parameter message is not string or object");
            $this->assertIsArray($context, "Parmeter context is not array");
            $logger->log($level, $message, $context);
        } catch(InvalidArgumentException) {
            $this->assertTrue(false, "Error Invalid argument exception");
        }
    }
}
