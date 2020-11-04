
class parametre{


 constructor(){



var len = window.location.search.split("=").length;

var tab = document.location.search.split("=");

if(len == 2){

var div = document.getElementById(tab[1]);


div.style.backgroundColor = "darkblue";


}

if(len == 3){

 var buttontab = document.location.search.split("=");

 var buttontab1 = buttontab[1].split("&");


 var tab = document.location.search.split("&");

 var tab1 = tab[1].split("=");

  var button = document.getElementById(buttontab1[0]);

 var sousbutton = "button"+buttontab[2];

 var sousdiv = document.getElementById(sousbutton);


 button.style.backgroundColor = "darkblue";

  sousdiv.style.backgroundColor = "darkblue";



}


   }

 afficheparametre(id,locate){


window.location = locate;

butid.style.backgroundColor = "darkblue";

}

}




