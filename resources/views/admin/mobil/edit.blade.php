@extends('layouts.master')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Category</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="{{route('mobil.update', $mobil)}}" method="POST" enctype="multipart/form-data">

          	@csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $mobil->name }}" required="name" name="name" placeholder="Enter Name">
                  @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
               <div class="form-group">
                <label>--Select Merk--</label>
                <select class="form-control" name="merk_id">
                   @foreach($merks as $merk)
                   <li></li>
                    <option value="{{$merk->id}}" {{$mobil->merk_id == $merk->id ? 'selected' : ""}} >{{$merk->name}}
                    </option>
                   @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="filename">Gambar</label>
                <img src ="{{asset('asset/images/mobil/'. $mobil->filename)}}" class="img-thumbnail" width="75">
                <br>
                <input type="file" id="filename" name="filename">
              </div>
              <div class="form-group">
                <label for="Warna">Warna</label>
                  <div class="radio">
                    <label class="radio-inline"><input type="radio" name="warna" id="warna" value="Merah" {{ $mobil->warna == 'Merah' ? 'checked' : ''}}>Merah</label>
                    <label class="radio-inline"><input type="radio" name="warna" id="warna" value="Putih" {{ $mobil->warna == 'Putih' ? 'checked' : ''}}>Putih</label>
                    <label class="radio-inline"><input type="radio" name="warna" id="warna" value="Hitam" {{ $mobil->warna == 'Hitam' ? 'checked' : ''}}>Hitam</label>
                  </div>
              </div>
              <div class="form-group"> 
                <label>Plat</label>
                  <textarea class="textarea @error('plat') is-invalid @enderror" placeholder="Place some text here" name="plat"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                  {{$mobil->plat}}  
                  </textarea>
                  @error('plat')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection