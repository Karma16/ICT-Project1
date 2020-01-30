
<html>
    <head>
  <link rel="stylesheet" type="text/css" href="simple-calendar/tcal.css" />
    <script type="text/javascript" src="simple-calendar/tcal_en.js"></script>
    </head>
    <body>
        
    </body>
</html>
    <?php
header("Refresh: 60");

include('dropdown.php');

require ('functions.php');

$API_KEY = "5ARVF4ITHJJT44GH";
    $dates = [];
echo "start date: ".$start_date.'<br/>';
echo "end date: ".$end_date.'<br/>';

 echo $period;   
   $atts = array(
    'width' => '600',
    'height' => '410',
    'time' => 'intraday',
    'number' => '90',
    'size' => 'compac', /* compac or full */
    'interval' => '5', /* 1min, 5min, 15min, 30min, 60min */
    'apikey' => '5ARVF4ITHJJT44GH',
    'cache' => 3600
  );
   
    
date_default_timezone_set('America/New_York');

    switch ($period) {
        case 'intraday':
            $series = 'TIME_SERIES_INTRADAY';
            $series_name = 'Time Series (' . $atts['interval'] . 'min)';
            $today=$today_min;
     $dates=get_5mins($start_date,$end_date);
            break;
        case 'day':
            $series = 'TIME_SERIES_DAILY';
            $series_name = 'Time Series (Daily)';
            $atts['interval'] ='';
          $dates=get_days($start_date,$end_date); 
      
            break;
        case '3':
            $series = 'TIME_SERIES_DAILY_ADJUSTED';
            $series_name = 'Time Series (Daily)';
            break;
        case 'week':
            $series = 'TIME_SERIES_WEEKLY';
            $series_name = 'Weekly Time Series';
            $dates = get_weeks($start_date, $end_date);  
            break;
        case 'month':
            $series = 'TIME_SERIES_MONTHLY';
            $series_name = 'Monthly Time Series';
            $dates = get_months($start_date, $end_date); 
            break;
        default:
            $series = 'Time Series (Daily)';
            break;
    }
//JSON

echo '  series: '.$series_name.'<br/>';

$url="https://www.alphavantage.co/query?function=".$series."&symbol=GOOGL&interval=" . $atts['interval'] . "min&apikey=".$atts['apikey'];
    
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,($url));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);
curl_close ($ch);
$result = json_decode($server_output);



$dataForAllDays = $result->{$series_name};

$dataForSingleDate = $dataForAllDays->{$today}; 


$counter=0;
foreach ($dates as $value){ 
     
    $dayofweek = date('l', strtotime($value));
  
     if ($dayofweek='Sunday' or $dayofweek='Saturday' )
    {
        if($period=='month')
            { 
            $dayofweek = date('l', strtotime($value)); 
            if ($dayofweek=='Sunday')
                    $value = date('Y-m-d',strtotime("".$value." -2 days"));
            if ($dayofweek=='Saturday')
                    $value = date('Y-m-d',strtotime("".$value." -1 day"));
            }
    }
             
  $dataForSingleDate = $dataForAllDays->{$value}; 
    while (empty($dataForSingleDate))
        
    {   
        $counter = $counter+1;
        $value = date('Y-m-d',strtotime("".$value." -".$counter." day"));
        $dataForSingleDate = $dataForAllDays->{$value}; 
        
    }
    
    if (!empty($dataForSingleDate))
    {
        echo '<br/>';
echo ''.$value.'<br/>';
$open = $dataForSingleDate->{'1. open'};
echo  $open. '<br/>';
echo $dataForSingleDate->{'2. high'} . '<br/>';
echo $dataForSingleDate->{'3. low'} . '<br/>';
echo $dataForSingleDate->{'4. close'} . '<br/>';
echo $dataForSingleDate->{'5. volume'} . '<br/>';
    }

       }

//include ('record.php');
?>

