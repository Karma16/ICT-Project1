<html>
<form action=index.php method="post">
        <table>
 <TR>
                <TD><label for="date">Date:</label></TD>
                <TD><input type="date" id="date" name="date" class="tcal" value="" /></TD>
            </TR>
        </table>
        
     <input type="submit" name="formSubmit" value="Submit" />   
        </form>
        </html>
<?php 
if(isset($_POST['formSubmit'])) 
{
  $date = $_POST['date'];
  $errorMessage = "";
  
  if(empty($date)) 
  {
    $errorMessage = "<li>You forgot to select a date!</li>";
  }
  
  if($errorMessage != "") 
  {
    echo("<p>There was an error with your form:</p>\n");
    echo("<ul>" . $errorMessage . "</ul>\n");
  } 
}
?>