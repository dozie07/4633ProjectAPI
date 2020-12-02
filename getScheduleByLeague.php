<?php
    header("Access-Control-Allow-Origin: *");

    include './ScheduleProvider.php';

    $provider = new ScheduleProvider();
    $league = $_POST["league"];
    $provider->getScheduleByLeague($league);
    echo json_encode($provider->returnService()->returnMatches());
?>
