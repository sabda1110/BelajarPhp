<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Butir Kegiatan</h1>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan') ?>
        </div>
    <?php endif; ?>



    <div class="row">
        <div class="col-md-6">
            <?php
            if (session()->get('err')) {
                echo "<div class='alert alert-danger' role='alert'>" . session()->get('err') . "</div>";
            }
            ?>
        </div>
    </div>
    <div class="card">

        <div class="card-body">
            <button type="button" class="btn btn-primary  mb-2" data-toggle="modal" data-target="#modalTambah">
                <i class="fa fa-plus">Tambah Data </i>
            </button>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Kode Kegiatan</th>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Kode Jabatan</th>
                        <th scope="col">Sub_kegiatan</th>
                        <th style="text-align: center;" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($kegiatan as $row) : ?>
                        <tr>
                            <th scope="row"><?= $row['kd_kegiatan'] ?></th>
                            <td><?= $row['kegiatan'] ?></td>
                            <td><?= $row['kd_kerja'] ?></td>
                            <td><?= $row['sub_kegiatan'] ?></td>
                            <td class="" style="text-align: center;">
                                <button type="button" data-toggle="modal" data-target="#modalHapus" id="btn-hapus" class="btn btn-sm btn-success" data-id=""> <i class="fa fa-book"></i> </button>
                                <a href="/prakon/hapus/<?= $row['kd_kegiatan'] ?>" id="btn-hapus" class="btn btn-sm btn-danger" data-id=""> <i class="fa fa-trash"></i> </a>
                                <button type="button" data-toggle="modal" data-target="#modalEdit" class="btn btn-sm btn-warning" id="btn-edit" data-kd_kegiatan="<?= $row['kd_kegiatan'] ?>" data-kegiatan="<?= $row['kegiatan'] ?>" data-sub_kegiatan="<?= $row['sub_kegiatan'] ?>" data-desc_kegiatan="<?= $row['desc_kegiatan'] ?>" data-satuan_hasil="<?= $row['satuan_hasil'] ?>" data-angka_kredit="<?= $row['angka_kredit'] ?>" data-batasan_penilaian="<?= $row['batasan_penilaian'] ?>" data-pelaksana="<?= $row['pelaksana'] ?>" data-bukti_fisik="<?= $row['bukti_fisik'] ?>" data-contoh="<?= $row['contoh'] ?>" data-kd_kerja="<?= $row['kd_kerja'] ?>"> <i class="fa fa-edit"></i></button>


                            </td>

                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Button trigger modal -->


<!-- Modal Insert Data -->
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="prakon/tambah" method="post">
                    <div class="form-group">
                        <label for="kd_kegiatan"></label>
                        <input type="text" name="kd_kegiatan" id="kd_kegiatan" class="form-control" placeholder="Masukan Kode Kegiatan">

                    </div>
                    <div class="form-group">
                        <label for="kegiatan"></label>
                        <input type="text" name="kegiatan" id="kegiatan" class="form-control" placeholder="Masukan Kegiatan">
                    </div>
                    <div class="form-group">
                        <label for="sub_kegiatan"></label>
                        <input type="text" name="sub_kegiatan" id="sub_kegiatan" class="form-control" placeholder="Masukan Sub Kegiatan">

                    </div>
                    <div class="form-group">
                        <label for="desc_kegiatan"></label>
                        <textarea class="form-control" name="desc_kegiatan" id="desc_kegiatan" rows="3" placeholder="Masukan Descripsi Kegiatan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="satuan_hasil"></label>
                        <input type="text" name="satuan_hasil" id="satuan_hasil" class="form-control" placeholder="Masukan Satuan Hasil">

                    </div>
                    <div class="form-group">
                        <label for="angka_kredit"></label>
                        <input type="number" name="angka_kredit" id="angka_kredit" class="form-control" placeholder="Masukan Angka Kredit">

                    </div>
                    <div class="form-group">
                        <label for="batasan_penilaian"></label>
                        <input type="text" name="batasan_penilaian" id="batasan_penilaian" class="form-control" placeholder="Masukan Batas Penilaian">

                    </div>
                    <div class="form-group">
                        <label for="pelaksana"></label>
                        <input type="text" name="pelaksana" id="pelaksana" class="form-control" placeholder="Masukan Pelaksana">

                    </div>
                    <div class="form-group">
                        <label for="bukti_fisik"></label>
                        <textarea class="form-control" name="bukti_fisik" id="bukti_fisik" rows="3" placeholder="Masukan Bukti Fisik"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="contoh"></label>
                        <textarea class="form-control" name="contoh" id="contoh" rows="3" placeholder="Masukan Contoh"></textarea>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="kd_kerja" id="combo1">
                            <option value="">Pilih Kode Jabatan</option>
                            <?php foreach ($struktur as $k) : ?>
                                <option value="<?= $k['kd_kerja'] ?>"><?= $k['kd_kerja'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
            </div>
        </div>
        </form>
    </div>
</div>



<!-- Modal Edit Data -->
<div class="modal fade" id="modalEdit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="prakon/edit" method="post">

                    <input type="hidden" name="kd_kegiatan" id="kd_kegiatan" class="form-control" placeholder="Masukan Kode Kegiatan">

                    <div class="form-group">
                        <label for="kegiatan"></label>
                        <input type="text" name="kegiatan" id="kegiatan" class="form-control" placeholder="Masukan Kegiatan">
                    </div>
                    <div class="form-group">
                        <label for="sub_kegiatan"></label>
                        <input type="text" name="sub_kegiatan" id="sub_kegiatan" class="form-control" placeholder="Masukan Sub Kegiatan">

                    </div>
                    <div class="form-group">
                        <label for="desc_kegiatan"></label>
                        <textarea class="form-control" name="desc_kegiatan" id="desc_kegiatan" rows="3" placeholder="Masukan Descripsi Kegiatan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="satuan_hasil"></label>
                        <input type="text" name="satuan_hasil" id="satuan_hasil" class="form-control" placeholder="Masukan Satuan Hasil">

                    </div>
                    <div class="form-group">
                        <label for="angka_kredit"></label>
                        <input type="number" name="angka_kredit" id="angka_kredit" class="form-control" placeholder="Masukan Angka Kredit">

                    </div>
                    <div class="form-group">
                        <label for="batasan_penilaian"></label>
                        <input type="text" name="batasan_penilaian" id="batasan_penilaian" class="form-control" placeholder="Masukan Batas Penilaian">

                    </div>
                    <div class="form-group">
                        <label for="pelaksana"></label>
                        <input type="text" name="pelaksana" id="pelaksana" class="form-control" placeholder="Masukan Pelaksana">

                    </div>
                    <div class="form-group">
                        <label for="bukti_fisik"></label>
                        <textarea class="form-control" name="bukti_fisik" id="bukti_fisik" rows="3" placeholder="Masukan Bukti Fisik"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="contoh"></label>
                        <textarea class="form-control" name="contoh" id="contoh" rows="3" placeholder="Masukan Contoh"></textarea>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="kd_kerja" id="combo1">
                            <option value="">Pilih Kode Jabatan</option>
                            <?php foreach ($struktur as $k) : ?>
                                <option value="<?= $k['kd_kerja'] ?>"><?= $k['kd_kerja'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="edit" class="btn btn-primary">Tambah</button>
            </div>
        </div>
        </form>
    </div>
</div>