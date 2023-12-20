$(function () {
  var currentRoute = $('meta[name="current-route"]').attr('content');

  $('#quickForm').validate({
    rules: {
      // prestasi
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
      // lomba
      id_lomba: {
        required: true
      },
      nama_lomba: {
        required: true
      },
      tingkat_lomba: {
        required: true
      },
      tanggal_posting: {
        required: true
      },
      tanggal_berakhir: {
        required: true
      },
      deskripsi: {
        required: true,
        maxlength:255
      },
      foto: {
        required: true
      },
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
      id_lomba: {
        required: "Masukkan ID Lomba",
      },
      nama_lomba: {
        required: "Masukkan Nama Lomba",
      },
      tingkat_lomba: {
        required: "Masukkan Tingkatan Lomba",
      },
      tanggal_posting: {
        required: "Masukkan Tanggal Posting",
      },
      tanggal_berakhir: {
        required: "Masukkan Tanggal Berakhir",
      },
      deskripsi: {
        required: "Masukkan Deskripsi",
        maxlength: "Deskripsi tidak boleh lebih dari 255 karakter",
      },
      foto: {
        required: "Masukkan Foto"
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