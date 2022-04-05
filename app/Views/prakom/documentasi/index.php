  <!-- Begin Page Content -->
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
                          <th scope="col">Kode Jabatan</th>
                          <th scope="col">Jabatan</th>
                          <th scope="col">Jenjang</th>
                          <th scope="col">Butir Kegiatan</th>
                          <th scope="col">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>

                      <?php foreach ($struktur as $row) : ?>
                          <tr>
                              <th scope="row"><?= $row['kd_kerja'] ?></th>
                              <td><?= $row['jabatan'] ?></td>
                              <td><?= $row['jenjang'] ?></td>
                              <td><?= $row['butir_kegiatan'] ?></td>
                              <td>
                                  <a href="/prakon/hapus1/<?= $row['kd_kerja'] ?>" id="btn-hapus" class="btn btn-sm btn-danger" data-id=""> <i class="fa fa-trash"></i> </a>
                                  <button type="button" data-toggle="modal" data-target="#modalEdit" class="btn btn-sm btn-warning" id="btn-edit" data-kd_kerja="<?= $row['kd_kerja'] ?>" data-jabatan="<?= $row['jabatan'] ?>" data-jenjang="<?= $row['jenjang'] ?>" data-butir_kegiatan="<?= $row['butir_kegiatan'] ?>"><i class="fa fa-edit"></i></button>
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
                  <form action="prakon/tambah1" method="post">
                      <div class="form-group">
                          <label for="kd_kerja"></label>
                          <input type="text" name="kd_kerja" id="kd_kerja" class="form-control" placeholder="Masukan Kode Kerja">
                      </div>
                      <div class="form-group">
                          <label for="jabatan"></label>
                          <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Masukan Jabatan">
                      </div>
                      <div class="form-group">
                          <label for="jenjang"></label>
                          <input type="text" name="jenjang" id="jenjang" class="form-control" placeholder="Masukan Jenjang Jabatan">
                      </div>
                      <div class="form-group">
                          <label for="butir_kegiatan"></label>
                          <textarea class="form-control" name="butir_kegiatan" id="butir_kegiatan" rows="3" placeholder="Masukan Butir Kegiatan"></textarea>
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
                  <form action="prakon/edit1" method="post">

                      <input type="hidden" name="kd_kerja" id="kd_kerja" class="form-control" placeholder="Masukan Kode Kerja">

                      <div class="form-group">
                          <label for="jabatan"></label>
                          <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Masukan Jabatan">
                      </div>
                      <div class="form-group">
                          <label for="jenjang"></label>
                          <input type="text" name="jenjang" id="jenjang" class="form-control" placeholder="Masukan Jenjang Jabatan">
                      </div>
                      <div class="form-group">
                          <label for="butir_kegiatan"></label>
                          <textarea class="form-control" name="butir_kegiatan" id="butir_kegiatan" rows="3" placeholder="Masukan Butir Kegiatan"></textarea>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" name='edit1' class="btn btn-primary">Edit</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>