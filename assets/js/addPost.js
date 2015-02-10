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
    
    lol =position.coords.longitude;
       latitude = position.coords.latitude;
    longitude = position.coords.longitude;
}


function add_post(){
  
     text = document.getElementById("contentblock").value;
 
    // Latitude: Latitude,Longitude:Longitude;
       $.post("app/helpers/addPost.php", {  Latitude: latitude,Longitude:longitude, text: text });
     document.getElementById("contentblock").value = "";
//alert("");
document.location.reload(true);

}