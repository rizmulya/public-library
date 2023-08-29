let BASEURL = "http://localhost/library/public";

$(function () {
  $(".modalUbah-Buku").on("click", function () {
    $id = $(this).data("id");
    // alert($id)
    // Lakukan Ajax untuk mendapatkan data kategori berdasarkan ID
    $.ajax({
      method: "post",
      data: { id: $id },
      url: `${BASEURL}/borrow/buku_json`,
      dataType: "json",
      success: function (data) {
        $("#judul").val(data['buku'][0].judul);
        $("#id_kategori").val(data['buku'][0].id_kategori);
        $("#kode_buku").val(data['buku'][0].kode_buku);
        $("#stok").val(data['buku'][0].stok);
        $("#detail").val(data['buku'][0].detail);
        $("#id_buku").val(data['buku-id'].id);
      },
    });
  });

  $(".modalUbah-Kategori").on("click", function () {
      $id = $(this).data("id");
      // alert($id)
      $.ajax({
      method: "post",
      data: { id: $id },
      url: `${BASEURL}/borrow/kategori_json`,
      dataType: "json",
      success: function (data) {
          $("#kategori").val(data.kategori);
          $("#keterangan").val(data.keterangan);
          $("#id").val(data.id);
      },
      });
  });

  $(".modalUbah-Users").on("click", function () {
      $id = $(this).data("id");
      // alert($id)
      $.ajax({
      method: "post",
      data: { id: $id },
      url: `${BASEURL}/borrow/users_json`,
      dataType: "json",
      success: function (data) {
          $("#nama").val(data.nama);
          $("#username").val(data.username);
          $("#nik").val(data.nik);
          $("#role").val(data.role);
          $("#idUser").val(data.id);
      },
      });
  });

  $(".modalUbah-Borrowed").on("click", function () {
      $id = $(this).data("id");
      // alert($id)
      $.ajax({
      method: "post",
      data: { id: $id },
      url: `${BASEURL}/borrow/borrowed_json`,
      dataType: "json",
      success: function (data) {
          $("#id_checkout").val(data.id_checkout);
      },
      });
  });

  $(".modalUbah-Dikembalikan").on("click", function () {
      $id = $(this).data("id");
      // alert($id)
      $.ajax({
      method: "post",
      data: { id: $id },
      url: `${BASEURL}/borrow/borrowed_json`,
      dataType: "json",
      success: function (data) {
          $("#id_kembali").val(data.id_checkout);
      },
      });
  });

  $(".modalDetail-Physical").on("click", function () {
    $id = $(this).data("id");
    // alert($id)
    $.ajax({
        method: "post",
        data: { id: $id },
        url: `${BASEURL}/home/physical_json`,
        dataType: "json",
        success: function (data) {
            $("#judul").text(data['buku'][0].judul);
            $("#kategori").text(data['buku'][0].kategori);
            $("#kode_buku").text(data['buku'][0].kode_buku);
            $("#stok").text(data['buku'][0].stok);
            $("#dipinjam").text(data['buku'][0].dipinjam);
            $("#detail").text(data['buku'][0].detail);
            $("#img_book").attr("src", `${BASEURL}/img/books/${data['buku'][0].gambar}`);
        },
    });
  });

  $(".modalBorrow-Physical").on("click", function () {
    $id = $(this).data("id");
    // alert($id)
    $.ajax({
        method: "post",
        data: { id: $id },
        url: `${BASEURL}/home/physical_borrow_json`,
        dataType: "json",
        success: function (data) {
            $("#judulB").text(data['buku'][0].judul);
            $("#stokB").text(data['buku'][0].stok);
            $("#dipinjamB").text(data['buku'][0].dipinjam);
            $("#id_buku").val(data['buku-id'].id);
            $("#id_users").val(data['users'].id);
            $("#img_bookB").attr("src", `${BASEURL}/img/books/${data['buku'][0].gambar}`);
        },
    });
  });

  $(".modalBorrow-Physical2").on("click", function () {
    $id = $(this).data("id");
    // alert($id)
    $.ajax({
        method: "post",
        data: { id: $id },
        url: `${BASEURL}/home/physical_borrow_json`,
        dataType: "json",
        success: function (data) {
            $("#judulB").text(data['buku'][0].judul);
            $("#stokB").text(data['buku'][0].stok);
            $("#dipinjamB").text(data['buku'][0].dipinjam);
            $("#id_buku").val(data['buku-id'].id);
            $("#id_users").val(data['users'].id);
            $("#img_bookB").attr("src", `${BASEURL}/img/books/${data['buku'][0].gambar}`);
        },
    });
  });


  $('.modalHapus-Buku').on('click', function() {
    // Ambil data ID dari tombol yang ditekan
    $id = $(this).data('id');
    // isi input type hidden 
    $("#id_del").val($id);
  });

  $('.modalHapus-Kategori').on('click', function() {
    $id = $(this).data('id');
    $("#id_del").val($id);
  });

  $('.modalHapus-Users').on('click', function() {
    $id = $(this).data('id');
    $("#id_del").val($id);
  });

  $('.modalHapus-Cart').on('click', function() {
    $id = $(this).data('id');
    $("#id_del").val($id);
  });

  $('.modalHapus-Status').on('click', function() {
    $id = $(this).data('id');
    $("#id_del").val($id);
  });

  $('.modalHapus-Borrowed').on('click', function() {
    $id = $(this).data('id');
    $("#id_del").val($id);
  });

  var reader;

  $("#imageInput-Add").on("change", function(event) {
      var file = event.target.files[0];
      reader = new FileReader();

      reader.onload = function(e) {
          $("#imagePreview-Add").html('<img src="' + e.target.result + '" alt="Preview">');
          $("#removePreview-Add").show();
      }

      reader.readAsDataURL(file);
  });

  $("#removePreview-Add").on("click", function() {
      $("#imagePreview-Add").empty();
      $("#imageInput-Add").val("");
      $(this).hide();
  });
  
  $("#imageInput-Edit").on("change", function(event) {
      var file = event.target.files[0];
      reader = new FileReader();

      reader.onload = function(e) {
          $("#imagePreview-Edit").html('<img src="' + e.target.result + '" alt="Preview">');
          $("#removePreview-Edit").show();
      }

      reader.readAsDataURL(file);
  });

  $("#removePreview-Edit").on("click", function() {
      $("#imagePreview-Edit").empty();
      $("#imageInput-Edit").val("");
      $(this).hide();
  });

});