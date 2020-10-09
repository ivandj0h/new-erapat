setTimeout(function () {
  $("#login").text("Cek Perangkat Anda...");
  setTimeout(function () {
    $("#login").text("Cek Koneksi...");
    setTimeout(function () {
      $("#login").text("Cek Database...");
      setTimeout(function () {
        $("#login").text("Cek Media Penyimpanan...");
        setTimeout(function () {
          $("#login").text("Cek Akun...");
          setTimeout(function () {
            $("#login").text("Verifikasi Akun...");
            setTimeout(function () {
              $("#login").text("Proses Pengecekan Berhasil...");
              $("#login").text("Mohon menunggu...");
            }, 500);
          }, 500);
        }, 500);
      }, 500);
    }, 500);
  }, 500);
}, 500);

function callback() {
  var html_content =
    "<h3>Selamat Datang</h3>" +
    "<p>Proses Pengecekan Akun Anda Telah Berhasil</p>" +
    "<p>Anda akan segera dialihkan...<img src='assets/locals/img/loading.gif' style='width: 17px;'></p>";

  Metro.infobox.create(html_content);
  setTimeout(function () {
    newWin.close();
  }, 3);
}

(function () {
  var counter = 100;
  setTimeout(function () {
    setInterval(function () {
      counter--;
      if (counter >= 0) {
        span = document.getElementById("count");
        span.innerHTML = counter;
      }
      if (counter === 0) {
        clearInterval(counter);
        callback();
      }
    }, 100);
  }, 10);
})();