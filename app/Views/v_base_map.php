<div id="map" style="width: 100%; height: 100vh;"></div>

<script>
   var openTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: 'Map data: © OpenStreetMap contributors, SRTM | Map style: © OpenTopoMap (CC-BY-SA)'
    });

    const map = L.map('map', {
        center: [-5.3724246,105.2408265],
        zoom: 15,
        layers: [openTopoMap]
    });


</script>