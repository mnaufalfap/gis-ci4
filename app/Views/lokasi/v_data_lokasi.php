<div class="row">
    <div class="col-12">
        <table style="font-size: small;" class="table table-bordered" id="datatablesSimple">
            <thead style="text-align: center;">
                <tr>
                    <th>No</th>
                    <th>Nama Lokasi</th>
                    <th>Alamat Lokasi</th>
                    <th>Koordinat</th>
                    <th>Kerusakan</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($lokasi as $key => $value) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['nama_lokasi'] ?></td>
                        <td><?= $value['alamat_lokasi'] ?></td>
                        <td><?= $value['latitude'] ?>,<?= $value['longitude'] ?></td>
                        <td><?= $value['tingkat_kerusakan'] ?></td>
                        <td><img src="<?= base_url('photo/' . $value['foto_lokasi']) ?>" width="150px"></td>
                        <td>
                            <a href="<?= base_url('lokasi/editLokasi/' . $value['id_lokasi']) ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= base_url('lokasi/deleteLokasi/' . $value['id_lokasi']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ??')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>