<?php
include './IScheduleProvider.php';
include './ScheduleService.php';
include './Match.php';
include './config.php';

class ScheduleProvider implements IScheduleProvider {
    public $scheduleService;

    public function __construct() {
        $this->scheduleService = new ScheduleService();
    }

    public function getScheduleByTeam($team1) {
        echo "making it here";
        $tsql = "SELECT * FROM [dbo].[Schedule]
            WHERE HomeTeam = '$team1'
            OR AwayTeam = '$team1'";
        $getResults= sqlsrv_query($conn, $tsql);
        if ($getResults === false) {
            echo (sqlsrv_errors());
        }
        $schedule = new Schedule();
        while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_BOTH)) {
            $team1 = $row['HomeTeam'];
            $team2 = $row['AwayTeam'];
            $location = $row['Location'];
            $date = $row['MatchDate'];
            $match = new Match($team1, $team2, $location, $date);
            echo $match;
            $schedule->addMatch($match);
            $this->scheduleService->addMatch($match);
        }
    }

    public function getScheduleByLocation($location) {
        //code here
        $team1DatabaseResult = "this field will return team1 for match at " . $location;
        $team2DatabaseResult = "this field will return team2 for match at " . $location;
        $dateDatabaseResult = "this field will return date for match at " . $location;
        $match = new Match($team1DatabaseResult, $team2DatabaseResult, $location, $dateDatabaseResult);
        $this->scheduleService->addMatch($match);
    }

    public function getScheduleByMonth($month) {
        //code here
        $team1DatabaseResult = "this field will return team1 for match during " . $month;
        $team2DatabaseResult = "this field will return team2 for match during " . $month;
        $locationDatabaseResult = "this field will return location for match during " . $month;
        $match = new Match($team1DatabaseResult, $team2DatabaseResult, $locationDatabaseResult, $month);
        $this->scheduleService->addMatch($match);
    }

    public function returnService() {
        return $this->scheduleService;
    }
}
?>
