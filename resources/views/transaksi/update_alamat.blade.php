@extends('template.home_template')  
@section('home')
    @include('template.navigasi')
    <div class="container">
    <label class="text-lg">Ubah Alamat Anda</label>
    <form action="{{ '/update-a/'.$alamats->id }}" method="POST">
        @csrf
    <div class="content flex justify-between">
        <div class="flex-1 p-2 m-2">
            <div class="content mb-2">
                <label for="">Alamat Lengkap</label><br>
                <textarea name="alamat" value="" class="form-control w-full px-3 py-1.5 rounded m-0 focus:text-gray-700 focus:bg-white" rows="3"placeholder="Alamat Lengkap">{{ $alamats->alamat }}</textarea>
            @error('alamat')
                <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
            </div>
        <input type="hidden" value="jne" name="courier">
        <div class="content mt-2">
            <label for="">Kode Pos</label><br>
            <input class="form-control" value="{{ $alamats->kodepos }}" type="number"  name="kodepos">
            @error('kodepos')
                <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="flex-1 p-2 m-2">
            <select hidden class="form-control" name="" id="">
                <option value="5">DI Yogyakarta</option>
        </select>
        <select  hidden class="form-control" name="origin" id="">
            <option value="39">Bantul</option>
        </select>
                <div class="content mb-2">
                <label for="">Provinsi</label>
                <select class="form-control" name="province_destination" id="">
                    <option value="{{ $alamats->province_destination }}">{{ $alamats->province_destination }}</option>
                    @foreach ($provinces as $province )
                    <option value="{{ $province->id }}">{{ $province->province }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="content mb-2">
                <label for="">Kabupaten</label>
                <select class="form-control" name="destination" id="">
                    <option value="{{ $alamats->destination}}">{{ $alamats->destination}}</option>
                </select>
            </div>
        </div>
    </div>
    <div class="content mb-2 flex justify-center">
        <button onclick="berhasil()" type="submit" class="btn btn-primary">submit</button>
    </div>
    
</form>
</div>
    


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
                                $('select[name="origin"]').append('<option value="'+value+'">'+value+'</option>');
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
                                $('select[name="destination"]').append('<option value="'+value+'">'+value+'</option>');
                            });
                        }
                    });
                } else{
                    $('select[name="destination"]').empty();
                }
            });
        });
    </script>
    <script>
function berhasil() {
  alert("Berhasil Tambah Alamat");
}
</script>
@endsection