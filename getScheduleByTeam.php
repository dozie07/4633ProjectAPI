<?php
    header("Access-Control-Allow-Origin: *");

    echo "fucking hello?";
    include './ScheduleProvider.php';

    $provider = new ScheduleProvider();
    $team1 = $_POST["team1"];
    $team1 = "Eintracht Frankfurt";
    $provider->getScheduleByTeam($team1);
    echo json_encode($provider->returnService()->returnMatches());
?>
