$(document).on('click', '#btn-edit', function () {
  $('.modal-body #kd_kegiatan').val($(this).data('kd_kegiatan'));
  $('.modal-body #kode_kegiatan').val($(this).data('kode_kegiatan'));
  $('.modal-body #kegiatan').val($(this).data('kegiatan'));
  $('.modal-body #sub_kegiatan').val($(this).data('sub_kegiatan'));
  $('.modal-body #desc_kegiatan').val($(this).data('desc_kegiatan'));
  $('.modal-body #satuan_hasil').val($(this).data('satuan_hasil'));
  $('.modal-body #angka_kredit').val($(this).data('angka_kredit'));
  $('.modal-body #batasan_penilaian').val($(this).data('batasan_penilaian'));
  $('.modal-body #pelaksana').val($(this).data('pelaksana'));
  $('.modal-body #bukti_fisik').val($(this).data('bukti_fisik'));
  $('.modal-body #contoh').val($(this).data('contoh'));
  $('.modal-body #kd_kerja').val($(this).data('kd_kerja'));
  $('.modal-body #jabatan').val($(this).data('jabatan'));
  $('.modal-body #kode_jabatan').val($(this).data('kode_jabatan'));
  $('.modal-body #jenjang').val($(this).data('jenjang'));
  $('.modal-body #butir_kegiatan').val($(this).data('butir_kegiatan'));
});

$(document).on('click', '#btn-detail', function () {
  $('.modal-header .modal-title').text($(this).data('kegiatan'));
  $('.modal-body .sub_kegiatan').text($(this).data('sub_kegiatan'));
  $('.modal-body .desc_kegiatan').text($(this).data('desc_kegiatan'));
  $('.modal-body .satuan_hasil').text($(this).data('satuan_hasil'));
  $('.modal-body .angka_kredit').text($(this).data('angka_kredit'));
  $('.modal-body .batasan_penilaian').text($(this).data('batasan_penilaian'));
  $('.modal-body .pelaksana').text($(this).data('pelaksana'));
  $('.modal-body .bukti_fisik').text($(this).data('bukti_fisik'));
  $('.modal-body .contoh').text($(this).data('contoh'));
  $('.modal-body .kd_kerja').text($(this).data('kd_kerja'));
  $('.modal-body .kode_jabatan').text($(this).data('kode_jabatan'));
});

$(document).on('click', '#btn-editdoc', function () {
  $('.modal-body #kode_jabatan').val($(this).data('kode_jabatan'));
  $('.modal-body #jabatan').val($(this).data('jabatan'));
  $('.modal-body #sub_jabatan').val($(this).data('sub_jabatan'));
  $('.modal-body #rincian_kegiatan').val($(this).data('rincian_kegiatan'));
});

// Sweet Alert
const swal = $('.swal').data('swal');
if (swal) {
  Swal.fire({
    title: 'Data Perubahan',
    text: swal,
    icon: 'success'
  });
}

$(document).on('click', '#btn-hapus', function (e) {
  e.preventDefault();
  const href = $(this).attr('href');
  Swal.fire({
    title: 'Apa Kamu Yakin?',
    text: 'Menghapus Data!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.value) {
      document.location.href = href;
    }
  });
});
