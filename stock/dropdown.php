<html>
 <head>
  <link rel="stylesheet" type="text/css" href="simple-calendar/tcal.css" />
    <script type="text/javascript" src="simple-calendar/tcal_en.js">
     </script>
    
    </head>
    <body>
<form action=index.php method="post" onSubmit="return ValidateForm();" onSubmit="return checkdate();">
<p>
What interval to see data do you prefer?</p>
<select name="period">
  <option value="">Select...</option>
  <option value="month">every month</option>
  <option value="week">every week</option>
	<option value="day">every day</option>
	<option value="intraday">every 5 mins</option>
</select>
  
    <table id="dates"><TR><TD><label for="start_date">Start Date:</label></TD>
                <TD><input type="date" id="start_date" name="start_date" class="tcal" value="" onChange="checkdate(this)" /></TD>
            </TR>

            <TR>
                <TD><label for="end_date">End Date:</label></TD>
                <TD><input type="date" id="end_date" name="end_date" class="tcal" value="" onChange="checkdate(this)"/></TD>
            </TR>
        </table>
    
<script>
function myFunction() {
  document.getElementById("dates").innerHTML = "Paragraph changed!";
}
</script>
    
<input type="submit" name="formSubmit" value="Submit" />
</form>	
</body>	
	</html>
<?php 
if(isset($_POST['formSubmit'])) 
{ 
  $period = $_POST['period'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  $errorMessage = "";
  
  if(empty($period)) 
  {
    $errorMessage = "<li>You forgot to select a period!</li>";
  }
   
  if(empty($start_date)) 
  {
    $errorMessage = "<li>You forgot to select a start of  period!</li>";
  }
       
  if(empty($end_date)) 
  {
    $errorMessage = "<li>You forgot to select the end of period!</li>";
  }
  if($errorMessage != "") 
  {
    echo("<p>There was an error with your form:</p>\n");
    echo("<ul>" . $errorMessage . "</ul>\n");
  } 
    /*if($period=='intraday')
    {
        include ("intradate.php");
    }
    else {
        include ("dates.php");
    }
    }*/
 /* else 
  {
     
    switch($period)
    {
      case "month": $period = "month"; 
            break;
      case "week": $period = "week"; 
            break;
      case "day": $period = "day"; 
            break;
      case "intraday": $period = "intraday"; 
            break;
      default: echo("Error!"); 
            exit(); 
            break;
    }*/
}

    
  



?>