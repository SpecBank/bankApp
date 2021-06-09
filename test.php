<?php
$then = new DateTime(date("2021-03-17 17:34:47"));
$now = new DateTime(date("Y-m-d H:i:s"));
$interval= $now->diff($then);
echo $interval->h;

?>