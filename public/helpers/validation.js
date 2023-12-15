$(function () {
  var currentRoute = $('meta[name="current-route"]').attr('content');

  $('#quickForm').validate({
    rules: {
      idPrestasi: {
        required: true
      },
      nim: {
        required: true
      },
      namaMahasiswa: {
        required: true
      },
      namaPrestasi: {
        required: true
      },
      tingkatPrestasi: {
        required: true
      },
      tahunPengeluaran: {
        required: true
      },
      tahunAngkatan: {
        required: true
      },
      jenisSertifikat: {
        required: true
      },
      dokumen: (currentRoute === 'create_prestasi') ? { required: true } : false,
    },
    messages: {
      idPrestasi: {
        required: "Masukkan ID Prestasi"
      },
      nim: {
        required: "Masukkan NIM"
      },
      namaMahasiswa: {
        required: "Masukkan Nama Mahasiswa"
      },
      namaPrestasi: {
        required: "Masukkan Nama Prestasi"
      },
      tingkatPrestasi: {
        required: "Masukkan Tingkat prestasi"
      },
      tahunPengeluaran: {
        required: "Masukkan Tahun Pengeluaran"
      },
      tahunAngkatan: {
        required: "Masukkan Tahun Angkatan"
      },
      jenisSertifikat: {
        required: "Masukkan Jenis Sertifikat"
      },
      dokumen: {
        required: "Masukkan Dokumen",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
