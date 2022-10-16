<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Warning;

class ConfigureTest extends TestCase
{
    /**
     * Path provider
     *
     * @return array
     */
    public function ConfigureProvider(): array
    {
        return [
            ["config/defaultConfig.php"],
        ];
    }


    /**
     *
     * @dataProvider ConfigureProvider
     * @covers Configure::getConfigure
     * @test
     *
     * @return void
     */
    public function Configure(string $path): void
    {
        try {
            require "$path";
            $this->assertTrue(true);
        } catch(Warning) {
            $this->assertTrue(false);
        }
    }

    /**
     * Check path to save logs
     *
     * @depends Configure
     * @dataProvider ConfigureProvider
     * @covers Configure::setFilePath
     * @test
     * @return void
     */
    public function setFilePath(string $path): void
    {
        $FilePath = require "$path";
        $this->assertTrue(is_dir($FilePath['file_path']), "Error option file path is not a dir");
    }

    /**
     * Check configure of logs
     * @depends setFilePath
     * @dataProvider ConfigureProvider
     * @covers Configure::setLogLevelFiles
     * @test
     */
    public function setLogLevelFiles($path): void
    {
        $configure = require "$path";
        $this->assertIsArray($configure['log_level_files'], "Error,log_level_files can't type array");
    }
}
