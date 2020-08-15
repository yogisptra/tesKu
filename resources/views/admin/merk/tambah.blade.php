@extends('layouts.master')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Merk</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form id="addform_merk" role="form" action="{{route('merk.store')}}" method="POST">

            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="">
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button id="save_merk" type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection