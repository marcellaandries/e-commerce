$(document).ready(function(){
    //ini ketika provinsi tujuan di klik maka akan eksekusi perintah yg kita mau
    //name select nama nya "provinve_id" kalian bisa sesuaikan dengan form select kalian
    $('select[name="province_id"]').on('change', function(){
        // membuat variable namaprovinsiku untyk mendapatkan atribut nama provinsi
        var namaprovinsiku = $("#province_id option:selected").attr("namaprovinsi");
        // menampilkan hasil nama provinsi ke input id nama_provinsi
        $("#nama_provinsi").val(namaprovinsiku);
    // kita buat variable provincedid untk menampung data id select province

    //memberikan action ketika select name kota_id di select
    //memberikan action ketika select name kota_id di select
    $('select[name="kota_id"]').on('change', function(){
        // membuat variable namakotaku untyk mendapatkan atribut nama kota
        var namakotaku = $("#kota_id option:selected").attr("namakota");
        // menampilkan hasil nama provinsi ke input id nama_provinsi
        $("#nama_kota").val(namakotaku);
        });

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

    // cost
    $('select[name="kurir"]').on('change', function(){
        // kita buat variable untuk menampung data data dari  inputan
        // name city_origin di dapat dari input text name city_origin
        let origin = $("input[name=city_origin]").val();
        // name kota_id di dapat dari select text name kota_id
        let destination = $("select[name=kota_id]").val();
        // name kurir di dapat dari select text name kurir
        let courier = $("select[name=kurir]").val();
        // name weight di dapat dari select text name weight
        let weight = $("input[name=weight]").val();
        // alert(courier);

        // if(courier){
        // jQuery.ajax({
        // url:"/origin="+origin+"&destination="+destination+"&weight="+weight+"&courier="+courier,
        // type:'GET',
        // dataType:'json',
        // success:function(data){
        // console.log(data);
        // },
        // });
        // }
        if(courier){
            jQuery.ajax({
            url:"/origin="+origin+"&destination="+destination+"&weight="+weight+"&courier="+courier,
            type:'GET',
            dataType:'json',
            success:function(data){
            $('select[name="layanan"]').empty();
            // ini untuk looping data result nya
            $.each(data, function(key, value){
            // ini looping data layanan misal jne reg, jne oke, jne yes
            $.each(value.costs, function(key1, value1){
            // ini untuk looping cost nya masing masing
            // silahkan pelajari cara menampilkan data json agar lebi paham
            $.each(value1.cost, function(key2, value2){
            $('select[name="layanan"]').append('<option value="'+ key +'">' + value1.service + '-' + value1.description + '-' +value2.value+ '</option>');
            });
            });
            });
            }
            });
            } else {
            $('select[name="layanan"]').empty();
        }

        });

        // http://localhost:8000/origin=152&destination=151&weight=100&courier=jne
