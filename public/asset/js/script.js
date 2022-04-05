$(document).on('click', '#btn-edit', function () {
  $('.modal-body #kd_kegiatan').val($(this).data('kd_kegiatan'));
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
  $('.modal-body #jenjang').val($(this).data('jenjang'));
  $('.modal-body #butir_kegiatan').val($(this).data('butir_kegiatan'));
});
