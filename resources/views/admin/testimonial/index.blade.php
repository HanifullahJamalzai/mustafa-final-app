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
        <div class="d-flex" style="justify-content: space-between; align-items: center; align-content: space-between; ">
            <h5 class="card-title">Table with hoverable rows</h5>
            <a class="btn btn-primary" href="{{ route('testimonial.create') }}">Create New Testimonial</a>
        </div>

      <!-- Table with hoverable rows -->
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Position</th>
            <th scope="col">Age</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($testimonials as $key=>$item)
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <th scope="row">
                        <img src="{{ $item->photo }}" alt="" width="50px">
                    </th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->designation }}</td>
                    <td>{{ $item->description }}</td>
                    <td class="d-flex">
                        <form action="{{ route('testimonial.destroy', ['testimonial'=> $item->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        |EDIT</td>
                </tr>
            @endforeach

        </tbody>
      </table>
      <!-- End Table with hoverable rows -->

    </div>
  </div>

@endsection
