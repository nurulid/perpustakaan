$('#hitung').on('click', function(){
    var kembali   = $('#today').val();
    var tgl_kembali_str =  $('#kembali_str').val();
    var hariLewat = (kembali - tgl_kembali_str) / 86400;
    
    if(hariLewat >= 1){
        document.kembali.denda.value = hariLewat * 500 ;
        //console.log(denda);
    }else{
        document.kembali.denda.value = hariLewat * 0 ;
        //console.log(denda);
    }
    
});