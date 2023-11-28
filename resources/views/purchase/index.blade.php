@extends('layouts/contentNavbarLayout')


@section('title', 'Purchase List')


@section('title', 'Supplier')

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


<div class="card">

  <div class="card-header d-flex justify-content-between align-items-center table-header">
    <h5>Purchases</h5>

    @if (isset(Auth::user()->role) && Auth::user()->role === "cashier")
      <a href="{{ url('cashier/purchase/create') }}" class="btn btn-primary d-flex gap-2 w-25 table-header-button">
        <i class='bx bx-plus bx-sm'></i>
        <span>New Purchase</span>
      </a>
    @else
      <a href="{{ route('purchase.create') }}" class="btn btn-primary d-flex gap-2 w-25 table-header-button">
        <i class='bx bx-plus bx-sm'></i>
        <span>New Purchase</span>
      </a>
    @endif

  </div>

  <div class="table-responsive text-nowrap px-4 py-4">

      <table class="table py-2" id="myTable">

        <thead>
            <th>ID</th>
            <th>Purchase No</th>
            <th>Supplier Name</th>
            <th>Total Amount</th>
            <th>Paid Amount</th>
            <th>Due Amount</th>
            <th>Created On</th>
            <th>Action</th>
        </thead>

        <tbody class="tbody">

            @foreach ($purchases  as $purchase)
              <tr>
                  <td>{{ $purchase->id }}</td>
                  <td>{{ $purchase->purchase_no }}</td>
                  <td>{{ $purchase->supplier_name }}</td>
                  <td>{{ $purchase->total_amount }}</td>
                  <td>{{ $purchase->paid_amount }}</td>
                  <td>{{ $purchase->due_amount }}</td>
                  <td>{{ $purchase->created_at }}</td>

                  <td>

                    <div class="dropdown">

                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>

                      <div class="dropdown-menu">

                        @if (isset(Auth::user()->role) && Auth::user()->role === "cashier")
                          <a class="dropdown-item" href="{{ url('cashier/purchase/'. $purchase->id) }}">
                            <i class="bx bx-show me-1"></i> Show
                          </a>
                        @else
                          <a class="dropdown-item" href="{{ route('purchase.show', $purchase->id) }}">
                            <i class="bx bx-show me-1"></i> Show
                          </a>
                        @endif

                        <a class="dropdown-item" href="{{ route('purchase.edit', $purchase->id) }}"">
                          <i class="bx bx-edit-alt me-1"></i> Edit
                        </a>

                        <form action="{{ route('purchase.destroy', $purchase->id) }}" method="POST">
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





@endsection



{{-- <div class="customise-btn-inside-table">
  @if (isset(Auth::user()->role) && Auth::user()->role === "cashier")
      <a href="{{ url('cashier/purchase/create') }}">
          <i class='bx bx-plus bx-sm'></i>
          Add New Purchase
      </a>
  @else
      <a href="{{ route('purchase.create') }}">
          <i class='bx bx-plus bx-sm'></i>
          Add New Purchase
      </a>
  @endif
</div> --}}



{{-- @if (isset(Auth::user()->role) && Auth::user()->role === "cashier")
<a href="{{ url('cashier/purchase/'. $purchase->id) }}">
    <i class='bx bx-show bx-sm'></i>
</a>
@else
<a href="{{ route('purchase.show', $purchase->id) }}">
    <i class='bx bx-show bx-sm'></i>
</a>
@endif --}}
