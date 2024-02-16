// Mengambil Elemen
const keyword = document.getElementById("keyword");
const tombolCari = document.getElementById("tombol-cari");
const container = document.getElementById("container");

console.log(keyword);

keyword.addEventListener("keyup", function () {
  //   membuat object ajax
  const xhr = new XMLHttpRequest();

  //   cek ajax
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      container.innerHTML = xhr.responseText;
    }
  };

  //   eksekusi ajax
  xhr.open("GET", "ajax/perusahaan.php?keyword=" + keyword.value, true);
  xhr.send();
});
