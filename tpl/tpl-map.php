
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
        <div class="search-box">
        <input type="text" id="search" placeholder="دنبال کجا می گردی؟" autocomplete="false">
        <div class="clear"></div>
        <div class="search-results"  style="display: none;">
        
        </div>
        </div>
        </div>
        <div class="mapContainer">
            <div id="map"></div>
        </div>
        <img src="assets/img/current.png" class="currentLoc">
    </div>
    <div class="modal-overlay" style="display: none;">
        <div class="modal">
            <span class="close">x</span>
            <h3 class="modal-title">ثبت لوکیشن</h3>
            <div class="modal-content">
                <form action="<?= siteUrl('process/addLocations.php')?>" id='addLocationForm' method="post">
                <div class="field-row">
                            <div class="field-title">مختصات</div>
                            <div class="field-content">
                                <input type="text" name='lat' id="lat-display" readonly style="width: 160px;text-align: center;">
                                <input type="text" name='lng' id="lng-display" readonly style="width: 160px;text-align: center;">
                            </div>
                    </div>
                    <div class="field-row">
                            <div class="field-title">نام مکان</div>
                            <div class="field-content">
                                <input type="text" name="title" id='l-title' placeholder=" ">
                            </div>
                    </div>
                    <div class="field-row">
                        <div class="field-title">نوع</div>
                        <div class="field-content">
                            <select name="type" id='l-type'>
                            <?php foreach(locationTypes as $key => $value): ?>
                            <option value= "<?=$key?>"><?=$value?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="field-row">
                        <div class="field-title">ذخیره نهایی</div>
                        <div class="field-content">
                            <input type="submit" value=" ثبت ">
                        </div>
                    </div>
                    <div class="ajax-result"></div>
                </form>
            </div>
        </div>
    </div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/scripts.js  <?= "?v" .rand(99,9999999) ?>"></script>
<script>
    <?php if($location):?>
     L.marker([<?=$location->lat?>, <?=$location->lng?>]).addTo(map).bindPopup("<?=$location->title?>");
     map.setView([<?= $location->lat ?>, <?= $location->lng ?>]);
    <?php endif;?>

    $(document).ready(function(){
        $("img.currentLoc").click(function(){
            locate();
        });

        $('#search').keyup(function(){
            const input = $(this);
            const searchResult = $('.search-results');
            searchResult.html("در حال جستجو...");
            $.ajax({
              url: '<?=BASE_URL . 'process/search.php'?>',
              method: 'POST',
              data: {keyword:input.val()},
              success: function(response){
                searchResult.slideDown().html(response);
              }
           });
        })
    });
</script>
</body>
</html>
