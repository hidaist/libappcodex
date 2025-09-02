getNoInvoice()

setInterval('getDateTime()', 1000)

$('#btnSimpan, #btnCetak, #btnAdd').css({
    cursor: 'not-allowed'
})

// Data barang yang akan tampil di jquery autocomple
// key:label adalah bawaan jquery autocomple, sebaiknya jangan diganti saja
const dataBarang = [
    {
        label: "Adem Sari",
        harga: "2000",
        stok: "3",
        id_barang: "XK9IQ9P1S4",
        tgl_exp: "2021-08-22"
    },
    {
        label: "Beng-beng",
        harga: "2000",
        stok: "8",
        id_barang: "U71DDMMIIK",
        tgl_exp: "2022-09-25"
    },
    {
        label: "Sandal Swalow",
        harga: "15000",
        stok: "30",
        id_barang: "WAQMOXI4EI",
        tgl_exp: "2022-12-30"
    },
    {
        label: "Bejo Bintang Toedjoe",
        harga: "2500",
        stok: "2",
        id_barang: "K0WGPD0370",
        tgl_exp: "2021-07-31"
    },
    {
        label: "Betadine",
        harga: "12500",
        stok: "13",
        id_barang: "I6G265WNR5",
        tgl_exp: "2021-11-06"
    },
    {
        label: "Energen",
        harga: "5000",
        stok: "36",
        id_barang: "7ZBX9MBM6B",
        tgl_exp: "2021-02-05"
    },
    {
        label: "Diapet",
        harga: "1500",
        stok: "0",
        id_barang: "AGNST268U3",
        tgl_exp: "2022-04-02"
    },
    {
        label: "Oreo Supreme",
        harga: "550000",
        stok: "2",
        id_barang: "58Q8B9Z9HJ",
        tgl_exp: "2021-12-25"
    },
    {
        label: "Kiko",
        harga: "20000",
        stok: "12",
        id_barang: "N14W4PBXXT",
        tgl_exp: "2021-09-01"
    },
    {
        label: "Chocolatos",
        harga: "25000",
        stok: "0",
        id_barang: "T8J0C646C1",
        tgl_exp: "2020-12-05"
    },
    {
        label: "Indomie Goreng",
        harga: "2500",
        stok: "999",
        id_barang: "T8JGSDG61P",
        tgl_exp: "2023-12-05",
    },
    {
        label: "Tolak Angin",
        harga: "3500",
        stok: "40",
        id_barang: "KJDSF051AS",
        tgl_exp: "2022-10-25",
    },
]

// BAGIAN KIRI
// invoice dan customer

// Select2 bootstrap4 theme
$('#customer').select2({
    theme: 'bootstrap4',
    "language": {
        "noResults": function () {
            return "<small class='text-danger'>Tidak ditemukan data yang sesuai</small>"
        }
    },
    escapeMarkup: function (markup) {
        return markup
    }
})

// ketika select nama customer diubah
$('#customer').change(function () {
    if ($(this).val() !== 0) {

        //// bila make ajax bisa seperti ini kodingya
        // $.ajax({
        //     url: "customer/get_by_id/",
        //     type: "POST",
        //     data: "id_customer=" + $(this).val(),
        //     dataType: 'json',
        //     success: function (hasil) {
        //         $('#no_telp').val(hasil.no_telp);
        //         $('#alamat').val(hasil.alamat);
        //         console.log(hasil)
        //     }
        // });

        //// bila make ajax koding ini bisa dihapus
        let id = $(this).val()
        if (id === '1') {
            $('#no_telp').val('78998789')
            $('#alamat').val('Bekasi')
            $('#info_ln').val('Gold Experience Requiem')
        } else if (id === '2') {
            $('#no_telp').val('876768789')
            $('#alamat').val('Jakarta')
            $('#info_ln').val('Kono Dio Da!!')
        } else if (id === '3') {
            $('#no_telp').val('23423432')
            $('#alamat').val('Tanggerang')
            $('#info_ln').val('Tidak ada')
        } else if (id === '4') {
            $('#no_telp').val('13145456')
            $('#alamat').val('Medan')
            $('#info_ln').val('Tidak ada')
        } else if (id === '5') {
            $('#no_telp').val('54546457')
            $('#alamat').val('Padang')
            $('#info_ln').val('Utang sisa 3.000')
        } else {
            $('#no_telp').val('Tidak ada')
            $('#alamat').val('Tidak ada')
            $('#info_ln').val('Tidak ada')
        }
        //// sampe sini hapusnya
    } else {
        $('#no_telp').attr('placeholder', 'Tidak ada')
        $('#alamat').val('Tidak ada')
        $('#info_ln').val('Tidak ada')
    }
})
// AKHIR BAGIAN KIRI 

// Jquery autocomplete
$('#input_kode').autocomplete({

    source: dataBarang,

    select: function (e, ui) {
        // $('#nama_barang_head').val(ui.item.label);
        $('#input_kode').val(ui.item.label)
        $('#nama_barang_hide').val(ui.item.label)
        $('#harga_head').val(ui.item.harga)
        $('#tgl_exp').val(ui.item.tgl_exp)
        $('#harga_head_tampil').val('Rp. ' + formatRupiah(ui.item.harga))

        $('#stok_head').val(ui.item.stok)
        $('#id_barang_head').val(ui.item.id_barang)

        $('#qty_head').val('1')
        $('#qty_head').prop('disabled', false)
        $('#qty_head').focus()
        $('#qty_head').css({
            cursor: 'auto'
        })

        $('#subtotal_head').val(parseInt($('#qty_head').val()) * parseInt($('#harga_head').val()))

        $('#subtotal_head_tampil').val('Rp. ' + formatRupiah(parseInt($('#qty_head').val()) * parseInt($('#harga_head').val())))

        $('#qty_head').on('keyup change', function () {
            $('#subtotal_head').val(parseInt($('#qty_head').val()) * parseInt($('#harga_head').val()))
            $('#subtotal_head_tampil').val('Rp. ' + formatRupiah(parseInt($('#qty_head').val()) * parseInt($('#harga_head').val())))
            if ($('#qty_head').val() == "" || $('#qty_head').val() < 1) {
                $('#subtotal_head_tampil').val('Rp. 0')
            }

        })
        $('#btnAdd').prop('disabled', false)
        $('#btnAdd').css({
            cursor: 'pointer'
        })
    }
})

// TAMBAH barang KE BELANJAAN
$(document).on('click', '#btnAdd', function (e) {
    e.preventDefault()

    // let nm_barang = $('#input_kode').val()
    let nm_barang_hide = $('#nama_barang_hide').val()
    let id_barang = $('#id_barang_head').val()
    let stok = parseInt($('#stok_head').val())
    let qty = parseInt($('#qty_head').val())
    let subtotal = $('#subtotal_head').val()
    let harga = $('#harga_head').val()

    let str = $('#tgl_exp').val()
    let justOneDot = str.replace(/[.](?=.*?\.)/g, '')
    let tgl_exp = parseFloat(justOneDot.replace(/[^0-9.]/g, ''))
    // hasilnya akan seperti ini 20200813
    // agar bisa dibandingkan dengan waktu sekrang

    let sekarang = new Date()
    let dd = String(sekarang.getDate()).padStart(2, '0')
    let mm = String(sekarang.getMonth() + 1).padStart(2, '0') //January is 0!
    let yyyy = sekarang.getFullYear()

    sekarang = yyyy + mm + dd
    // hasilnya akan seperti ini 20200813 sama dengan tgl_exp, tapi ini adalah waktu sekarang

    if (stok == 0) {
        // jika stok sama dengan 0
        kosongkanHeader()
        swAlert('Gagal', 'Stok ' + nm_barang_hide + ' sudah habis!', 'error')

    } else if (qty > stok) {
        // jika qty lebih besar dari stok
        $('#qty_head').focus()
        swAlert('Oops..', 'Stok ' + nm_barang_hide + ' hanya tersedia : ' + stok, 'info')
        $('#subtotal_head').val($('#harga_head').val())
        $('#subtotal_head_tampil').val('Rp. ' + formatRupiah(harga))
        $('#qty_head').val('1')
        $('#input_kode').val(nm_barang_hide)

    } else if (nm_barang_hide == "" || $('#stok_head').val() == "") {
        // jika nama barang dan stok kosong / belum terisi
        kosongkanHeader()
        $('#input_kode').val(nm_barang_hide)
        swAlert('Gagal', 'Data barang ' + nm_barang_hide + ' tidak ada!', 'error')

    } else if ($('#qty_head').val() == "" || qty < 1) {
        // jika qty kosong / belum terisi atau qty kurang dari 1
        $('#qty_head').focus()
        $('#input_kode').val(nm_barang_hide)
        swAlert('Gagal', 'Qty tidak boleh kosong!', 'error')

    } else if (sekarang >= tgl_exp || sekarang == tgl_exp) {
        // jika tanggal sekarang lebih besar dari tanggal kadaluwarsa atau tanggal sekarang sama dengan tanggal kadaluwarsa
        // maka barang tersebut sudah kadaluwarsa
        kosongkanHeader()

        swAlert('Gagal', nm_barang_hide + ' sudah kadaluwarsa!', 'error')

    } else {

        let qty_baru = ''
        // jika barang sama maka qty akan ditambah sesuai qty baru
        $('.id_barang').each(function () {
            if ($(this).val() === id_barang) {
                // cari indexnya
                let index = $(this).parent().parent().index()
                // isi qty lama + qty baru
                qty_baru = parseInt($('#tblTransaksi tbody tr:eq(' + index + ') td:nth-child(5) input.qty_foot').val()) + parseInt($('#qty_head').val())
                // hapus tr berdasarkan index
                $('#tblTransaksi tbody tr:eq(' + index + ')').remove()
                nomorBaru()
            }
        })

        let no = $('tbody#tbodyTransaksi tr').length + 1
        // jika barang sama maka qty baru akan mengisi qty lama
        if (qty_baru > 0) {
            if ((qty + qty_baru) > stok) {
                swAlert('Oops..', 'Stok ' + nm_barang_hide + ' hanya tersedia : ' + stok, 'info')
                qty = stok
                subtotal = harga * qty
            } else {
                qty = qty_baru
                subtotal = harga * qty_baru
            }
        }

        // Tambahkan ke table #tbodyTransaksi
        let dataTrx = '<tr id="listbarang">' +
            '<td>' + no + '</td>' +
            '<td class="id_barang">' + id_barang +
            '<input value="' + id_barang + '" type="hidden" name="id_barang[]" class="id_barang">' +
            '</td>' +
            '<td>' + nm_barang_hide +
            '<input type="hidden" class="form-control nm_barang_foot" value="' + nm_barang_hide + '">' +
            '</td>' +
            '<td class="harga">Rp. ' + formatRupiah(harga) +
            '<input value="' + harga + '" id="harga" type="hidden" name="harga[]">' +
            '</td>' +
            '<td class="qty">' +
            '<input type="number" class="form-control qty_foot" value="' + qty + '" min="1" max="' + stok + '" name="qty[]">' +
            '<input type="hidden" class="form-control qty_foot2" value="' + qty + '">' +
            '<input type="hidden" name="stok[]" class="form-control stok_foot" value="' + stok + '">' +
            '</td>' +
            '<td class="subtotal text-left">Rp. <p style="display:inline">' + formatRupiah(subtotal) + '</p>' +
            '<input value="' + subtotal + '" type="hidden" class="subtotalHidden" name="subtotal[]">' +
            '</td>' +
            '<td>' +
            '<a href="#" id="hapusItem"><i class="far fa-window-close fa-2x text-danger"></i></a>' +
            '</td>' +
            '</tr>'

        $('tbody#tbodyTransaksi').append(dataTrx)

        GrandTotal()

        hitungKembalian()

        kosongkanHeader()

        $('#btnAdd, #qty_head').css({
            cursor: 'not-allowed'
        })
    }
})

// Ketika qty foot(qty bawah) diubah menjadi nol
$(document).on('blur mouseleave mousemove', '.qty_foot', function () {
    let index = $(this).parent().parent().index()
    let qty = $(this).val()
    let harga = $('#tblTransaksi tbody tr:eq(' + index + ') td:nth-child(4) input').val()
    let hitungSubTotal = ''
    let subtotalVal = ''

    if (qty == '') {
        $(this).val('1')
    }

    hitungSubTotal = parseInt(harga) * parseInt(qty)
    if (hitungSubTotal > 0) {
        subtotalVal = hitungSubTotal
    } else {
        hitungSubTotal = ''
        subtotalVal = 0
    }

    $('#tblTransaksi tbody tr:eq(' + index + ') td:nth-child(6) input').val(subtotalVal)
    $('#tblTransaksi tbody tr:eq(' + index + ') td:nth-child(6) p').html(formatRupiah(subtotalVal))

    GrandTotal()
})

// KETIKA QTY DI BAWAH DI UBAH
$(document).on('keyup change focus', '.qty_foot', function () {

    // cari qty foot(qty bawah) yang sedang dipilih
    let index = $(this).parent().parent().index()
    let qty = $(this).val()
    let harga = $('#tblTransaksi tbody tr:eq(' + index + ') td:nth-child(4) input').val()
    let nm_barang = $('#tblTransaksi tbody tr:eq(' + index + ') td:nth-child(3) input').val()
    let stok = $('#tblTransaksi tbody tr:eq(' + index + ') td:nth-child(5) input.stok_foot').val()
    let hitungSubTotal = ''
    let subtotalVal = ''

    if (qty > parseInt(stok)) {
        $(this).val(stok)
        // $('#tblTransaksi tbody tr:eq(' + index + ') td:nth-child(6) p').html(harga);
        swAlert('Oops..', 'Stok ' + nm_barang + ' hanya tersedia : ' + stok, 'info')
    }

    hitungSubTotal = parseInt(harga) * parseInt(qty)
    if (hitungSubTotal > 0) {
        subtotalVal = hitungSubTotal
    } else {
        hitungSubTotal = ''
        subtotalVal = 0
    }

    $('#tblTransaksi tbody tr:eq(' + index + ') td:nth-child(6) input').val(subtotalVal)
    $('#tblTransaksi tbody tr:eq(' + index + ') td:nth-child(6) p').html(formatRupiah(subtotalVal))

    GrandTotal()
})

// menghapus barang ketika icon(X) ditekan
$(document).on('click', '#hapusItem', function (e) {
    e.preventDefault()

    // Mengambil index icon(X) ditekan, agar barang tidak terhapus semua
    $(this).parent().parent().remove()
    nomorBaru()
    GrandTotal()
    $('#inputBayar').val('')
    $('#kembalian').val('')
    $('#btnSimpan').prop('disabled', true)
    $('#btnCetak').prop('disabled', true)
})

// ketika tombol Batal diklik maka semuanya akan seperti awal lagi
$(document).on('click', '#btnBatal', function (e) {
    e.preventDefault()

    $('#input_kode').focus()

    Swal({
        title: 'Anda yakin?',
        text: "Data penjualan akan dihapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
            kosongkanSemua()
            swAlert('Sukses', 'Penjualan dibatalkan', 'success')
        }
    })
})

// Reset daftar belanjaannya saja
$(document).on('click', '#btnresetlist', function (e) {
    e.preventDefault()

    $('#input_kode').focus()

    Swal({
        title: 'Anda yakin?',
        text: "Tindakan ini akan menghapus daftar belanjaan",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus!',
        cancelButtonText: 'Batal'

    }).then((result) => {
        if (result.value) {
            //cek jika ada daftar belanjaan
            if ($('#listbarang').length) {
                $('#tblTransaksi tbody tr').remove()
                $('#btnSimpan').prop('disabled', true)
                $('#btnCetak').prop('disabled', true)
                $('#inputBayar').val('')
                $('#kembalian').val('')
                GrandTotal()
                swAlert('Reset Berhasil', 'Daftar belanjaan sudah dibersihkan', 'info')
            } else {
                swAlert('Tidak dapat membersihkan', 'Karena anda belum menginput apapun ke daftar', 'info')
            }
        }
    })
})

// Ketika #inputBayar diisi
$(document).on('change keyup click', '#inputBayar', function () {
    hitungKembalian()
    GrandTotal()
    if ($('input[name="grandtotal"]').val() <= 1) {
        $('#btnSimpan').prop('disabled', true)
        $('#btnCetak').prop('disabled', true)
        $('#btnSimpan, #btnCetak').css({
            cursor: 'not-allowed'
        })
    }
})

// Input format rupiah(jquery automask) 
$('#inputBayar').mask('0.000.000.000', {
    reverse: true
})

// Ketika tombol Simpan diklik
$(document).on('click', '#btnSimpan', function () {

    let dataTrx = ''

    // serialize() untuk mengambil semua value input yang ada pada #tblTransaksi
    dataTrx += "&" + $('#tblTransaksi tbody tr input').serialize()
    dataTrx += "&grandtotal=" + $('input[name="grandtotal"]').val()
    dataTrx += "&bayar=" + $('input[name="bayar"]').val()
    dataTrx += "&kembalian=" + $('input[name="kembalian"]').val()
    dataTrx += "&catatan=" + $('#catatan').val()
    dataTrx += "&no_faktur=" + $('input[name="no_faktur"]').val()
    dataTrx += "&tanggal=" + $('input[name="tanggal"]').val()
    dataTrx += "&kasir=" + $('input[name="kasir"]').val()
    dataTrx += "&customer=" + $('select[name="customer"]').val()

    //// Simpan menggunakan ajax
    // $.ajax({
    //     url: "simpan_penjualan.php",
    //     type: "POST",
    //     cache: false,
    //     data: dataTrx,
    //     dataType: 'json',
    //     success: function () {
    //         $('#btnSimpan').text('menyimpan...');
    //         $('#btnSimpan').attr('disabled', true);
    //         getNoInvoice();
    //         getDateTime();
    //         kosongkanSemua();
    //         swAlert('Sukses', 'Data Penjualan Berhasil Disimpan', 'success');
    //     }
    // })


    ////klo make ajax koding ini bisa dihapus
    kosongkanHeader()

    getNoInvoice()

    getDateTime()

    kosongkanSemua()

    swAlert('Sukses', 'Data penjualan berhasil disimpan', 'success')

    $('#btnSimpan').html('<i class="fa fa-save pr-2"></i>Simpan')
    //// sampe sini hapusnya
})

// Ketika tombol Cetak diklik
$(document).on('click', '#btnCetak', function () {
    let dataTrx = ''

    dataTrx += "&" + $('#tblTransaksi tbody tr input').serialize()
    dataTrx += "&grandtotal=" + $('input[name="grandtotal"]').val()
    dataTrx += "&bayar=" + $('input[name="bayar"]').val()
    dataTrx += "&kembalian=" + $('input[name="kembalian"]').val()
    dataTrx += "&catatan=" + $('#catatan').val()
    dataTrx += "&no_faktur=" + $('input[name="no_faktur"]').val()
    dataTrx += "&tanggal=" + $('input[name="tanggal"]').val()
    dataTrx += "&kasir=" + $('input[name="kasir"]').val()
    dataTrx += "&customer=" + $('select[name="customer"]').val()

    //  print di tab baru
    window.open("penjualan/cetak?" + dataTrx, '_blank')
})

// Menghapus semua inputan yang ada pada kode / nama barang, harga, QTY, subtotal
function kosongkanHeader() {
    $('#input_kode').val('')
    $('#input_kode').focus()

    $('#id_barang_head').val('')
    $('#stok_head').val('')

    $('#qty_head').val('')
    $('#qty_head').prop('disabled', true)

    $('#subtotal_head').val('')
    $('#subtotal_head_tampil').val('')

    $('#harga_head').val('')
    $('#harga_head_tampil').val('')

    $('#btnAdd').prop('disabled', true)
    $('#btnAdd, #qty_head').css({
        cursor: 'not-allowed'
    })

    GrandTotal()
}

// menghitung grandtotal
function GrandTotal() {
    let total = 0

    $('.subtotalHidden').each(function () {
        total += parseInt($(this).val())
    })

    hitungKembalian()

    $('#grandTotal').html('GRAND TOTAL : Rp. ' + formatRupiah(total) + ',-')
    $('input[name="grandtotal"]').val(total)
}

// membuat nomor baru setiap barang dihapus atau ditambahkan
function nomorBaru() {
    let no = 1
    $('#tblTransaksi tbody tr').each(function () {
        $(this).find('td:nth-child(1)').html(no)
        no++
    })
}

// membuat angka menjadi format rupiah
function formatRupiah(rupiah) {
    let rev = parseInt(rupiah, 10).toString().split('').reverse().join('')
    let rev2 = ''

    for (let i = 0; i < rev.length; i++) {
        rev2 += rev[i]
        if ((i + 1) % 3 === 0 && i !== (rev.length - 1)) {
            rev2 += '.'
        }
    }

    return rev2.split('').reverse().join('')
}

// Mengembalikan semuanya ke awal
// menghapus semua inputan yang sudah diisi
// atau sama dengan refresh halaman
function kosongkanSemua() {
    $('#tblTransaksi tbody tr').remove()
    $('#btnSimpan').prop('disabled', true)
    $('#btnCetak').prop('disabled', true)

    $('#inputBayar').val('')
    $('#kembalian').val('')
    $('#catatan').val('')

    $('input[name="grandtotal"]').val('')

    $("#customer").val("0").change()
    $('#no_telp').val('Tidak ada')
    $('#alamat').val('Tidak ada')
    $('#info_ln').val('Tidak ada')

    getDateTime()

    kosongkanHeader()

    GrandTotal()
}

// Menghitung kembalian
function hitungKembalian() {
    let grandtotal = $('input[name="grandtotal"]').val()
    let bayar = $('#inputBayar').val()
    let outStr = bayar.replace(/[^\w\s]/gi, '')
    let kembalian = ''

    if (parseInt(outStr) >= parseInt(grandtotal)) {

        kembalian = parseInt(outStr) - parseInt(grandtotal)
        $('#kembalian').val(formatRupiah(kembalian))
        $('input[name="bayar"]').val(outStr)
        $('input[name="kembalian"]').val(kembalian)
        $('#btnSimpan').prop('disabled', false)
        $('#btnCetak').prop('disabled', false)
        $('#btnSimpan, #btnCetak').css({
            cursor: 'grabbing'
        })

    } else {
        $('#kembalian').val('')
        $('#btnSimpan').prop('disabled', true)
        $('#btnCetak').prop('disabled', true)
        $('#btnSimpan, #btnCetak').css({
            cursor: 'not-allowed'
        })
    }

}

// Alert menggunakan SweetAlert2
function swAlert(title, text, type) {
    Swal({
        title: title,
        text: text,
        type: type
    })
};

// mendapatkan tanggal sekarang
function getDateTime() {
    let now = new Date()
    let year = now.getFullYear()
    let month = now.getMonth() + 1
    let day = now.getDate()
    let hour = now.getHours()
    let minute = now.getMinutes()
    let second = now.getSeconds()

    if (month.toString().length == 1) {
        month = '0' + month
    }
    if (day.toString().length == 1) {
        day = '0' + day
    }
    if (hour.toString().length == 1) {
        hour = '0' + hour
    }
    if (minute.toString().length == 1) {
        minute = '0' + minute
    }
    if (second.toString().length == 1) {
        second = '0' + second
    }
    let dateTime = day + '/' + month + '/' + year + ' ' + hour + ':' + minute + ':' + second

    $('#td_tanggal').html(dateTime)

    $('input[name="tanggal"]').val(dateTime)
}

// membuat random string untuk no invoice
function getNoInvoice() {
    let r = Math.random().toString(36).substring(4)
    upR = 'TRX' + r.toUpperCase()
    $('#strong_no_invoice').html(upR)
    $('input[name="no_invoice"]').val(upR)
}