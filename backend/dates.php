<html>
<form action=index.php method="post">
     
    <table>
        
           <TR><TD><label for="start_date">Start Date:</label></TD>
                <TD><input type="date" id="start_date" name="start_date" class="tcal" value="" /></TD>
            </TR>

            <TR>
                <TD><label for="end_date">End Date:</label></TD>
                <TD><input type="date" id="end_date" name="end_date" class="tcal" value="" /></TD>
            </TR>
        </table>
           
    <input type="submit" name="formSubmit" value="Submit" />
    </form>
    </html>

<?php 
if(isset($_POST['formSubmit'])) 
{
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  $errorMessage = "";
  
  if(empty($start_date)) 
  {
    $errorMessage = "<li>You forgot to select a start date!</li>";
  }
    if(empty($end_date)) 
  {
    $errorMessage = "<li>You forgot to select a end date!</li>";
  }
  
  if($errorMessage != "") 
  {
    echo("<p>There was an error with your form:</p>\n");
    echo("<ul>" . $errorMessage . "</ul>\n");
  } 
}
?>