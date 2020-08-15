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
          <form role="form" action="{{route('merk.update', $merk)}}" method="POST">

          	@csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$merk->name}}">
              </div>
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