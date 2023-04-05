@extends('admin.layouts.index')

@section('contents')


<div class="pagetitle">
  <h1>Featured Page</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">admin</a></li>
      <li class="breadcrumb-item active">Featured</li>
    </ol>
  </nav>
</div>
@include('common.alert')

<div class="row mb-2">
  <div class="col-md-12">

        <form action="{{ route('featured.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="d-flex mb-1" style="justify-content: space-between">
                    <div class="form-floating col-md-5">
                        <input type="text" name="icon" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">ICON</label>
                    </div>
                    <div class="form-floating col-md-6">
                        <input type="text" name="title" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">TITLE</label>
                    </div>
                </div>
            </div>

            <div class="form-floating mb-1">
                <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;"></textarea>
                <label for="floatingTextarea">DESCRIPTION</label>
            </div>
            <button class="btn btn-primary  w-100">SAVE</button>
        </form>

    </div>
  </div>


  <div class="card">
    <div class="card-body">
      <!-- Table with hoverable rows -->
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Icon</th>
            <th scope="col">title</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($featured as $key=>$item)
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $item->icon }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td class="d-flex">
                        <form action="{{ route('featured.destroy', ['featured' => $item->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">DELETE</button> 
                        </form>

                        <button class="btn btn-primary">EDIT</button>
                    </td>
                </tr>
            @endforeach
          
        </tbody>
      </table>
      <!-- End Table with hoverable rows -->

    </div>
  </div>


@endsection
