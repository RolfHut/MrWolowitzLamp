
//these are the device NR of the Spark Core and the name of the function running on the core. Insert your own devide nr here.
var deviceID = "YOUR DEVICE NUMBER";
var setFunc = "switchLamp";

function postSimpleLampSecure(newValue) {
    var sendName = newValue.slice(0,15);
    //change the domain to your own sites url.
    $.post('http://YOURSITE.COM/proxyGit.php?'+deviceID+'/' + setFunc, {params: sendName},function(response) {console.log(response);});
};

function updateImage()
{
    var image = document.getElementById("webCamImage");
    //Change the domain to your own sites url, to where your webcamfeed is.
    //The new Date().getTime() is needed to refresh the image
    image.src = "http://YOURSITE.COM/lampCam.jpg?" + new Date().getTime();

    //Change the domain to your own sites url, to where your webcamfeed is.
    //This updates the content of the table every second.
    $("#resultTable").load("http://YOURSITE.COM/getTableGit.php"); 
    setTimeout(updateImage, 1000);
};