@extends('layouts/contentNavbarLayout')

@section('title', 'Create Category')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

  <h4 class="fw-bold py-3 mb-4">
    <a class="btn btn-primary d-flex gap-2 w-auto" style="max-width: 200px" href="{{ route('category.index') }}"">View All</a>
  </h4>

  <div class="row d-flex align-items-center justify-content-center">
    <div class="col-md-6">
      <div class="card mb-4">

        <h5 class="card-header">Create Category</h5>

            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                    <div>
                        <label for="name"  class="form-label" >Name *</label>
                        <input type="text" required="required" id="name" name="name" class="form-control form-control-lg" placeholder="name *">
                        @error('name')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <button class="btn btn-primary d-grid w-100 mt-4" type="submit">Create</button>

                </div>

            </form>

           </div>

        </div>

    </div>

</div>

@endsection
