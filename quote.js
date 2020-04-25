//Validtion Code For Inputs

var gallons = document.forms['form']['gallons'];
var date = document.forms['form']['deliveryDate'];
var price = document.forms['form']['price'];
var amount = document.forms['form']['amount'];


gallons.addEventListener('textInput', gallons_Verify);
date.addEventListener('textInput', date_Verify);


function validated(){
  console.log("entered validated loop");
if (gallons.value.length == 0 && date.value.length==0){
  console.log("entered gallons and date if loop");
  gallons.style.border = "1px solid red";
  gallons_error.style.display = "block";
  gallons.focus();
  date.style.border = "1px solid red";
  date_error.style.display = "block";
  date.focus();
  return false;
}

if (gallons.value.length == 0 ){
  console.log("entered gallons loop");
  gallons.style.border = "1px solid red";
  gallons_error.style.display = "block";
  gallons.focus();
  return false;
}
if (date.value.length == 0){
  console.log("entered date loop");
  date.style.border = "1px solid red";
  date_error.style.display = "block";
  date.focus();
  return false;
}
}

function validated1(){
  console.log("entered validated1 loop");
  if (price.value.length == 0 && amount.value.length==0){
   console.log("price and amount  if loop");
    amount.style.border = "1px solid red";
    amount_error.style.display = "block";
    amount.focus();
    return false;
  }
}


function gallons_Verify(){
if (gallons.value.length >8) {
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
