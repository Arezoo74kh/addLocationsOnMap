const defaultLocation = [37.291782, 49.594491];
const defaultZoom = 17;

	var map = L.map('map').setView(defaultLocation,defaultZoom);

	var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: 'Arezoo Kharras; <a href="https://www.linkedin.com/in/arezoo-kharras-094018231/">Map Project</a>'
	}).addTo(map);

    document.getElementById('map').style.setProperty('height',window.innerHeight+'px');
 
    // set view in map
    // map.setView([29.592, 52.573], defaultZoom);

    //show and pin marker

    // marker = L.marker(defaultLocation).addTo(map);
    // marker.bindPopup("Arezoo office 1").openPopup();

    L.marker(defaultLocation).addTo(map).bindPopup("Arezoo Office 1").openPopup();
    L.marker([37.291982, 49.595691]).addTo(map).bindPopup("Arezoo Office 2");

    var northLine = map.getBounds().getNorth();   // khat shomali
    var westLine = map.getBounds().getWest();     // khat gharbi
    var southLine = map.getBounds().getSouth();   // khat jonoobi
    var eastLine = map.getBounds().getEast();     // khat sharghoi
    // map.setView([northLine, westLine],defaultZoom)
 

    //Use Map Events
    map.on("zoomend",function(){
    //     alert(map.getBounds().getCenter());
    //      1: get bound lines 
    //      2: send bound lines to server
    //      3: search locations in map window
    //      4: display location markers in map
    });

    map.on('dblclick', function(event){
    // alert(event.latlng.lat + "," + event.latlng.lng);
    //      1: add marker in clicked position 
    L.marker([event.latlng.lat, event.latlng.lng]).addTo(map);
    //      2: open modal (form) for save the clicked location
    $('.modal-overlay').fadeIn(500)
    $('#lat-display').val(event.latlng.lat)
    $('#lng-display').val(event.latlng.lng)
    $('#l-type').val(0);
    $('#l-title').val(" ");
    //      3: done: fill the form and submit location data to server
    //      4: done: save location in database (status: pending review)
    //      5: review locations and verify if ok
   });

    // setTimeout(function() {
       
    // },3000);

 var currentPosition , currentAccuracy ;
 map.on('locationfound', function(e){
    if(currentPosition){
        map.removeLayer(currentPosition);
        map.removeLayer(currentAccuracy);
    }
    var radius = e.accuracy;
    currentPosition = L.marker(e.latlng).addTo(map)
    .bindPopup("you are within " + radius + " meters from this point").openPopup();
    currentAccuracy = L.circle(e.latlng).addTo(map);
 });
 map.on('locationerror',function(e){
    alert(e.message);
});

function locate(){
    map.locate({ setView: true , maxZoom: defaultZoom});
}

// setInterval(locate, 5000);

$(document).ready(function() {
    $('form#addLocationForm').submit(function(e){
        e.preventDefault(); //prevent from submiting
        // alert($(this).serialize()); 
        var form = $(this);
        var resultTag = form.find('.ajax-result');
        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function(response){
                resultTag.html(response);
            }
        });
    });

    $('.modal-overlay .close').click(function() {
        $('.modal-overlay').fadeOut();
    });
});