<?php
interface IScheduleProvider {
    public function getScheduleByTeam($team1);

    public function getScheduleByLocation($location);

    public function getScheduleByMonth($month);

    public function returnService();
}
?>