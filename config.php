<?php
$serverName = "4633-project-server.database.windows.net\\4633-API"; //serverName\instanceName
$connectionInfo = array( "Database"=>"4633-API", "UID"=>"clouddev", "PWD"=>"password1");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
    echo "Connection established.<br />";
}else{
    echo "Connection could not be established.<br />";
    die( print_r( sqlsrv_errors(), true));
}
?>
