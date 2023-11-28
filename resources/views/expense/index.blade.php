@extends('layouts/contentNavbarLayout')

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
        <h5>Expenses</h5>

        <a href="{{ route('expense.create') }}" class="btn btn-primary d-flex gap-2 w-25 table-header-button">
          <i class='bx bx-plus bx-sm'></i>
          <span>New Expense</span>
        </a>
      </div>

          <div class="table-responsive text-nowrap px-4 py-4">

            <table class="table py-2" id="myTable">

              <thead>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Quantity</th>
                  <th>Total Amount</th>
                  <th>Paid Amount</th>
                  <th>Due Amount</th>
                  <th>Created On</th>
                  <th>Action</th>
              </thead>

              <tbody class="tbody">

                @foreach ($expenses as $expense)
                <tr>
                  <td>{{ $expense->id }}</td>
                  <td>{{ $expense->name }}</td>
                  <td>{{ $expense->quantity }}</td>
                  <td>{{ $expense->total_amount }}</td>
                  <td>{{ $expense->paid_amount }}</td>
                  <td>{{ $expense->due_amount }}</td>
                  <td>{{ $expense->created_at }}</td>

                  <td>

                    <div class="dropdown">

                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>

                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('expense.edit', $expense->id) }}">
                          <i class="bx bx-edit-alt me-1"></i> Edit
                        </a>

                        <form action="{{ route('expense.destroy', $expense->id) }}" method="POST">
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



