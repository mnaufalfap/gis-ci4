<div id="map" style="width: 100%; height: 100vh;"></div>
<script>
    const map = L.map('map').setView([-5.378184, 105.239269], 16);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // 1.	Jl. Haji Kadir Rajabasa Bandar Lampung
    L.marker([-5.373994,105.236275]).bindPopup("<b>Titik Rusak Ringan</b>" + "<br>Jl. Haji Kadir Rajabasa Bandar Lampung").addTo(map);
    // 2.	Jalan cengkeh 1 bandar lampung gedong meneng 
    L.marker([-5.375232,105.241615]).bindPopup("Titik Rusak Parah").addTo(map);
    // 3.	Jl. Palapa 10 kedaton bandar lampung
    L.marker([-5.381984, 105.246232]).bindPopup("Titik Rusak Ringan").addTo(map);
    // 4.	Jl lada ujung 1 gedong meneng bandar lampung
    L.marker([-5.375430,105.239815]).bindPopup("Titik Rusak Ringan").addTo(map);
    // 5.	Gang sumur kucing bandar lampung gedong meneng
    L.marker([-5.376635, 105.239418]).bindPopup("Titik Rusak Parah").addTo(map);
    // 6.	Gang kelinci rajabasa bandar lampung
    L.marker([-5.374577,105.236771]).bindPopup("Titik Rusak Parah").addTo(map);
</script>