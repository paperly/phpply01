 getLocation(); 

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
}


function add_post(){
  
     text = document.getElementById("contentblock").value;
 //alert("post step 1");
//  alert(latitude);
    // Latitude: Latitude,Longitude:Longitude;
       $.post("app/helpers/addPost.php", {  Latitude: 2,Longitude:3, text: text });
     document.getElementById("contentblock").value = "fertig";
//alert("post done");
//window.location.href=window.location.href;

}