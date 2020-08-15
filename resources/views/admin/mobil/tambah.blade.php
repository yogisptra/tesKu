@extends('layouts.master')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Mobil</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form id="addform" role="form" action="{{route('mobil.store')}}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" required="name" name="name" placeholder="Enter Name">
                  @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
               <div class="form-group">
                <label>--Select Merk--</label>
                <select class="form-control @error('merk_id') is-invalid @enderror" name="merk_id">
                  <option>-- Pilih --</option>
                  @foreach ($merks as $merk)
                  <option value="{{($merk->id)}}">{{$merk->name}}</option>
                  @error('merk_id')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="filename">Gambar</label>
                <input type="file" class="form-control" id="filename" name="filename">
              </div>
              <div class="form-group">
                <label for="Warna">Warna</label>
                  <div class="radio">
                    <label class="radio-inline"><input type="radio" name="warna" id="warna" value="Merah"  
                      {{ old('warna') == "Merah" ? 'checked' : ''}} >Merah</label>
                    <label class="radio-inline"><input type="radio" name="warna" id="warna" value="Putih"  
                      {{ old('warna') == "Putih" ? 'checked' : ''}}>Putih</label>
                    <label class="radio-inline"><input type="radio" name="warna" id="warna" value="Hitam"
                      {{ old('warna') == "Hitam" ? 'checked' : ''}}>Hitam</label>
                  </div>
              </div>
              <div class="form-group"> 
                <label>Plat</label>
                    <textarea class="textarea @error('plat') is-invalid @enderror" placeholder="Place some text here" name="plat">
                  @error('plat')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                  {{ old('plat') }}
                  </textarea>
              </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button id="save_mobil" type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection