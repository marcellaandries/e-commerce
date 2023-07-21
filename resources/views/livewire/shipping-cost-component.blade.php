<div class="form-group form-group--inline">
    <label for="provinsi">Provinsi Tujuan</label>
    <select name="province_id" id="province_id" class="form-control">
    <option value="">Provinsi Tujuan</option>
    @foreach ($provinsi as $row)
    <option value="{{$row['province_id']}}" namaprovinsi="{{$row['province']}}">{{$row['province']}}</option>
    @endforeach
    </select>
</div>
