@extends('layouts.master')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
                <a href="{{route('merk.create')}}" class="btn btn-primary float-right mb-2"><i class="fas fa-plus"></i> Merk</a>
          </div>

          <!-- /.card-header -->
          <div class="card-body"> 
            <table id="example1" class="table table-bordered table-striped text-center">
              <thead>
                <tr>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($merk as $data)
                <tr>
                  <td>{{$loop -> iteration}}</td>
                  <td>{{$data -> name}}</td>
                  <td class="py-0 align-middle">
                    <div class="btn-group btn-group-sm">
                     <a href="{{ route('merk.edit' , $data->id)}}" class="btn btn-info"><i class="fas fa-pen"></i></a>
                          @csrf      
                        </form>                          
                        <button class="btn btn-danger" onclick="delete_merk({{$data->id}})"><i class="fas fa-trash"></i></button>
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
