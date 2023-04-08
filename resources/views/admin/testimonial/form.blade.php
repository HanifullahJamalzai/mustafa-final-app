@extends('admin.layouts.index')

@section('contents')


<div class="pagetitle">
  <h1>Testimonial Page</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">admin</a></li>
      <li class="breadcrumb-item active">Testimonial</li>
    </ol>
  </nav>
</div>
@include('common.alert')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Table with hoverable rows</h5>
        <p class="text-danger">Validation is HomeWork</p>
        <form class="row g-3" action="{{ route("testimonial.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="inputName5" class="form-label">Your Name</label>
                <input type="text" name="name" class="form-control" id="inputName5">
            </div>
            <div class="col-md-6">
                <label for="inputEmail5" class="form-label">Designation</label>
                <input type="text" name="designation" class="form-control" id="inputEmail5">
            </div>
            
            <div class="col-md-12">
                <label for="inputEmail5" class="form-label">Profile Photo</label>
                <input type="file" name="photo" class="form-control" id="inputEmail5">
            </div>
            
            <div class="col-md-12">
                <label for="inputEmail5" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="inputEmail5"></textarea>
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
  </div>

@endsection
