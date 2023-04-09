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

        <form action="{{ isset($featured) ? route('featured.update', ['featured' => $featured->id]) : route('featured.store') }}" method="POST">
            @csrf
            @if (isset($featured))
              @method('put')
            @endif

            <div class="row">
                <div class="d-flex mb-1" style="justify-content: space-between">
                    <div class="form-floating col-md-5">
                        <input type="text" name="icon" class="form-control" id="floatingPassword" placeholder="Password" value="{{ isset($featured) ? $featured->icon : null }}">
                        <label for="floatingPassword">ICON</label>
                    </div>
                    <div class="form-floating col-md-6">
                        <input type="text" name="title" class="form-control" id="floatingPassword" placeholder="Password" value="{{ isset($featured) ? $featured->title : null }}">
                        <label for="floatingPassword">TITLE</label>
                    </div>
                </div>
            </div>

            <div class="form-floating mb-1">
                <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;">{{ isset($featured) ? $featured->description : null }}</textarea>
                <label for="floatingTextarea">DESCRIPTION</label>
            </div>
            <button class="btn {{ isset($featured) ? "btn-success": "btn-primary" }}   w-100">{{ isset($featured) ? "UPDATE": "STORE" }}</button>
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

            @foreach ($featureds as $key=>$item)
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

                        <a class="btn btn-primary" href={{ route('featured.edit', ['featured'=>$item->id]) }}>EDIT</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
      </table>
      <!-- End Table with hoverable rows -->

    </div>
  </div>


@endsection
