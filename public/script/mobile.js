class mobile{

typescreen(){
 var mobile = 0;

 if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {

mobile = 1;

}

return mobile;
}
 
displaymobile(dis,id){

if(this.typescreen() == 0){

document.getElementById(id).style.display = dis; 

}

}

affichemobile(id){

if(this.typescreen() == 1){

document.getElementById(id).style.display = "block"; 

}else{

document.getElementById(id).style.display = "none"; 


}


}

cachemobile(id){

if(this.typescreen() == 1){

document.getElementById(id).style.display = "none"; 

}else{

document.getElementById(id).style.display = "block"; 


}


}

 changeclassmobile(id,oldclass,newclass){

var oldclass = oldclass;


var newclass = newclass;

if(this.typescreen() == 1){

 document.getElementById(id).className = newclass;

}else{

document.getElementById(id).className = oldclass;


}

}

changewidthmobile(id){

var div =  document.getElementById(id);

if(this.typescreen() ==  0){

div.style.width = "50%";

}

}

}
