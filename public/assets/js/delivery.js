$(document).ready(function(){




    // cost
    $('select[name="kurir"]').on('change', function(){

        // need to empty ongkir & total
        // $("#ongkos_kirim").val(" ");
        // $("#total_keseluruhan").val(" ");

        // kita buat variable untuk menampung data data dari  inputan
        // name city_origin di dapat dari input text name city_origin
        let origin = $("input[name=city_origin]").val();

        // name kota_id di dapat dari select text name kota_id
        // old logic
        // let destination = $("select[name=kota_id]").val();

        // new logic
        let destination = $("input[name=cit_id]").val();

        // name kurir di dapat dari select text name kurir
        let courier = $("select[name=kurir]").val();

        $.session.set('ss_courier', courier);
        console.log("ini ses courier", $.session.get('ss_courier'))

        // name weight di dapat dari select text name weight
        let weight = $("input[name=weight]").val();
        weight = weight.replace('.','');

        $.session.set('ss_weight', weight);
        console.log("ini ses weight", $.session.get('ss_weight'))

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


    $('select[name="layanan"]').on('change', function(){

        var strarray = $("#layanan option:selected").text().split('-');
        var ongkir_selected = strarray[strarray.length-1];

        $.session.set('ss_service', strarray[0]);
        console.log("ini ses service", $.session.get('ss_service'))

        let totalbelanjaf = $('#totalbelanja').text($('[name=totalbelanja]').val());
        let totalbelanjaf1 = totalbelanjaf.text().replace("Rp ", "").replace(",00", "").replace(".","")*1000;

        $.session.set('ss_subtotal', totalbelanjaf1);
        console.log("ini ses subtotal", $.session.get('ss_subtotal'))

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
        var obj_province = $("input[name=pro_name]").val();
        console.log("ini obj province: ", obj_province);
        $("#province_name").val(obj_province);

        var obj_city = $("input[name=cit_name]").val();
        console.log("ini obj city: ", obj_city);
        $("#city_name").val(obj_city);

        var obj_service = {};
        obj_service= sessionStorage.getItem('ss_service');
        $("#service_name").val(obj_service);

    });



});



// http://localhost:8000/origin=152&destination=151&weight=100&courier=jne
