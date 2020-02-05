function ValidateForm(ctrl){
 var stdate = document.getElementById("start_date");
 var endate = document.getElementById("end_date");
 
 //Validate the format of the start date
 if(isValidDate(stdate.value)==false){
  return false;
 }
 //Validate the format of the end date
 if(isValidDate(endate.value)==false){
  return false;
 }
 //Validate end date to find out if it is prior to start date
 if(checkEnteredDates(stdate.value,endate.value)==false){
  return false;
 }

 //Set the values of the hidden variables
 FROMDATE.value= stdate.value;
 TODATE.value= endate.value;
 
 return true;
}

//--------------------------------------------------------------------------
//This function verifies if the start date is prior to end date.
//--------------------------------------------------------------------------
function checkEnteredDates(stdateval,endateval){
 //seperate the year,month and day for the first date
 var stryear1 = stdateval.substring(6);
 var strmth1  = stdateval.substring(0,2);
 var strday1  = stdateval.substring(5,3);
 var date1    = new Date(stryear1 ,strmth1 ,strday1);
 
 //seperate the year,month and day for the second date
 var stryear2 = endateval.substring(6);
 var strmth2  = endateval.substring(0,2);
 var strday2  = endateval.substring(5,3);
 var date2    = new Date(stryear2 ,strmth2 ,strday2 );
 
var today = new Date();
    
 var datediffval = (date2 - date1 )/864e5;
 
 if(datediffval <= 0){
  alert("Start date must be prior to end date");
  return false;
 }
    
   /* if (isDateBeforeToday(new Date(endate.value))==false)
{
    alert("End date must be no later than today");
    return false;
}
    if (isDateBeforeToday(new Date(stdate.value))==false)
{
    alert("Start date must be no later than today");
    return false;
}*/
 return true;
}
//--------------------------------------------------------------------------
//This function validates the date for MM/DD/YYYY format. 
//--------------------------------------------------------------------------
function isValidDate(dateStr) {
 
 // Checks for the following valid date formats:
 // MM/DD/YYYY
 // Also separates date into month, day, and year variables
 var datePat = /^(\d{2,2})(\/)(\d{2,2})\2(\d{4}|\d{4})$/;
 
 var matchArray = dateStr.match(datePat); // is the format ok?
 if (matchArray == null) {
  alert("Date must be in MM/DD/YYYY format");
  return false;
 }
 
 month = matchArray[1]; // parse date into variables
 day = matchArray[3];
 year = matchArray[4];
 if (month < 1 || month > 12) { // check month range
  alert("Month must be between 1 and 12");
  return false;
 }
 if (day < 1 || day > 31) {
  alert("Day must be between 1 and 31");
  return false;
 }
 if ((month==4 || month==6 || month==9 || month==11) && day==31) {
  alert("Month "+month+" doesn't have 31 days!");
  return false;
 }
 if (month == 2) { // check for february 29th
  var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
  if (day>29 || (day==29 && !isleap)) {
   alert("February " + year + " doesn't have " + day + " days!");
   return false;
    }
 }
 return true;  // date is valid
}
//These functions go between the  tags.
//Begin function checkdate

function checkdate(input){
var validformat=/^\d{2}\/\d{2}\/\d{4}$/ //Basic check for format validity
var returnval=false
if (!validformat.test(input.value)) {
alert("Invalid Date Format. Please correct and submit again.");
input.focus()
}
else{ //Detailed check for valid date ranges
var monthfield=input.value.split("/")[0]
var dayfield=input.value.split("/")[1]
var yearfield=input.value.split("/")[2]
var dayobj = new Date(yearfield, monthfield-1, dayfield)
if ((dayobj.getMonth()+1!=monthfield)||
(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield))
alert("Invalid Day, Month, or Year range detected. Please correct and submit again.");
else
returnval=true
}
if (returnval==false) input.select()
return returnval
}

//Begin function button1_onclick
//This makes sure that even if it somehow got past the original error check, 
//the report won't run unless the date format is correct.
function button1_onclick(ctrl) {
if (checkdate(document.getElementById("start_date")) && 
    checkdate(document.getElementById("end_date")) ) {
OnExecute(ctrl)
}
}
//End function button1_onclick


function isDateBeforeToday(date) {
    return new Date(date.toDateString()) < new Date(new Date().toDateString());
}




//We had to use onchange instead of onblur 
//because our call center software was interfering 
//with HTML code and causing the control to lose focus - 
// we ended up in an infinite loop of error messages.


/**--------------------------
//* Validate Date Field script- By JavaScriptKit.com
//* For this script and 100s more, visit http://www.javascriptkit.com
//* This notice must stay intact for usage
---------------------------**/