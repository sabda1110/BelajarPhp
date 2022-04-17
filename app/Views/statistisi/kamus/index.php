<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Butir Kegiatan</h1>
    <div class="swal" data-swal='<?= session()->getFlashdata('pesan') ?>'></div>



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
                        <th style="text-align: center;" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($kamus as $row) : ?>
                        <tr>
                            <th scope="row"><?= $row['kode_kegiatan'] ?></th>
                            <td><?= $row['kegiatan'] ?></td>
                            <td><?= $row['kode_jabatan'] ?></td>
                            <td class="" style="text-align: center;">
                                <button type="button" data-toggle="modal" data-target="#modalDetail" class="btn btn-sm btn-success" id="btn-detailstatistisi" data-kode_kegiatan="<?= $row['kode_kegiatan'] ?>" data-kegiatan="<?= $row['kegiatan'] ?>" data-desc_kegiatan="<?= $row['desc_kegiatan'] ?>" data-satuan_hasil="<?= $row['satuan_hasil'] ?>" data-angka_kredit="<?= $row['angka_kredit'] ?>" data-pelaksana="<?= $row['pelaksana'] ?>" data-bukti_fisik="<?= $row['bukti_fisik'] ?>" data-contoh="<?= $row['contoh'] ?>" data-kode_jabatan="<?= $row['kode_jabatan'] ?>"> <i class="fa fa-book"></i></button>

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
                <form action="tambahkamus" method="post">
                    <div class="form-group">
                        <label for="kode_kegiatan"></label>
                        <input type="text" name="kode_kegiatan" id="kode_kegiatan" class="form-control" placeholder="Masukan Kode Kegiatan">

                    </div>
                    <div class="form-group">
                        <label for="kegiatan"></label>
                        <input type="text" name="kegiatan" id="kegiatan" class="form-control" placeholder="Masukan Kegiatan">
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
                        <input type="float" name="angka_kredit" id="angka_kredit" class="form-control" placeholder="Masukan Angka Kredit">

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
                        <select class="form-control" name="kode_jabatan" id="combo1">
                            <option value="">Pilih Kode Jabatan</option>
                            <?php foreach ($struktur as $k) : ?>
                                <option value="<?= $k['kode_jabatan'] ?>"><?= $k['kode_jabatan'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="tambahkamus" class="btn btn-primary">Tambah</button>
            </div>
        </div>
        </form>
    </div>
</div>


<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <br>
                <p class="desc_kegiatan">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam quidem repudiandae accusamus, perferendis voluptatem aut atque inventore dolores qui facilis doloribus, fugit aliquid fugiat! Temporibus a ratione nemo tenetur quaerat?</p>
                <br>
                <label for="satuan_hasil"><b>Satuan Hasil :</b></label>
                <i class="satuan_hasil">Angka Kredit</i>
                <br>
                <label for="angka_kredit"><b>Angka Kredit :</b></label>
                <i class="angka_kredit">Angka Kredit</i>
                <br>
                <label for="batasan_penilaian"><b>Batasan Penilaian :</b></label>
                <i class="batasan_penilaian">Batasan Penilaian</i>
                <br>
                <label for="pelaksana"><b>Pelaksana :</b></label>
                <i class="pelaksana">Pelaksana</i>
                <br>
                <label for="bukti_fisik"><b>Bukti Fisik :</b></label>
                <p class="bukti_fisik">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, doloremque dolorum adipisci consequuntur et aut placeat asperiores, rerum nobis sit obcaecati facere labore repellendus beatae, maiores provident ipsa? Dolor, unde?</p>
                <br>
                <label for="contoh"><b>Contoh :</b></label>
                <p class="contoh">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi velit ipsam nesciunt atque debitis numquam ad consequatur veniam vero architecto eius obcaecati, laudantium porro ea nihil! Doloribus quo nemo dignissimos.</p>
                <br>
                <label for="kode_jabatan"><b>Kode Jabatan :</b></label>
                <i class="kode_jabatan">Kode Jabatan</i>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>