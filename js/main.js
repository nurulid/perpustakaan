$(".nav li").on("click", function(){
    $(".nav li").removeClass("active");
    $(this).addClass("active");
});


function isi_nama(){
    var nis = $("#nis").val();
    $.ajax({
        url: 'proses-nama.php',
        data:"nis="+nis ,
    }).done(function (data) {
        var json = data,
        obj = JSON.parse(json);
        $('#nama').val(obj.nama_sis);
    });
}

function isi_judul(){
    var id = $("#id_buku").val();
    $.ajax({
        url: 'proses-judul.php',
        data:"id="+id ,
    }).done(function (data) {
        var json = data,
        obj = JSON.parse(json);
        $('#judul').val(obj.judul);
    });
}
