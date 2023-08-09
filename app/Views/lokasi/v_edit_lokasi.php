<div class="row">
    <div class="col-sm-8">
        <div id="map" style="width: 100%; height: 75vh;"></div>
    </div>

    <div class="col-sm-4">
        <div class="row">
            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>
            <?php $err = validation_errors() ?>
            <?php echo form_open_multipart('Lokasi/updateData/' . $lokasi['id_lokasi']) ?>

            <div class="form-group">
                <label for="">Nama Lokasi</label>
                <input class="form-control" name="nama_lokasi" value="<?= $lokasi['nama_lokasi'] ?>">
                <p class="text-danger"><?= isset($err['nama_lokasi']) == isset($err['nama_lokasi']) ? validation_show_error('nama_lokasi') : '' ?></p>
            </div>
            <div class="form-group">
                <label for="">Alamat Lokasi</label>
                <input class="form-control" name="alamat_lokasi" value="<?= $lokasi['alamat_lokasi'] ?>">
                <p class="text-danger"><?= isset($err['alamat_lokasi']) == isset($err['alamat_lokasi']) ? validation_show_error('alamat_lokasi') : '' ?></p>
            </div>
            <div class="form-group">
                <label for="">Latitude</label>
                <input class="form-control" name="latitude" id="Latitude" value="<?= $lokasi['latitude'] ?>">
                <p class="text-danger"><?= isset($err['latitude']) == isset($err['latitude']) ? validation_show_error('latitude') : '' ?></p>
            </div>
            <div class="form-group">
                <label for="">Longitude</label>
                <input class="form-control" name="longitude" id="Longitude" value="<?= $lokasi['longitude'] ?>">
                <p class="text-danger"><?= isset($err['longitude']) == isset($err['longitude']) ? validation_show_error('longitude') : '' ?></p>
            </div>
            <!-- <div class="form-group">
                <label for="">Tingkat Kerusakan</label>
                <select class="form-select" name="tingkat_kerusakan" id="tingkat_kerusakan">
                    <option selected>Pilih tingkat kerusakan :</option>
                    <option value="Ringan">Ringan</option>
                    <option value="Sedang">Sedang</option>
                    <option value="Parah">Parah</option>
                </select>
                <p class="text-danger"><?= isset($err['tingkat_kerusakan']) == isset($err['tingkat_kerusakan']) ? validation_show_error('tingkat_kerusakan') : '' ?></p>
            </div>
            <div class="form-group">
                <label for="">Foto Lokasi</label>
                <input type="file" class="form-control" name="foto_lokasi" accept="image/*" value="<? base_url('foto/' . $lokasi['foto_lokasi']) ?>">
                <p class="text-danger"><?= isset($err['foto_lokasi']) == isset($err['foto_lokasi']) ? validation_show_error('foto_lokasi') : '' ?></p>
                <img src="<? base_url('foto/' . $lokasi['foto_lokasi']) ?>" width="150px">
            </div> -->

            <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url('lokasi/index') ?>" class="btn btn-success">Kembali</a>

            <?php echo form_close() ?>

        </div>
    </div>
</div>
<script>
    const map = L.map('map').setView([<?= $lokasi['latitude'] ?>, <?= $lokasi['longitude'] ?>], 18);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var latInput = document.querySelector("[name=latitude]");
    var lngInput = document.querySelector("[name=longitude]");
    var curLocation = [<?= $lokasi['latitude'] ?>, <?= $lokasi['longitude'] ?>];
    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable: true,
    });

    marker.on('dragend', function(e) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            curLocation,
        }).bindPopup(position).update();
        $("#Latitude").val(position.lat);
        $("#Longitude").val(position.lng);
    });

    map.on('click', function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        if (!marker) {
            marker = L.marker(e.latlng).addTo(map);
        } else {
            marker.setLatLng(e.latlng);
        }
        latInput.value = lat;
        lngInput.value = lng;
    });

    map.addLayer(marker);
</script>