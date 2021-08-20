/* John-Paul Takats, ISTE-240, 2205 
   Renee Bogdany
   Individual Project Part 2
   Javascript
   5/7/2021 -->

/* parks javascript */

var newImage = new Array();
//function called onload of the document
function init() {
    // get number of images to load
    var numImg = document.getElementById("smallImgs").getElementsByTagName('img').length;
    for(var i=1; i<=numImg; i++) {
        newImage[i]=new Image();
        newImage[i].src="assets/images/thacherpark"+i+".jpg";
    }
}


/* function to change image */
function changeImg(park) {
    // test which dom element called me
    console.log(park);
    /* find number of the image */
    var start = park.src.indexOf('/thacherpark') + 12;
    var end = park.src.indexOf('.jpg');
    // tell substring() wehre to start and where to end
    var num = park.src.substring(start, end) - 4;
    console.log(start);
    console.log(end);
    console.log(num);
    
    // set the large image on the screen's src
    document.getElementById('mainImg').src=newImage[num].src;
    // set opacity to 0
    document.getElementById('mainImg').style.opacity = 0;
    fadeIn();
}

// fade in function to have pictures fade in when clicked on
function fadeIn() {
    // if opacity is less than 1 then increase opacity and call fade in function
    if(parseFloat(document.getElementById('mainImg').style.opacity)<=1) {
        document.getElementById('mainImg').style.opacity = parseFloat(document.getElementById('mainImg').style.opacity) + .01;
        setTimeout(function() { fadeIn(); }, 10);
    }
}

/* comments javascript */

// validate function to validate comments form
function validateForm(){
    
    // set var to true initially
    var ret=true;

    // test if user entered something in name
    if(document.getElementById('name').value==''){
        document.getElementById('name').style.backgroundColor = "pink";
        document.getElementById('fname*').style.display='inline';
        document.getElementById('check').style.display='block';
        // the name failed - they didn't enter anything, so set ret to false
        ret=false;
    }else{
        // need this in case they first failed & the red * is showing
        document.getElementById('fname*').style.display='none';
        document.getElementById('check').style.display='none';
        // turn back to non red
        document.getElementById('name').style.backgroundColor='white';
    }
    
    // test if user entered something in comment
    if(document.getElementById('comment').value==''){
        // second input is empty, so turn on red * 
        document.getElementById('lname*').style.display='inline';
        document.getElementById('check').style.display='block';
        document.getElementById('comment').style.backgroundColor='pink';
        // comment failed so change return to false
        ret=false;
    }else{
        // turn back to non-red
        document.getElementById('lname*').style.display='none';
        document.getElementById('check').style.display='none';
        document.getElementById('comment').style.backgroundColor='white';
    }
    // return true/false to onsubmit function so form will submit or not
    return ret;
}

/* map javascript */

var map;
var infowindow;

/* function to add a marker */
function addMarker(latitude,longitude,title) {  
    var position = {lat:latitude,lng:longitude};    
    var marker = new google.maps.Marker({position: position, map:map});    
    marker.setTitle(title); 

    // add a listener for the click event
    google.maps.event.addListener(marker, 'click', function(e){
        makeInfoWindow(this.position, this.title)
    });
}
/* function to make an info window */
function makeInfoWindow(position,msg) {
    // close old InfoWindow if it exists
    if(infowindow) infowindow.close();

    // make a new infowindow
    infowindow = new google.maps.InfoWindow({
                    map: map,
                position: position,
                content: "<b>" + msg + "</b>"
    });
}

// function to initialize and add the map
function initMap() {
    //alert('test');
    // The location of vville
    const vville = { lat: 42.649879, lng: -73.930237 };

    // The map, centered at vville
    map = new google.maps.Map(document.getElementById("map"), {
      zoom: 11,
      center: vville,
    });
    // json objects passed in the method
    // The marker, positioned at vville
    const marker = new google.maps.Marker({
        position: { lat: 42.6502, lng: -73.9296},
        map,
        title: "Hotaling (Evergreen) Park"
    });

    marker.setMap(map);

    const infowindow = new google.maps.InfoWindow({
        //content: contentString,
        content: "<div>Hotaling (Evergreen) Park</div>",
    });
    marker.addListener("click", () => {
        infowindow.open(map, marker);
    });

    // loop through vvilleSpots
    for(i=0; i<vvilleSpots.length; i++) {

        var lat = vvilleSpots[i]['latitude'];
        var lng = vvilleSpots[i]['longitude'];
        var title = vvilleSpots[i]['title'];

        addMarker(lat, lng, title);

    }

  }

  /* places in voorheesville*/
  var vvilleSpots = [
    {
        latitude:42.6502,
        longitude:-73.9296,
        title:"Hotaling (Evergreen Park)"
    },
    
    {
        latitude:42.631682835265465, 
        longitude:-73.898383829104,
        title:"Emma Cleary's Coffee & Dessert"
    },
    
    {
        latitude:42.656372234020175, 
        longitude:-74.01833754444823,
        title:"Thacher Park"
    },
    
    {
        latitude:42.64011273004643,
        longitude:-73.92865638913374,
        title:"Swift Road Park"
    },
    
    {
        latitude:42.65242683521943, 
        longitude:-73.92847601184688,
        title:"Nichols Park"
    },
    
    {
        latitude:42.65615249739956, 
        longitude:-73.92829277378485,
        title:"Albany County Rail Trail Pavilion"
    },
    
    {
        latitude:42.65053296767375, 
        longitude:-73.92450112603966,
        title:"Voorheesville Center"
    },
    
    {
        latitude:42.652740204108035, 
        longitude:-73.9288315156392,
        title:"Old Songs"
    },
    
    {
        latitude:42.655902214544035, 
        longitude:-73.97330911980495,
        title:"Indian Ladder Farms"
    },
    
    {
        latitude:42.64992133417224, 
        longitude:-73.92997578865467,
        title:"Methodist Church / Farmer's Market"
    },
    
    {
        latitude:42.6549709892436, 
        longitude:-73.92509748680322,
        title:"Serendipity"
    },
    
    {
        latitude:42.641555311403444, 
        longitude:-73.9649479188247,
        title:"Voorheesville High School"
    },

    {
        latitude:42.68966215951724, 
        longitude:-73.8508380616686,
        title:"Crossgates"
    },

    {
        latitude:42.70899940303816, 
        longitude:-73.81720190214496,
        title:"Colonie Center"
    }
    
    
    ];

    /* navigation  styles*/

    // function to lower opacity
    function lowerOpacity() {
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }
    // function to increase opacity
    function higherOpacity() {
        document.body.style.backgroundColor = "rgb(245, 237, 248)";
    }

    // functions to display dropdowns for navigation for smaller screens
    function drop() {
        if (document.getElementById("dropdown-container").style.display === "block") {
            document.getElementById("dropdown-container").style.display = "none";
        } else {
            document.getElementById("dropdown-container").style.display = "block";
        }
    }
    function drop2() {
        if (document.getElementById("dropdown-container2").style.display === "block") {
            document.getElementById("dropdown-container2").style.display = "none";
        } else {
            document.getElementById("dropdown-container2").style.display = "block";
        }
    }
    function drop3() {
        if (document.getElementById("dropdown-container3").style.display === "block") {
            document.getElementById("dropdown-container3").style.display = "none";
        } else {
            document.getElementById("dropdown-container3").style.display = "block";
        }
    }
    function drop4() {
        if (document.getElementById("dropdown-container4").style.display === "block") {
            document.getElementById("dropdown-container4").style.display = "none";
        } else {
            document.getElementById("dropdown-container4").style.display = "block";
        }
    }



