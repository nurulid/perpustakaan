function isi_pengembalian(){
    var id = $("#id_pinjam").val();
    $.ajax({
        url: 'proses-kembali.php',
        data:"id_pinjam="+id ,
    }).done(function (data) {
        var json = data,
        obj = JSON.parse(json);
        $('#nis').val(obj.nis);
        $('#nama').val(obj.nama);
        $('#id_buku').val(obj.id_buku);
        $('#judul').val(obj.judul);
        $('#pinjam').val(obj.pinjam);
        $('#kembali').val(obj.kembali);
        $('#kembali_str').val(obj.kembali_str);
    });
}



    



// function startCalc(){
//     interval = setInterval("denda()",1);
// }

// function denda(){
//     var kembali = $("#kembali_str").val();
//     var tglKembali = $("#tgl_kembali").val();
//     $("#denda").val() = kembali - tglKembali ;
// }

// function stopCalc(){
//     clearInterval(interval);}