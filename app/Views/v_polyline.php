<div id="map" style="width: 100%; height: 75vh;"></div>
<script>
    const map = L.map('map').setView([-5.372680, 105.260610], 14);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // 1.	Jl. Haji Kadir Rajabasa Bandar Lampung
    L.marker([-5.373987, 105.236229]).bindPopup("<b>Titik Rusak Ringan</b>" + "<br>Jl. Haji Kadir Rajabasa Bandar Lampung").addTo(map);
    // 2.	Jalan cengkeh 1 bandar lampung gedong meneng 
    L.marker([-5.375157, 105.241655]).bindPopup("Titik Rusak Parah").addTo(map);
    // 3.	Jl. Palapa 10 kedaton bandar lampung
    L.marker([-5.381984, 105.246232]).bindPopup("Titik Rusak Ringan").addTo(map);
    // 4.	Jl lada ujung 1 gedong meneng bandar lampung
    L.marker([-5.375499, 105.239918]).bindPopup("Titik Rusak Ringan").addTo(map);
    // 5.	Gang sumur kucing bandar lampung gedong meneng
    L.marker([-5.376485, 105.239640]).bindPopup("Titik Rusak Parah").addTo(map);
    // 6.	Gang kelinci rajabasa bandar lampung
    L.marker([-5.374563, 105.236775]).bindPopup("Titik Rusak Parah").addTo(map);
    // 7.   Perumnas Way Kandis, Kec. Tj. Senang, Kota Bandar Lampung
    L.marker([-5.365012, 105.287402]).bindPopup("").addTo(map);
    // 8.	Gg Swadya 2, Tj. Senang, Kec. Tj. Senang, Kota Bandar Lampung
    L.marker([-5.364616, 105.283972]).bindPopup("").addTo(map);
    // 9.	Jl. B. Sepatu VI, Tj. Senang, Kec. Tj. Senang, Kota Bandar Lampung
    L.marker([-5.364387, 105.285989]).bindPopup("").addTo(map);
    // 10.	Gg. Raflesia 2 Jl. Bunga Sedap Malam 1, Tj. Senang, Kec. Tj. Senang, Kota Bandar Lampung
    L.marker([-5.362617, 105.283615]).bindPopup("").addTo(map);
    // 11.	Jl. Durian 1 Way Dadi, Kec. Sukarame, Kota Bandar Lampung
    L.marker([-5.372973, 105.285599]).bindPopup("").addTo(map);
    // 12.	Jl. Raflesia 18-1, Way Dadi, Kec. Sukarame, Kota Bandar Lampung
    L.marker([-5.372484, 105.287555]).bindPopup("").addTo(map);
    // 13.	Jl. Raflesia 133-132, Tj. Senang, Kec. Tj. Senang, Kota Bandar Lampung
    L.marker([-5.3620260, 105.2831270]).bindPopup("").addTo(map);
    // 14.	Jl. Raflesia, Way Dadi, Kec. Sukarame, Kota Bandar Lampung
    L.marker([-5.372456, 105.286863]).bindPopup("").addTo(map);


    var latlngs = [
        [-5.374494, 105.242648],
        [-5.376689, 105.241355],
        [-5.375516, 105.240510],
        [-5.374764, 105.241182],
        [-5.374513, 105.240885]
    ];

    var polyline = L.polyline(latlngs, {
        weight: 6
    }).bindPopup("Jalur alternatif untuk menghindari Jl. Cengkeh 1").addTo(map);

    // L.Routing.control({
    //     waypoints: [
    //         L.latLng(-5.374494, 105.242648),
    //         L.latLng(-5.374513, 105.240885)
    //     ]
    // }).addTo(map);
</script>