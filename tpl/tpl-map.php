
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <title>Add Locations On Map</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

    <link rel="stylesheet" href="assets/css/leaflet.css"/>
    <script src="assets/js/leaflet.js"></script>
	
</head>
<body>

<div class="main">
        <div class="head">
            <input type="text" id="search" placeholder="دنبال کجا می گردی؟">
        </div>
        <div class="mapContainer">
        <div id="map"></div>
        </div>
    </div>
<script>

	var map = L.map('map').setView([37.291782, 49.594491], 17);

	var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: 'Arezoo Kharras; <a href="https://www.linkedin.com/in/arezoo-kharras-094018231/">Map Project</a>'
	}).addTo(map);

    document.getElementById('map').style.setProperty('height',window.innerHeight+'px');

</script>



</body>
</html>
