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
        $('#pinjam_muncul').val(obj.pinjam_muncul);
        $('#kembali').val(obj.kembali);
        $('#kembali_muncul').val(obj.kembali_muncul);
        $('#kembali_str').val(obj.kembali_str);
    });
}

$('#hitung').on('click', function(){
    var kembali   = $('#today').val();
    var tgl_kembali_str =  $('#kembali_str').val();
    var hariLewat = (kembali - tgl_kembali_str) / 86400;
    
    if(tgl_kembali_str !== '' && hariLewat >= 1){
        document.kembali.denda.value = hariLewat * 500 ;
        //console.log(denda);
    }else{
        document.kembali.denda.value = hariLewat * 0 ;
        //console.log(denda);
    }
});




    



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