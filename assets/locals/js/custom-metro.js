$(document).ready(function () {
  $("#rapat").DataTable();

  //    Media types Add
  $("#type_id").change(function () {
    var id_type = $("#type_id").val();
    var dataJson = {
      id_type: id_type,
    };
    $.ajax({
      url: "http://localhost/e-rapat/rapat/get_media_meeting",
      method: "POST",
      data: dataJson,
      async: false,
      dataType: "json",
      success: function (data) {
        var html = "";
        var i;

        for (i = 0; i < data.length; i++) {
          html +=
            "<option value=" +
            data[i].id +
            ">" +
            data[i].meeting_subtype +
            "</option>";
        }
        $("#meeting_subtype").html(html);
      },
    });
  });
});
