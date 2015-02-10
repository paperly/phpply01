

getLocation(); 
var latitude;
var longitude;
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
  // alert("Latitude: " + position.coords.latitude + 
   // "<br>Longitude: " + position.coords.longitude);
    
 
       latitude = position.coords.latitude;
    longitude = position.coords.longitude;
    
    document.getElementById("latitude").value = latitude;
    document.getElementById("longitude").value = longitude;
}


function add_post2(){
  
     text = document.getElementById("contentblock").value;
 //alert("post step 1");
//  alert(latitude);
    // Latitude: Latitude,Longitude:Longitude;
       $.post("app/helpers/addPost.php", {  Latitude: 2,Longitude:3, text: text });
     document.getElementById("contentblock").value = "fertig";
//alert("post done");
//window.location.href=window.location.href;

}

function add_post(){
  
   text = document.getElementById("contentblock").value;
 //alert("post step 1");
//  alert(latitude);
    // Latitude: Latitude,Longitude:Longitude;
      // $.post("app/helpers/addPost.php", {  Latitude: 2,Longitude:3, text: text });
     
    var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("contentblock").innerHTML=xmlhttp.responseText;
    }
  }
  //alert("noch happy");
xmlhttp.open("POST","app/helpers/addPost.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
//xmlhttp.send("text="+text);
xmlhttp.send("Latitude="+latitude+"&Longitude="+longitude+"&text="+text);
  
    
  //document.getElementById("contentblock").value = "fertig";
alert("Dein Post ist online!");
window.location.href=window.location.href;

}