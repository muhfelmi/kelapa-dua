$(document).ready(function () {
  $("#keyword").on("keyup", function () {
    $("#container").load("ajax/perusahaan.php?keyword=" + $("#keyword").val());
  });
});
