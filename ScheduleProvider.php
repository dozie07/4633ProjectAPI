<?php
include './IScheduleProvider.php';
include './ScheduleService.php';
include './Match.php';

class ScheduleProvider implements IScheduleProvider {
    public $scheduleService;
     public $conn;
    
    public function __construct() {
        $this->scheduleService = new ScheduleService();
        $serverName = "4633-project-server.database.windows.net";
        $connectionOptions = array(
        "Database" => "4633-API",
        "Uid" => "clouddev",
        "PWD" => "password1!"
        );
        $this->conn = sqlsrv_connect($serverName, $connectionOptions);
        if( $this->conn === false ) {
            die( print_r( sqlsrv_errors(), true));
        };
    }

    public function getScheduleByTeam($team1) {
        $tsql = "SELECT * FROM [dbo].[ScheduleCopy]
            WHERE HomeTeam = '$team1'
            OR AwayTeam = '$team1'
            ORDER BY HomeTeam";
        $getResults= sqlsrv_query($this->conn, $tsql);
        if ($getResults === false) {
            echo (sqlsrv_errors());
        }
        while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_BOTH)) {
            $team1 = $row['HomeTeam'];
            $team2 = $row['AwayTeam'];
            $location = $row['MatchLocation'];
            $date = $row['MatchDateString'];
            $match = new Match($team1, $team2, $location, $date);
            $this->scheduleService->addMatch($match);
        }
    }

    public function getScheduleByLocation($location) {
        $tsql = "SELECT * FROM [dbo].[ScheduleCopy]
            WHERE MatchLocation = '$location'
            ORDER BY MatchDate";
        $getResults= sqlsrv_query($this->conn, $tsql);
        if ($getResults === false) {
            echo (sqlsrv_errors());
        }
        while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_BOTH)) {
            $team1 = $row['HomeTeam'];
            $team2 = $row['AwayTeam'];
            $location = $row['MatchLocation'];
            $date = $row['MatchDateString'];
            $match = new Match($team1, $team2, $location, $date);
            $this->scheduleService->addMatch($match);
        }
    }

    public function getScheduleByMonth($month) {
        $tsql = "SELECT * FROM [dbo].[ScheduleCopy]
            WHERE MONTH(MatchDate) = '$month'
            ORDER BY MatchDate";
        $getResults= sqlsrv_query($this->conn, $tsql);
        if ($getResults === false) {
            echo (sqlsrv_errors());
        }
        while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_BOTH)) {
            $team1 = $row['HomeTeam'];
            $team2 = $row['AwayTeam'];
            $location = $row['MatchLocation'];
            $date = $row['MatchDateString'];
            $match = new Match($team1, $team2, $location, $date);
            $this->scheduleService->addMatch($match);
        }
    }
    
    public function getScheduleByLeague($league) {
        $tsql = "SELECT * FROM [dbo].[ScheduleCopy]
            WHERE Competition = '$league'
            ORDER BY MatchDate";
        $getResults= sqlsrv_query($this->conn, $tsql);
        if ($getResults === false) {
            echo (sqlsrv_errors());
        }
        while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_BOTH)) {
            $team1 = $row['HomeTeam'];
            $team2 = $row['AwayTeam'];
            $location = $row['MatchLocation'];
            $date = $row['MatchDateString'];
            $match = new Match($team1, $team2, $location, $date);
            $this->scheduleService->addMatch($match);
        }
    }

    public function returnService() {
        return $this->scheduleService;
    }
}
?>
