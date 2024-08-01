const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});


    $(document).ready(function() {
      // Sembunyikan semua modal saat halaman dimuat
      $('.modal').hide();
  
      // Tampilkan modal yang sesuai saat tombol "Update" diklik
      $('.btn-warning').click(function() {
        var modalId = $(this).data('target');
        $(modalId).modal('show');
      });
    });
