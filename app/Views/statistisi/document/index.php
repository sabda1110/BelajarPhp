  <!-- Begin Page Content -->
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
          <form action="statistisi/index" method="post" autocomplete="off">
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
              <th scope="col">Kode Jabatan</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Sub jabatan</th>
              <th scope="col">Rincian Kegiatan</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($struktur as $row) : ?>
              <tr>
                <th scope="row"><?= $row['kode_jabatan'] ?></th>
                <td><?= $row['jabatan'] ?></td>
                <td><?= $row['sub_jabatan'] ?></td>
                <td><?= $row['rincian_kegiatan'] ?></td>
                <td>
                  <a href="/statistisi/hapusdoc/<?= $row['kode_jabatan'] ?>" id="btn-hapus" class="btn btn-sm btn-danger" data-id=""> <i class="fa fa-trash"></i> </a>
                  <button type="button" data-toggle="modal" data-target="#modalEdit" class="btn btn-sm btn-warning" id="btn-editdoc" data-kode_jabatan="<?= $row['kode_jabatan'] ?>" data-jabatan="<?= $row['jabatan'] ?>" data-sub_jabatan="<?= $row['sub_jabatan'] ?>" data-rincian_kegiatan="<?= $row['rincian_kegiatan'] ?>"><i class="fa fa-edit"></i></button>
                </td>

              </tr>

            <?php endforeach; ?>


          </tbody>
        </table>
        <?= $pager->links('statis', 'bootstrap_pager') ?>

      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <!-- Modal Input -->
  <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Dokumentasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="statistisi/tambahdoc" method="post">
            <div class="form-group">
              <label for="kode_jabatan"></label>
              <input type="text" name="kode_jabatan" id="kode_jabatan" class="form-control" placeholder="Masukan Kode Kerja">
            </div>
            <div class="form-group">
              <label for="jabatan"></label>
              <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Masukan Jabatan">
            </div>
            <div class="form-group">
              <label for="sub_jabatan"></label>
              <input type="text" name="sub_jabatan" id="sub_jabatan" class="form-control" placeholder="Masukan Jenjang Jabatan">
            </div>
            <div class="form-group">
              <label for="rincian_kegiatan"></label>
              <textarea class="form-control" name="rincian_kegiatan" id="rincian_kegiatan" rows="3" placeholder="Masukan Butir Kegiatan"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name='tambah' class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal Edit -->
  <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Dokumentasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="statistisi/editdoc" method="post">

            <input type="hidden" name="kode_jabatan" id="kode_jabatan" class="form-control">

            <div class="form-group">
              <label for="jabatan"></label>
              <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Masukan Jabatan">
            </div>
            <div class="form-group">
              <label for="sub_jabatan"></label>
              <input type="text" name="sub_jabatan" id="sub_jabatan" class="form-control" placeholder="Masukan Sub Jabatan">
            </div>
            <div class="form-group">
              <label for="rincian_kegiatan"></label>
              <textarea class="form-control" name="rincian_kegiatan" id="rincian_kegiatan" rows="3" placeholder="Masukan Butir Kegiatan"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name='editdoc' class="btn btn-primary">Edit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>