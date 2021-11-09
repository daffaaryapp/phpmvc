// tambah data
$(".tombolTambah").click(function () {
  $("#judulModal").html("Tambah Data");
  $(".modal-footer button[type=submit]").html("Tambah Data");
});

// edit data
$(".tampilModalUbah").click(function () {
  $("#judulModal").html("Edit Data");
  $(".modal-footer button[type=submit]").html("Edit Data");
  //jalankan method edit
  $(".modal-body form").attr("action", "http://localhost/phpmvc/public/mahasiswa/edit");

  const id = $(this).data("id");

  //menggunakan fungsi ajax
  $.ajax({
    url: "http://localhost/phpmvc/public/mahasiswa/getUbah",
    //mengambil data dari var id
    data: { id: id },
    method: "post",
    dataType: "json",
    //jika sukses
    success: function (data) {
      //mengganti value nama di form sesuai data
      $("#nama").val(data.nama);
      $("#absen").val(data.absen);
      $("#kelas").val(data.kelas);
      $("#jurusan").val(data.jurusan);
      $("#id").val(data.id);
    },
  });
});
