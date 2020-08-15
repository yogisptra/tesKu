@extends('layouts.master')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
	      <div class="card">
          <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
                <a href="{{route('mobil.create')}}" class="btn btn-primary float-right mb-2"><i class="fas fa-plus"></i> Mobil</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">	
            <table id="example1" class="table table-bordered table-striped text-center">
              <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Merk</th>
                <th>Warna</th>
                <th>Plat</th>
                <th>Gambar</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($mobil as $data)
                <tr>
                  <td>{{$loop -> iteration}}</td>
                  <td>{{$data -> name}}</td>
                  <td>{{$data -> merk -> name }}</td>
                  <td>{{$data -> warna}}</td>
                  <td>{{$data -> plat}}</td>
                  <td><img src ="{{asset('asset/images/mobil/'. $data->filename)}}" class="img-thumbnail" width="75" ></td>
                  <td class="py-0 align-middle">
                    <div class="btn-group btn-group-sm">
                      <a href="{{ route('mobil.edit' , $data->id)}}" class="btn btn-info"><i class="fas fa-pen"></i></a>
<!--                        <form id="form_mobil" action="{{ route('mobil.destroy' , $data->id)}}" method="POST">
                        <input name="_method" type="hidden" value="DELETE"> -->
                          @csrf
                          @method('delete')      
                        </form>                          
                        <button class="btn btn-danger" onclick="delete_mobil({{$data->id}})"><i class="fas fa-trash"></i></button>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
       </div>
    </div>
  </div>
</section>

@endsection
