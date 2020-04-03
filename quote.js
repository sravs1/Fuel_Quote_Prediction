//Validtion Code For Inputs

var gallons = document.forms['form']['gallons'];
var date = document.forms['form']['deliveryDate'];

gallons.addEventListener('textInput', gallons_Verify);
date.addEventListener('textInput', date_Verify);

function validated(){
if (gallons.value.length == 0 && date.value.length==0){
  gallons.style.border = "1px solid red";
  gallons_error.style.display = "block";
  gallons.focus();
  date.style.border = "1px solid red";
  date_error.style.display = "block";
  date.focus();
  return false;
}
if (gallons.value.length == 0 ){
  gallons.style.border = "1px solid red";
  gallons_error.style.display = "block";
  gallons.focus();
  return false;
}
if (date.value.length == 0){
  date.style.border = "1px solid red";
  date_error.style.display = "block";
  date.focus();
  return false;
}
}

function gallons_Verify(){
if (gallons.value.length >0) {
  gallons.style.border = "1px solid silver";
  gallons_error.style.display = "none";
  return true;
}
}

function date_Verify(){
if (date.value.length ==8 ) {
  date.style.border = "1px solid silver";
  date_error.style.display = "none";
  return true;
}
}
