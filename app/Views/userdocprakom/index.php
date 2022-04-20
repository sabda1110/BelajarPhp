  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">Data Butir Kegiatan</h1>

      <div class="swal" data-swal='<?= session()->getFlashdata('pesan') ?>'></div>


      <div class="row">
          <div class="col-md-6">

          </div>
      </div>
      <div class="card">
          <div class="card-body">
              <div class="">
                  <form action="userdocprakom/index" method="post" autocomplete="off">
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
                          <th scope="col">Jenjang</th>
                          <th scope="col">Butir Kegiatan</th>
                      </tr>
                  </thead>
                  <tbody>

                      <?php foreach ($struktur as $row) : ?>
                          <tr>
                              <th scope="row"><?= $row['kd_kerja'] ?></th>
                              <td><?= $row['jabatan'] ?></td>
                              <td><?= $row['jenjang'] ?></td>
                              <td><?= $row['butir_kegiatan'] ?></td>
                          </tr>
                      <?php endforeach; ?>

                  </tbody>
              </table>
              <?= $pager->links('docprakon', 'bootstrap_pager') ?>
          </div>
      </div>

  </div>