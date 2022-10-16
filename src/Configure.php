<?php

namespace App;

/**
 * Class for configure
 */
class Configure
{
    /**
     * Path for folder of logs
     *
     * @var string
     */
    public string $FilePath;

    /**
     * Raw array of configure options
     *
     * @var array
     */
    public array $RawConfig;

    public string $LogEMERGENCY = "log.log";
    public string $LogALERT = "log.log";
    public string $LogCRITICAL = "log.log";
    public string $LogERROR = "log.log";
    public string $LogWARNING = "log.log";
    public string $LogNOTICE = "log.log";
    public string $LogINFO = "log.log";
    public string $LogDEBUG = "log.log";

    public array $adapters=[];

    public function __construct(string $path)
    {
        $this->getConfigure($path);
        $this->setFilePath();
        $this->setLogLevelFiles();
        $this->setAdapters();
    }

    /**
     * Get configure from remote file/array
     *
     * @param string $path
     * @return void
     */
    public function getConfigure(string $path): void
    {
        if (file_exists($path)) {
            $this->RawConfig = require $path;
        } else {
            $this->RawConfig = require "config/defaultConfig.php";
        }
    }
    /**
     * Set path to folder with logs
     * @return void
     */
    private function setFilePath(): void
    {
        if (array_key_exists("file_path", $this->RawConfig) && is_string($this->RawConfig['file_path'])&& !empty($this->RawConfig['file_path'])) {
            $this->FilePath = dirname(__FILE__, 2)."/".$this->RawConfig['file_path']."/";
        } else {
            $this->FilePath=dirname(__FILE__, 2)."/log/";
        }
    }
    /**
     * Set other path for level
     * @return void
     */
    private function setLogLevelFiles(): void
    {
        if (array_key_exists("log_level_files", $this->RawConfig)&& is_array($this->RawConfig['log_level_files'])) {
            array_map(function ($key, $el): void {
                switch($key) {
                    case "EMERGENCY":
                        if (!empty($el)) {
                            $this->LogEMERGENCY = $el;
                        }
                        break;
                    case "ALERT":
                        if (!empty($el)) {
                            $this->LogALERT = $el;
                        }
                        break;
                    case "CRITICAL":
                        if (!empty($el)) {
                            $this->LogCRITICAL = $el;
                        }
                        break;
                    case "ERROR":
                        if (!empty($el)) {
                            $this->LogERROR = $el;
                        }
                        break;
                    case "WARNING":
                        if (!empty($el)) {
                            $this->LogWARNING = $el;
                        }
                        break;
                    case "NOTICE":
                        if (!empty($el)) {
                            $this->LogNOTICE = $el;
                        }
                        break;
                    case "INFO":
                        if (!empty($el)) {
                            $this->LogINFO = $el;
                        }
                        break;
                    case "DEBUG":
                        if (!empty($el)) {
                            $this->LogDEBUG = $el;
                        }
                        break;
                }
            }, array_keys($this->RawConfig['log_level_files']), $this->RawConfig["log_level_files"]);
        }
    }
    /**
     * @todo check on empty and type
     *
     * @return void
     */
    private function setAdapters(): void
    {
        if (array_key_exists('adapters', $this->RawConfig['adapters']) && is_array($this->RawConfig['adapters'])) {
            $this->adapters = $this->RawConfig['adapters'];
        }
    }
}
