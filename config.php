<?php
    $serverName = "4633-project-server.database.windows.net";
    $connectionOptions = array(
        "Database" => "4633-API",
        "Uid" => "clouddev",
        "PWD" => "password1!"
    );
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if( $conn === false ) {
        die( print_r( sqlsrv_errors(), true));
    };
?>