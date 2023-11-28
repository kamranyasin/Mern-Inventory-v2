@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Category')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

  <h4 class="fw-bold py-3 mb-4">
    <a class="btn btn-primary d-flex gap-2 w-auto" style="max-width: 200px" href="{{ route('category.index') }}"">View All</a>
  </h4>

  <div class="row d-flex align-items-center justify-content-center">
    <div class="col-md-6">
      <div class="card mb-4">

        <h5 class="card-header">Edit Category</h5>

            <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data" >

                @csrf
                @method('PUT')

                <div class="card-body">

                    <div>
                        <label for="name"  class="form-label" >Name *</label>
                        <input type="text" required="required" id="name" name="name" value="{{ $category->name }}" class="form-control form-control-lg">
                        @error('name')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <button class="btn btn-primary d-grid w-100 mt-4" type="submit">Update</button>

                </div>

            </form>

           </div>

        </div>

    </div>
</div>

@endsection
