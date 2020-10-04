function infoBoxEventsExample1(data) {
  var html_content = data;

  Metro.infobox.create(html_content, "alert", {
    onOpen: function () {
      var ib = $(this).data("infobox");
      setTimeout(function () {
        console.log("ddd");
      }, 1000);
    },
  });
}
