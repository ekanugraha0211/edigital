<script>
    // Fungsi untuk menangani pencarian produk
    function cariProduk() {
        // Mendapatkan nilai input dari pengguna
        var kataKunci = document.getElementById('search-input').value;

        // Mengirim permintaan AJAX ke server
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/produk/cari?katakunci=' + kataKunci, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Mendapatkan respons dari server
                var response = xhr.responseText;
                // Memperbarui tampilan dengan produk yang ditemukan
                // Misalnya, Anda dapat memperbarui daftar produk di dalam div khusus
                document.getElementById('hasil-pencarian').innerHTML = response;
            }
        };
        xhr.send();
    }

    // Menambahkan event listener ke tombol pencarian
    document.getElementById('search-button').addEventListener('click', function() {
        cariProduk();
    });
</script>