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
            // console.log("ini kota: ", $("#kota_id option:selected"));
            // membuat variable namakotaku untuk mendapatkan atribut nama kota
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
            // $('select[name="layanan"]').empty();
            // $("#layanan option:selected").text()="Choose Service";
            // ini untuk looping data result nya
            $.each(data, function(key, value){
            // ini looping data layanan misal jne reg, jne oke, jne yes
            $.each(value.costs, function(key1, value1){
                // ini untuk looping cost nya masing masing
                // silahkan pelajari cara menampilkan data json agar lebi paham
                $.each(value1.cost, function(key2, value2){
                    $('select[name="layanan"]').append('<option value="'+ key +'">' + value1.service + '-' + value1.description + '-' +value2.value+ '</option>');
                    // $('select[name="layanan"]').append('<option value="'+ key +'">' +value2.value+ '</option>');
                    // console.log("ini cost: ", value2.value);
                });
            });
            });
            }
            });
            } else {
            $('select[name="layanan"]').empty();
        }

    });

    // total bayar

    $('select[name="layanan"]').on('change', function(){

        // console.log("ini layanan: ", $("#layanan option:selected").text());

        var strarray = $("#layanan option:selected").text().split('-');
        // for (var i = 0; i < strarray.length; i++) {
        // console.log("ini layanan2: ", strarray[strarray.length-1]);
        var ongkir_selected = strarray[strarray.length-1];
        // }
        // console.log("ini layanan2: ", parseInt($("#layanan option:selected").text()));

        // let totalbelanja = $("input[name=totalbelanja]").val();

        // membuat variable totalbelanja untyk mendapatkan atribut totalbelanja kita, ini bisa kalian buat input manual dengan name totalbelanja kemudian value nya isi manual dulu
        // let totalbelanja = $("input[name=totalbelanja]").val();
        // var totbelanjaf = $('#totalbelanja').text($('[name=totalbelanja]').val());
        // var totbelanjaf1 = totbelanjaf.text().split(',');
        // console.log("ini totbelanjaf", totbelanjaf1);

        // var totbelanjaf1 = totbelanjaf.text()..split('=').join(',').split(':').join(',').split(',')
        let totalbelanjaf = $('#totalbelanja').text($('[name=totalbelanja]').val());
        let totalbelanjaf1 = totalbelanjaf.text().replace("Rp ", "").replace(",00", "").replace(".","")*1000;
        console.log("ini totalbelanjaf1", totalbelanjaf1);

        // var harga_ongkir = $("#layanan option:selected").attr("harga_ongkir");
        var harga_ongkir = ongkir_selected;

        // menampilkan hasil nama harga ongkir dari select layanan yg kita pilih

        var harga_ongkir_format = parseInt(harga_ongkir).toLocaleString('id-ID', {
            currency: 'IDR',
            style: 'currency',
            minimumFractionDigits: 2
          });

        console.log("ini: ", harga_ongkir_format);

        if (isNaN(ongkir_selected)) {
            harga_ongkir_format="";
        }

        $("#ongkos_kirim").val(harga_ongkir_format);

        // $("#ongkoskirim").append(harga_ongkir);
        console.log("ini ongkir: ", totalbelanjaf1, "+" , harga_ongkir);
        // kita akan menampilkan harga ongkirnya di id ongkos kirim, jadi kalian bisa buat inputan dengan id ongkos kirim

        let total = parseInt(totalbelanjaf1) + parseInt(harga_ongkir);
        // ini untuk jumlah total nya y,, jd jumlah belanja di tambah jumlah ongkos kirim

        if (isNaN(total)) {
            total="";
        }

        total = total.toLocaleString('id-ID', {
            currency: 'IDR',
            style: 'currency',
            minimumFractionDigits: 2
          });

        $("#total_keseluruhan").val(total);
        //kita menampilkan totalnya di id total


    });


});



// http://localhost:8000/origin=152&destination=151&weight=100&courier=jne
