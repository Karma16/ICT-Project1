<html>
<?php
function date_validation($date)
{
while (strtotime($date)>strtotime('now'))
    ?> <script>alert('Please do not enter future dates')</script><?php
}

?>
    
    </html>