@extends('layouts/contentNavbarLayout')

@section('title', 'Products')


@section('styles')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

  <style>
    .tbody tr td{
      height: 40px !important;
    }

    @media screen and (max-width: 580px){
      .table-header{
        position: relative;
      }

      .table-header-button span{
        display: none;
      }
    }

  </style>

@endsection

@section('page-script')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    <script>
      $(document).ready( function () {
         $('#myTable').DataTable({
             "responsive": true,
         });

      } );
    </script>

@endsection


@section('content')


  <div class="content-wrapper">


    <div class="container-xxl flex-grow-1 container-p-y">

      <div class="row d-flex justify-content-around">

        <!-- Total Products -->
        <div class="col-xl-2 col-md-4 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="badge p-2 bg-label-danger mb-2 rounded">
                <i class="ti ti-building-store ti-md"></i>
              </div>
              <h5 class="card-title mb-1 pt-2">Products</h5>
              <p class="mb-2 mt-1">{{ $totalProducts }}</p>
            </div>
          </div>
        </div>

        <!-- Total Sales -->
        <div class="col-xl-2 col-md-4 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="badge p-2 bg-label-info mb-2 rounded">
                <i class="ti ti-category-2 ti-md"></i>
              </div>
              <h5 class="card-title mb-1 pt-2">Categories</h5>
              <p class="mb-2 mt-1">{{ $totatCategories }}</p>
            </div>
          </div>
        </div>

        <div class="col-xl-2 col-md-4 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="badge p-2 bg-label-info mb-2 rounded">
                <i class="ti ti-brand-airtable ti-md"></i>
              </div>
              <h5 class="card-title mb-1 pt-2">Brands</h5>
              <p class="mb-2 mt-1">{{ $totalBrands }}</p>
            </div>
          </div>
        </div>


      </div>

    </div>


    <div class="card">

      <div class="card-header d-flex justify-content-between align-items-center table-header">
        <h5>Products</h5>

        <a href="{{ route('product.create') }}" class="btn btn-primary d-flex gap-2 w-25 table-header-button">
          <i class='bx bx-plus bx-sm'></i>
          <span>New Product</span>
        </a>
      </div>

                  <div class="table-responsive text-nowrap px-4 py-4">

                     <table id="myTable" class="table py-2">

                        <thead>
                           <th>ID</th>
                           <th>Name</th>
                           <th>Category</th>
                           <th>Supplier</th>
                           <th>Brand</th>
                           <th>Price</th>
                           <th>Created On</th>
                           <th>Action</th>
                        </thead>

                        <tbody class="tbody">

                           @foreach ($products  as $product)
                              <tr>
                                 <td>{{ $product->id }}</td>
                                 <td>{{ $product->name }}</td>
                                 <td>{{ $product->category_type }}</td>
                                 <td>{{ $product->supplier_name }}</td>
                                 <td>{{ $product->brand_name }}</td>
                                 <td>{{ $product->price }} <span class="text-success">({{ $product->unit }})*</span></td>
                                 <td>{{ $product->created_at }}</td>

                                 <td class="supplier-table-action">

                                    <div class="dropdown">

                                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>

                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('product.edit', $product->id) }}">
                                          <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>

                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                          <button class="dropdown-item" type="submit"><i class="bx bx-trash me-1"></i> Delete</button>
                                        </form>
                                      </div>

                                    </div>

                                 </td>

                              </tr>
                           @endforeach

                        </tbody>

                     </table>

                  </div>

    </div>

  </div>

@endsection



