$(document).ready(function(){
    //ini ketika provinsi tujuan di klik maka akan eksekusi perintah yg kita mau
    //name select nama nya "provinve_id" kalian bisa sesuaikan dengan form select kalian
    $('select[name="province_id"]').on('change', function(){
        $.session.clear();

        // need to empty ongkir & total
        // $("#ongkos_kirim").val(" ");
        // $("#total_keseluruhan").val(" ");

        // membuat variable namaprovinsiku untyk mendapatkan atribut nama provinsi
        var namaprovinsiku = $("#province_id option:selected").attr("namaprovinsi");
        // menampilkan hasil nama provinsi ke input id nama_provinsi
        $("#nama_provinsi").val(namaprovinsiku);
        // kita buat variable provincedid untk menampung data id select province

        $.session.set('ss_province', namaprovinsiku);
        console.log("ini ses province", $.session.get('ss_province'))

        sessionStorage.setItem('id','dfd');
        // var obj = {};
        // obj= sessionStorage.getItem('id');
        // console.log("ini obj: ", obj);
        // $("#hss_province").val(obj);

        //memberikan action ketika select name kota_id di select
        //memberikan action ketika select name kota_id di select
        $('select[name="kota_id"]').on('change', function(){
            // console.log("ini kota: ", $("#kota_id option:selected"));
            // membuat variable namakotaku untuk mendapatkan atribut nama kota
            var namakotaku = $("#kota_id option:selected").attr("namakota");
            // menampilkan hasil nama provinsi ke input id nama_provinsi
            $("#nama_kota").val(namakotaku);
            $.session.set('ss_city', namakotaku);
            console.log("ini ses city", $.session.get('ss_city'))
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

        // need to empty ongkir & total
        // $("#ongkos_kirim").val(" ");
        // $("#total_keseluruhan").val(" ");

        // kita buat variable untuk menampung data data dari  inputan
        // name city_origin di dapat dari input text name city_origin
        let origin = $("input[name=city_origin]").val();
        // name kota_id di dapat dari select text name kota_id
        let destination = $("select[name=kota_id]").val();
        // name kurir di dapat dari select text name kurir
        let courier = $("select[name=kurir]").val();

        $.session.set('ss_courier', courier);
        console.log("ini ses courier", $.session.get('ss_courier'))

        // name weight di dapat dari select text name weight
        let weight = $("input[name=weight]").val();
        weight = weight.replace('.','');

        $.session.set('ss_weight', weight);
        console.log("ini ses weight", $.session.get('ss_weight'))

        // console.log("ini :", weight);
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

        $.session.set('ss_service', strarray[0]);
        console.log("ini ses service", $.session.get('ss_service'))
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
        // console.log("ini totalbelanjaf1", totalbelanjaf1);

        $.session.set('ss_subtotal', totalbelanjaf1);
        console.log("ini ses subtotal", $.session.get('ss_subtotal'))

        // var harga_ongkir = $("#layanan option:selected").attr("harga_ongkir");
        var harga_ongkir = ongkir_selected;

        // menampilkan hasil nama harga ongkir dari select layanan yg kita pilih

        var harga_ongkir_format = parseInt(harga_ongkir).toLocaleString('id-ID', {
            currency: 'IDR',
            style: 'currency',
            minimumFractionDigits: 2
          });

        // console.log("ini: ", harga_ongkir_format);

        if (isNaN(ongkir_selected)) {
            harga_ongkir_format="";
        }

        $("#ongkos_kirim").val(harga_ongkir_format);

        // $("#ongkoskirim").append(harga_ongkir);
        // console.log("ini ongkir: ", totalbelanjaf1, "+" , harga_ongkir);
        // kita akan menampilkan harga ongkirnya di id ongkos kirim, jadi kalian bisa buat inputan dengan id ongkos kirim


        let total = parseInt(totalbelanjaf1) + parseInt(harga_ongkir);
        // ini untuk jumlah total nya y,, jd jumlah belanja di tambah jumlah ongkos kirim

        if (isNaN(total)) {
            total="";
        }

        $.session.set('ss_shipping_cost', harga_ongkir);
        console.log("ini ses ongkir", $.session.get('ss_shipping_cost'))

        $.session.set('ss_grandtotal', total);
        console.log("ini ses grandtotal", $.session.get('ss_grandtotal'))

        total = total.toLocaleString('id-ID', {
            currency: 'IDR',
            style: 'currency',
            minimumFractionDigits: 2
          });

        $("#total_keseluruhan").val(total);
        //kita menampilkan totalnya di id total

        //object
        var obj_province = {};
        obj_province= sessionStorage.getItem('ss_province');
        console.log("ini obj province: ", obj_province);
        $("#province_name").val(obj_province);

        var obj_city = {};
        obj_city= sessionStorage.getItem('ss_city');
        console.log("ini obj city: ", obj_city);
        $("#city_name").val(obj_city);




        // $.session.set('ss_province', province);
        // console.log("ini ses ongkir", $.session.get('ses_ongkir'))

    });

    var obj = {};
    obj= sessionStorage.getItem('id');
    console.log("ini obj: ", obj);
    $("#hss_id").val(obj);

    var obj_province = {};
    obj_province= sessionStorage.getItem('ss_province');
    console.log("ini obj province: ", obj_province);
    $("#hss_province").val(obj_province);
    $("#province1").val(obj_province);

    var obj_city = {};
    obj_city= sessionStorage.getItem('ss_city');
    console.log("ini obj city: ", obj_city);
    $("#city1").val(obj_city);

    var obj_courier = {};
    obj_courier= sessionStorage.getItem('ss_courier');
    $("#courier1").val(obj_courier);

    var obj_service = {};
    obj_service= sessionStorage.getItem('ss_service');
    $("#service1").val(obj_service);

    var obj_subtotal = {};
    obj_subtotal= sessionStorage.getItem('ss_subtotal');
    $("#subtotal1").val(obj_subtotal);

    var obj_weight = {};
    obj_weight= sessionStorage.getItem('ss_weight');
    $("#weight_total1").val(obj_weight);

    var obj_shipping_cost = {};
    obj_shipping_cost= sessionStorage.getItem('ss_shipping_cost');
    $("#shipping_cost1").val(obj_shipping_cost);

    var obj_grandtotal = {};
    obj_grandtotal= sessionStorage.getItem('ss_grandtotal');
    // obj_grandtotal = num.toLocaleString("id-ID", {style:"currency", currency:"IDR"});
    obj_grandtotal= Number(obj_grandtotal).toLocaleString("id-ID", {style:"currency", currency:"IDR"});
    $("#grandtotal1").val(obj_grandtotal);



});



// http://localhost:8000/origin=152&destination=151&weight=100&courier=jne
