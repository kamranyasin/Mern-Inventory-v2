@extends('layouts/contentNavbarLayout')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

  <h4 class="fw-bold py-3 mb-4">
    <a class="btn btn-primary d-flex gap-2 w-auto" style="max-width: 200px" href="{{ route('product.index') }}">View All</a>
  </h4>

  <div class="row d-flex align-items-center justify-content-center">
    <div class="col-md-6">
      <div class="card mb-4">

        <h5 class="card-header">Edit Product</h5>

            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="card-body">

                    <div>
                        <label for="name"  class="form-label" >Name *</label>
                        <input type="text" required="required" id="name" name="name" value="{{ $product->name }}" class="form-control form-control-lg">

                        @error('name')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="mt-2 mb-3 py-1">
                        <label for="customer_type" class="form-label">Select Category</label>
                        <select name="category_type" id="category_type" value="{{ $product->category_type }}" class="form-select form-select-lg">
                          @foreach ($categories as $category)
                            @if ($category->name == $product->category_type)
                              <option selected value="{{ $category->name }}">{{ $category->name }}</option>
                            @endif
                              <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach

                        </select>

                        @error('customer_city')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="mt-2 mb-3 py-1">
                      <label for="brand_name" class="form-label">Select Brand</label>
                      <select name="brand_name" id="brand_name" value="{{ $product->brand_name }}" class="form-select form-select-lg">
                        @foreach ($brands as $brand)
                          @if ($brand->name == $product->brand_name)
                            <option selected value="{{ $brand->name }}">{{ $brand->name }}</option>
                          @endif
                            <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                          @endforeach
                      </select>

                        @error('brand->name')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>



                    <div class="mt-2 mb-3 py-1">
                      <label for="supplier_name" class="form-label">Select Supplier</label>
                      <select name="supplier_name" id="supplier_name" value="{{ $product->supplier_name }}" class="form-select form-select-lg">
                        @foreach ($suppliers as $supplier)
                          @if ($supplier->supplier_name == $product->supplier_name)
                            <option selected value="{{ $supplier->supplier_name }}">{{ $supplier->supplier_name }}</option>
                          @endif
                            <option value="{{ $supplier->supplier_name }}">{{ $supplier->supplier_name }}</option>
                        @endforeach
                      </select>

                        @error('supplier_name')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-2 mb-3 py-1">
                      <label for="Unit" class="form-label">Select Unit</label>
                      <select name="unit" id="unit" value="{{ $product->unit }}" class="form-select form-select-lg">
                        @foreach ($units as $unit)
                          @if ($unit->name == $product->unit)
                            <option selected value="{{ $unit->name }}">{{$unit->name }}</option>
                          @endif
                            <option value="{{ $unit->name }}">{{ $unit->name }}</option>
                        @endforeach
                      </select>

                        @error('supplier_name')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>


                    <div>
                        <label for="price"  class="form-label" >Price *</label>
                        <input type="text" required="required" id="price" name="price" value="{{ $product->price }}" class="form-control form-control-lg">

                        @error('price')
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
