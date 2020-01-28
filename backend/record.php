<?php

  
// work with files
    if ($period='month')
    {  $month_file = 'month.txt';
$handle = fopen( $month_file, 'w') or die('Cannot open file:  '.$month_file); //for months data 
    }
   if ($period='week')
     {  $week_file = 'week.txt';
$handle = fopen( $week_file, 'r') or die('Cannot open file:  '.$week_file); //for weeks data 
     }
   if($period='day') 
    {
    $day_file = 'day.txt';
$handle = fopen( $day_file, 'a') or die('Cannot open file:  '.$day_file); // for day 
   fwrite($handle, $today ." ".$open."\n"); 
   }
   if ($period='intraday') 
   {
    $intraday_file = 'intraday.txt';
$handle = fopen( $intraday_file, 'w') or die('Cannot open file:  '.$intraday_file); // for 5 min interval in day
    }

?>