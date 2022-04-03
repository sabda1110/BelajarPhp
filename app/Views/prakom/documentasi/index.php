  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">Data Butir Kegiatan</h1>
      <div class="card">
          <div class="card-body">

              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th scope="col">Kode Kegiatan</th>
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
          </div>
      </div>

  </div>
  <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->