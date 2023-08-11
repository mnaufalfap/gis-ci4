<div id="map" style="width: 100%; height: 75vh;"></div>
<script>
    const map = L.map('map').setView([-5.372680, 105.260610], 14);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    <?php foreach ($lokasi as $key => $value) { ?>
        L.marker([<?= $value['latitude'] ?>, <?= $value['longitude'] ?>])
            .bindPopup('<img src="<?= base_url('photo/' . $value['foto_lokasi']) ?>" width="120px">' +
                '<b>&ensp;<?= $value['nama_lokasi'] ?></b><br><br>' +
                'Alamat : <?= $value['alamat_lokasi'] ?><br>' +
                'Tingkat Kerusakan : <b><?= $value['tingkat_kerusakan'] ?></b>')
            .addTo(map);
    <?php } ?>

    //Masih hardcode
    // var latlngs = [
    //     [-5.374494, 105.242648],
    //     [-5.376689, 105.241355],
    //     [-5.375516, 105.240510],
    //     [-5.374764, 105.241182],
    //     [-5.374513, 105.240885]
    // ];

    // var polyline = L.polyline(latlngs, {
    //     weight: 6
    // }).bindPopup("Jalur alternatif untuk menghindari Jl. Cengkeh 1").addTo(map);

    L.Routing.control({
        waypoints: [
            L.latLng(-5.374494, 105.242648),
            L.latLng(-5.375905, 105.241810),
            L.latLng(-5.374513, 105.240885),
        ],
        routeWhileDragging: true
    }).addTo(map);

    L.Routing.control({
        waypoints: [
            L.latLng(-5.362739, 105.285530),
            L.latLng(-5.362705, 105.283303),
        ],
        routeWhileDragging: true
    }).addTo(map);
</script>