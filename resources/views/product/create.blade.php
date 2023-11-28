@extends('layouts/contentNavbarLayout')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

  <h4 class="fw-bold py-3 mb-4">
    <a class="btn btn-primary d-flex gap-2 w-auto" style="max-width: 200px" href="{{ route('product.index') }}">View All</a>
  </h4>

  <div class="row d-flex align-items-center justify-content-center">
    <div class="col-md-6">
      <div class="card mb-4">

        <h5 class="card-header">Create Product</h5>

            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                    <div>
                          <label for="name"  class="form-label" >Name *</label>
                          <input type="text" required="required" id="name" name="name" class="form-control form-control-lg" placeholder="name *">
                        @error('name')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-2 mb-3 py-1">
                        <label for="customer_type" class="form-label">Select Category</label>
                        <select name="category_type" id="category_type" class="form-select form-select-lg">
                          <option value="" disabled selected>Choose Category</option>
                          @foreach ($categories as $category)
                            <option style="cursor: pointer;" value="{{ $category->name }}">{{ $category->name }}</option>
                          @endforeach
                        </select>

                        @error('category_type')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-2 mb-3 py-1">
                        <label for="brand_name" class="form-label">Select Brand</label>
                        <select name="brand_name" id="brand_name" class="form-select form-select-lg">
                            <option value="" disabled selected>Choose Brand</option>
                            @foreach ($brands as $brand)
                              <option style="cursor: pointer;" value="{{ $brand->name }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>

                        @error('brand_name')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-2 mb-3 py-1">
                          <label for="supplier_name" class="form-label">Select Supplier</label>
                          <select name="supplier_name" id="supplier_name" class="form-select form-select-lg">
                            <option value="" disabled selected>Choose Supplier</option>
                            @foreach ($suppliers as $supplier)
                              <option style="cursor: pointer;" value="{{ $supplier->supplier_name }}">{{ $supplier->supplier_name }}</option>
                            @endforeach
                          </select>

                        @error('supplier_name')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-2 mb-3 py-1">
                          <label for="Unit" class="form-label">Select Unit</label>
                            <select name="unit" id="unit" class="form-select form-select-lg">
                              <option value="" disabled selected>Choose Unit</option>
                            @foreach ($units as $unit)
                              <option style="cursor: pointer;" value="{{ $unit->name }}">{{ $unit->name }}</option>
                            @endforeach
                          </select>

                        @error('unit')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="price"  class="form-label" >Price *</label>
                        <input type="text" required="required" id="price" name="price" class="form-control form-control-lg" placeholder="Price *">
                        @error('price')
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
