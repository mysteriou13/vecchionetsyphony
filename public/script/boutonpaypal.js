
class boutonpaypal{


  constructor(){

 document.getElementById("paypal").style.display = "none"; 
 document.getElementById("divpass").style.display = "none";
 document.getElementById("passperso").style.display = "none";
 document.getElementById("passthier").style.display = "none";
 document.getElementById("divnb").style.display = "none";
 document.getElementById("passcloud").checked = true;
var newpass = document.getElementById("newpass");
var passcloud = document.getElementById("passcloud");
var passcourant = document.getElementById("passcourant");
var nb = document.getElementById("nb");
var paypal = document.getElementById("paypal");
var item = document.getElementById("custom"); 
var createur = document.getElementById("pseudo");

var radios = document.getElementsByName("perso");
var pass = document.getElementsByName("passcloud");
var divpass = document.getElementById("divpass");

var rad = document.getElementsByName("rad");

var radios = document.getElementsByName("perso");


var typepass = null;
var type = null;
var typerad = null;

var admin = null;
var display = "test";
var groupename = null;
var username = createur.value;
var email = document.getElementById("email");
var quota = nb.value;
var home = "/var/www/html/nextcloud/data/";
var password ="courant";
var displayname = "test";
var active = true;
var disable = "true";
var avatar = "avatar";
var salt = "salt";

var textnb = document.getElementById("textnb");

}

returnitem(val){

var item = document.getElementById("custom"); 

return item.value = val;

}

returnpasscourant(){
var passcourant = document.getElementById("passcourant");

return passcourant.value;

}


returndivpass(){

var divpass = document.getElementById("divpass");

return divpass.style.display;

}

returnnewpass(){

var newpass = document.getElementById("newpass");

returnpass.value;

}

returnnewpass(){

 var newpass = document.getElementById("newpass");
  return newpass.value;

}


returntyperpassword(){

var password = document.getElementById("passcloud");

return password.value;

}

returnhome(){

var home = "/var/www/html/nextcloud/data/";

return home;

}

returnnb(){

var nb = document.getElementById("nb");

return nb.value;

}

returnemail(){

var email = document.getElementById("email");

return email.value;

}

returnusername(){

var username = createur.value;

return username;

}
 

returngroupename(){

var groupename = null;

return groupename;


}

returndisplay(){

var display = "test";

return display;

}

typeradios(){
var radios = document.getElementsByName("perso");

 for (var i = 0, length = radios.length; i < length; i++) {
    if (radios[i].checked) {
        // do whatever you want with the checked radio
        if(radios[i].value != null){
         this.type = radios[i].value;
        }
        // only one radio can be logically checked, don't check the rest
        break;
    }
}

return this.type;

}

returntypepass(){
 var pass = document.getElementsByName("passcloud");

 for (var i = 0, length = pass.length; i < length; i++) {
    if (pass[i].checked) {
        // do whatever you want with the checked radio
         if(pass[i].value != null){
         this.typepass = pass[i].value;
        }
        // only one radio can be logically checked, don't check the rest
        break;
    }
}

return this.typepass;

}

returnrad(){
var rad = document.getElementsByName("rad");


  for (var i = 0, length = rad.length; i < length; i++) {
    if (rad[i].checked) {
        // do whatever you want with the checked radio
         if(rad[i].value != null){
         this.typerad = rad[i].value;
        }
        // only one radio can be logically checked, don't check the rest
        break;
    }
}

return this.typerad;

}

valuecreateur(){

var createur = document.getElementById("pseudo");

return createur.value;

}

divpassdisplay(){
var divpass = document.getElementById("divpass");

return divpass.style.display.value;

}

passcloudcheck(){

var passcloud = document.getElementById("passcloud");

return passcloud.checked;

}

returnbvalue(){

var nb = document.getElementById("nb");
return nb.value;

}

returnpaypal(block){
var paypal = document.getElementById("paypal");

return paypal.style.display = block;

}

returnitem(valeur){

var item = document.getElementById("custom"); 

return item.value = valeur;

}

returnnext(){

if(this.passcloudcheck()== true &&  this.returnbvalue() != "" && this.returntypepass() == "passcourant" 
|| this.typeradios() == "thier"  && this.returnbvalue() != "" || this.returntypepass() == "newpass" && this.returnbvalue() != "" && this.returnnewpass() != "" && this.this.returndivpass() == "block" && this.returnpasscourant() != ""){

this.returnpaypal("block");

var next = "next"+"_"+this.admin+"_"+this.returndisplay()+"_"+this.returngroupename()+"_"+this.valuecreateur()+"_"+this.returnemail()+"_"+this.returnnb()+"_"+
this.returnhome()+"_"+this.returntyperpassword()+"_"+this.displayname+"_"+this.active+"_"+this.disable+"_"+this.avatar+"_"+this.salt+"_"+this.valuecreateur()+"_"+this.typeradios()+"_"+this.returnrad();

this.returnitem(next);


}else{

this.returnpaypal("none");


}

}

div(){

if(this.typeradios() == "perso"){

this.admin = this.valuecreateur();
this.groupename = "perso";
 
}

if(this.divpassdisplay() == "block"){

this.password = passcourant.value;

}else{

this.password = "courant";

}

this.returnnext();

} 



 dis(){
 


if(this.typeradios() == "thier"){

divnb.style.display = "block";

textnb.innerHTML = "nombre de compte";

}else{

divnb.style.display = "none";


}


 if(perso.checked == true){

if(this.returnrad() != null){

 document.getElementById("divnb").style.display = "block";

}

   passperso.style.display = "block"; 
   
   if(this.returnrad() == "sto"){   
   textnb.innerHTML = "nombre de gigaotect"; 
   }

  if(this.returnrad() == "abo"){
  textnb.innerHTML = "nombre de mois";

   }

  }else{

 passperso.style.display = "none";
  

  }

 if(thier.checked == true){
 
 passthier.style.display = "block";
 textnb.innerHTML = "nombre de compte"; 

 }else{
 
 passthier.style.display = "none";

}

if(newpass.checked == true){

divpass.style.display = "block";

}else{

divpass.style.display = "none";

}


this.returnnext();
}

}

