<?php

return[
    "file_path"=>"log",// Log storage path
    "log_level_files"=>[ //Separate logs for levels
        "EMERGENCY"=>"emergency.log",
        "ALERT"=>"alert.log",
        "CRITICAL"=>"critical.log",
        "ERROR"=>"error.log",
        "WARNING"=>"warning.log",
        "NOTICE"=>"notice.log",
        "INFO"=>"info.log",
        "DEBUG"=>"debug.log",
    ],
    "adapters"=>[],// adapters :(
];