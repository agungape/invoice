// Sweet Alert
const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal.fire({
        title: 'Sukses',
        text: 'Data Berhasil ' + flashData,
        type: 'success'
    });
}

// Sweet Alert
const flashGagal = $('.flash-data-gagal').data('flashdata');

if (flashGagal) {
    Swal.fire({
        title: 'Gagal',
        text: 'Data Gagal ' + flashGagal,
        type: 'error'
    });
}



// tombol-hapus
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin',
        text: "data akan dihapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e74c3c',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Delete'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});