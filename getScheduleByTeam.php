<?php
    header("Access-Control-Allow-Origin: *");
    //header("Content-Type: application/json; charset=UTF-8");

    include './ScheduleProvider.php';

    $provider = new ScheduleProvider();
    $team1 = "team1";
    $team1 = $_POST["team1"];
    $provider->getScheduleByTeam($team1);
    echo json_encode($provider->returnService()->returnMatches());
?>