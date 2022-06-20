
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <title>Add Locations On Map</title>

    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
	
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


<script src="assets/js/scripts.js  <?= "?v" .rand(99,9999999) ?>"></script>
</body>
</html>
