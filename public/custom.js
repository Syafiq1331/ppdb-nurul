// Fungsi untuk menampilkan Toast
function showToast() {
  var toast = new bootstrap.Toast(document.getElementById('notification-toast'));
  toast.show();
}

// Cek apakah data belum diisi dan tampilkan Toast jika iya
document.addEventListener('DOMContentLoaded', function () {
  var belumDiisi =
    "{{ auth()->user()->santri ? (auth()->user()->santri->bukti_pembayaran ? false : true) : true }}";
  if (belumDiisi) {
    showToast();
  }
});

// Menyembunyikan Toast saat tombol close diklik
var toastElement = document.getElementById('notification-toast');
toastElement.addEventListener('hidden.bs.toast', function () {
  // Di sini Anda dapat menambahkan logika lain yang ingin dijalankan setelah Toast disembunyikan
  console.log('Toast disembunyikan');
});