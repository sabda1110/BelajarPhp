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
            <div class="">
                <form action="kamusprakom/index" method="post" autocomplete="off">
                    <div class="float-right mr-10">
                        <button type="submit" class="btn btn-primary"> <i class="fas fa-search"></i></button>
                    </div>
                    <div class="float-right ml-3">
                        <input type="text" name="keyword" class="form-control" value="" id="" style="width: 155pt;" placeholder="Masukan Keyword">
                    </div>
                </form>
            </div>
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
                                <button type="button" data-toggle="modal" data-target="#modalDetail" class="btn btn-sm btn-success" id="btn-detail" data-kd_kegiatan="<?= $row['kd_kegiatan'] ?>" data-kegiatan="<?= $row['kegiatan'] ?>" data-sub_kegiatan="<?= $row['sub_kegiatan'] ?>" data-desc_kegiatan="<?= $row['desc_kegiatan'] ?>" data-satuan_hasil="<?= $row['satuan_hasil'] ?>" data-angka_kredit="<?= $row['angka_kredit'] ?>" data-batasan_penilaian="<?= $row['batasan_penilaian'] ?>" data-pelaksana="<?= $row['pelaksana'] ?>" data-bukti_fisik="<?= $row['bukti_fisik'] ?>" data-contoh="<?= $row['contoh'] ?>" data-kd_kerja="<?= $row['kd_kerja'] ?>"> <i class="fa fa-book"></i></button>
                                <a href="/kamusprakom/hapus/<?= $row['kd_kegiatan'] ?>" id="btn-hapus" class="btn btn-sm btn-danger" data-id=""> <i class="fa fa-trash"></i> </a>
                                <button type="button" data-toggle="modal" data-target="#modalEdit" class="btn btn-sm btn-warning" id="btn-edit" data-kd_kegiatan="<?= $row['kd_kegiatan'] ?>" data-kegiatan="<?= $row['kegiatan'] ?>" data-sub_kegiatan="<?= $row['sub_kegiatan'] ?>" data-desc_kegiatan="<?= $row['desc_kegiatan'] ?>" data-satuan_hasil="<?= $row['satuan_hasil'] ?>" data-angka_kredit="<?= $row['angka_kredit'] ?>" data-batasan_penilaian="<?= $row['batasan_penilaian'] ?>" data-pelaksana="<?= $row['pelaksana'] ?>" data-bukti_fisik="<?= $row['bukti_fisik'] ?>" data-contoh="<?= $row['contoh'] ?>" data-kd_kerja="<?= $row['kd_kerja'] ?>"> <i class="fa fa-edit"></i></button>


                            </td>

                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
            <?= $pager->links('kamusprakon', 'bootstrap_pager') ?>
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
                <form action="Kamusprakom/tambah" method="post">
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
                <form action="kamusprakom/edit" method="post">

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
                        <select class="form-control" name="kd_kerja" id="kd_kerja">
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

                <h4 class="sub_kegiatan">Sub Kegiatan</h4>
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
                <label for="kd_kerja"><b>Kode Jabatan :</b></label>
                <i class="kd_kerja">Kode Jabatan</i>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>