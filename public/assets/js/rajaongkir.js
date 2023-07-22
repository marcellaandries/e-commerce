$(document).ready(function(){
    //ini ketika provinsi tujuan di klik maka akan eksekusi perintah yg kita mau
    //name select nama nya "provinve_id" kalian bisa sesuaikan dengan form select kalian
    $('select[name="province_id"]').on('change', function(){
    // kita buat variable provincedid untk menampung data id select province
    let provinceid = $(this).val();
    //kita cek jika id di dpatkan maka apa yg akan kita eksekusi
    if(provinceid){
    // jika di temukan id nya kita buat eksekusi ajax GET
    jQuery.ajax({
    // url yg di root yang kita buat tadi
    url:"/city/"+provinceid,
    // aksion GET, karena kita mau mengambil data
    type:'GET',
    // type data json
    dataType:'json',
    // jika data berhasil di dapat maka kita mau apain nih
    success:function(data){
    // jika tidak ada select dr provinsi maka select kota kososng / empty
    $('select[name="kota_id"]').empty();
    // jika ada kita looping dengan each
    $.each(data, function(key, value){
    // perhtikan dimana kita akan menampilkan data select nya, di sini saya memberi name select kota adalah kota_id
    $('select[name="kota_id"]').append('<option value="'+ value.city_id +'" namakota="'+ value.type +' ' +value.city_name+ '">' + value.type + ' ' + value.city_name + '</option>');
    });
    }
    });
    }else {
    $('select[name="kota_id"]').empty();
    }
    });
    });
