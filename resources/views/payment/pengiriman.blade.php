@extends('template.home_template')  
@section('home')

    @include('template.navigasi')
    
<div class="container">
    <form action="/pengiriman" method="GET">
        @csrf
        <label for="">Provinsi Asal</label>
        <select class="form-control" name="province_origin" id="">
            <option value="">--Provinsi--</option>
            @foreach ($provinces as $province)
                <option value="{{ $province->id }}">{{ $province->province }}</option>
            @endforeach
        </select>

        <label for="">Kabupaten Asal</label>
        <select class="form-control" name="origin" id="">
            <option value="">--Kota--</option>
        </select>

        <label for="">Provinsi Tujuan</label>
        <select class="form-control" name="province_destination" id="">
            <option value="">--Provinsi--</option>
            @foreach ($provinces as $province )
                 <option value="{{ $province->id }}">{{ $province->province }}</option>
            @endforeach
        </select>

        <label for="">Kabupaten Tujuan</label>
        <select class="form-control" name="destination" id="">
            <option value="">--Kota--</option>
        </select>

        <label for="">Kurir</label>
        <select class="form-control" name="courier" id="">
            <option value="jne">jne</option>
            {{-- @foreach ($couriers as $courier => $value)
                <option value="{{ $courier }}">{{ $value }}</option>
            @endforeach --}}
        </select>

        <label for="">Berat</label>
        <input type="number" name="weight" value="1000">
        <button type="submit" class="btn btn-primary">submit</button>

    </form>
</div>
@if ($cekongkir)
    
<div class="container">
    <table>
        <tr>
            <td>Service</td>
            <td>Deskripsi</td>
            <td>Biaya</td>
            <td>Estimasi</td>
            <td>Note</td>
        </tr>
        {{ $cekongkir }}
        {{-- @foreach ($cekongkir as $result)
        <tr>
            <td>{{ $result['service'] }}</td>
            <td> {{ $result['description'] }}</td>
            <td>{{ $result['cost'][0]['value'] }}</td>
            <td>{{ $result['cost'][0]['etd'] }}</td>
            <td>{{ $result['cost'][0]['note'] }}</td>
        </tr>
        @endforeach --}}
    </table>
    @else
    
    @endif
    
    
    
</div>



    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select[name="province_origin"]').on('change',function(){
                let province_id = $(this).val();
                if(province_id){
                    jQuery.ajax({
                        url:'/province/'+province_id+'/cities',
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            $('select[name="origin"]').empty();
                            $.each(data,function(key, value){
                                $('select[name="origin"]').append('<option value="'+key+'">'+value+'</option>');
                            });
                        }
                    });
                } else{
                    $('select[name="origin"]').empty();
                }
            });

            $('select[name="province_destination"]').on('change',function(){
                let province_id = $(this).val();
                if(province_id){
                    jQuery.ajax({
                        url:'/province/'+province_id+'/cities',
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            $('select[name="destination"]').empty();
                            $.each(data,function(key, value){
                                $('select[name="destination"]').append('<option value="'+key+'">'+value+'</option>');
                            });
                        }
                    });
                } else{
                    $('select[name="destination"]').empty();
                }
            });
        });
    </script>



    {{--<div class="container bg-white my-4">
        @foreach ($transaksis as $item)
        {{ $item->$cart->product->product_name }}
        {{ $item->$cart->jumlah }}
        {{ $item->subtotal }}
        {{ $item->total }}
            
        @endforeach
    </div> --}}
@endsection