@extends('layouts/contentNavbarLayout')

@section('title', 'Category')

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
              <h5>Categories</h5>

              <a href="{{ route('category.create') }}" class="btn btn-primary d-flex gap-2 w-25 table-header-button">
                <i class='bx bx-plus bx-sm'></i>
                <span>New Category</span>
              </a>
            </div>


                  <div class="table-responsive text-nowrap px-4 py-4">

                     <table id="myTable"  class="table py-2">

                        <thead>
                           <th>ID</th>
                           <th>Name</th>
                           <th>Created On</th>
                           <th>Action</th>
                        </thead>

                        <tbody class="tbody">

                           @foreach ($categories as $category)
                              <tr>
                                 <td>{{ $category->id }}</td>
                                 <td>{{ $category->name }}</td>
                                 <td>{{ $category->created_at }}</td>

                                 <td class="supplier-table-action">

                                    <div class="dropdown">

                                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>

                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('category.edit', $category->id) }}">
                                          <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>

                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
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



{{-- modell --}}
{{--
<div class="modal">

   <div>
      <form method="POST" id="deleteModel" >
         @csrf
         @method('DELETE')

         <div class="modal-content">
            <span class="close-button">×</span>
            <p class="modal-content-body-test">Please Confirm that you want to Delete Selected Supplier</p>

            <div class="model-buttons-container">
               <div class="model-buttons-wrapper">
                  <button class="Confirm-button close-model-btn">Close</button>
                  <button type="submit" class="Confirm-button" >Confirm</button>
               </div>
            </div>

         </div>

      </form>
   </div>

</div> --}}


@endsection


@section('scripts')

       <script>
         $(document).ready( function () {
            $('#myTable').DataTable();

            // $('.delete').on('click', function(){
            //    const id = this.id;
            //    $('#deleteModel').attr('action','{{ route("supplier.destroy", "") }}' + '/' + id);
            // })

         } );
       </script>
      {{-- <script>
         const modal = document.querySelector(".modal");
         const trigger = document.querySelector(".trigger");
         const closeButton = document.querySelector(".close-button");
         const closemodelbtn = document.querySelector(".close-model-btn")

         function toggleModal() {
         modal.classList.toggle("show-modal");
         }

         function windowOnClick(event) {
         if (event.target === modal) {
               toggleModal();
         }
         }

         trigger.addEventListener("click", toggleModal);
         closeButton.addEventListener("click", toggleModal);
         closeButton.addEventListener("click", toggleModal);
         closemodelbtn.addEventListener("click", toggleModal)
         window.addEventListener("click", windowOnClick);
      </script> --}}


@endsection
