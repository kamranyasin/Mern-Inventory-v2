@extends('layouts/contentNavbarLayout')

@section('title', 'Purchase')

@section('styles')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">


  <style>
    .tbody tr td{
      height: 40px !important;
    }

    .p-input-width{
        min-width: 300px !important;
      }

    .purchase-table-footer{
        min-width: 200px !important;
    }

    .submit-btn{
        position: relative;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
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

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

  <h4 class="fw-bold py-3 mb-4">
    <a class="btn btn-primary d-flex gap-2 w-auto" style="max-width: 200px" href="{{ route('purchase.index') }}">View All</a>
  </h4>

  <div class="row d-flex align-items-center justify-content-center">
    <div class="col-md-10">
      <div class="card mb-4">

        <h5 class="card-header">Create Purchase</h5>



          <form action="{{ route('purchase.store') }}" method="POST" enctype="multipart/form-data" class="source-item pt-4 px-0 px-sm-4">

              @csrf



                  <div class="card-body d-flex flex-column justify-content-center align-items-center w-auto">

                          <div class="w-50 p-input-width">
                              <label for="purchase_no"  class="form-label" >Purchase no *</label>
                              <input type="text" required="required" id="purchase_no" name="purchase_no" readonly value="{{ $purchase_no }}" class="form-control form-control-lg">

                              @error('purchase_no')
                                  <span class="create-purchase-error-message">{{$message}}</span>
                              @enderror
                          </div>


                          <div class="mt-2 mb-3 w-50 p-input-width">
                              <label for="customer_type" class="form-label">Select Supplier</label>
                              <select name="supplier_name" id="supplier_name" class="form-select form-select-lg">
                                  <option selected disabled>Choose Supplier</option>
                                @foreach ($suppliers as $supplier)
                                  <option style="cursor: pointer;" value="{{ $supplier->supplier_name }}">{{ $supplier->supplier_name }}</option>
                                @endforeach
                              </select>

                              @error('supplier_name')
                                  <span class="create-purchase-error-message">{{$message}}</span>
                              @enderror
                          </div>

                          <div class="w-50 p-input-width">
                              <label for="paid_amount"  class="form-label" >Paid Amount *</label>
                              <input type="number" required="required" id="paid_amount" name="paid_amount" class="form-control form-control-lg" placeholder="Paid Amount *">

                              @error('paid_amount')
                                  <span class="create-purchase-error-message">{{$message}}</span>
                              @enderror
                          </div>

                  </div>


                  <div class="table-responsive text-nowrap px-4 py-4">

                      <table class="table py-2 table-bordered" id="myTable">

                          <thead>
                              <th>Category</th>
                              <th>Product</th>
                              <th>Unit</th>
                              <th>Quantity</th>
                              <th>Unit Price</th>
                              <th>Total</th>
                              <th>
                                  <div onclick="cloneRow()" type="button" class="btn btn-success rounded-full btn-sm">
                                      <i class='bx bx-plus bx-sm'></i>
                                  </div>
                              </th>
                          </thead>

                          <tbody class="purchase-table-rows tbody">
                              <tr class="tr">

                                  <td>
                                      <div class="purchase-table-selection">
                                          <select class="category form-select" name="category_id[]" id="category_1">
                                              <option style="cursor: pointer;" selected disabled>Choose Category</option>
                                              @foreach ($categories as $category)
                                                  <option style="cursor: pointer;" value="{{ $category->name }}">{{ $category->name }}</option>
                                              @endforeach
                                          </select>
                                          @error('category_1')
                                              <span class="create-purchase-error-message">{{$message}}</span>
                                          @enderror
                                      </div>
                                  </td>

                                  <td>
                                      <div class="purchase-table-selection">
                                          <select name="product_id[]" id="product_1" class="product form-select" data-id="1">
                                              <option style="cursor: pointer;" selected disabled>Choose Product</option>
                                          </select>
                                          @error('product_1')
                                              <span class="create-purchase-error-message">{{$message}}</span>
                                          @enderror
                                      </div>
                                  </td>

                                  <td class="purchase-table-selection">
                                      <div>
                                          <select name="unit_id[]" id="unit_1" class="form-select">
                                              <option style="cursor: pointer;" selected disabled>Select Unit</option>
                                              @foreach ($units as $unit)
                                                  <option style="cursor: pointer;" value="{{ $unit->id }}">{{ $unit->name }}</option>
                                              @endforeach
                                          </select>
                                          @error('unit_1')
                                              <span class="create-purchase-error-message">{{$message}}</span>
                                          @enderror
                                      </div>
                                  </td>

                                  <td class="purchase-table-input-header">
                                      <div class="purchase-table-input">
                                          <input type="number" placeholder="0000" name="quantity[]" id="quantity_1" onkeyup="calculateTotal(event)" class="form-control">
                                      </div>
                                  </td>


                                  <td>
                                      <div class="purchase-table-input">
                                          <input type="number" placeholder="0000" name="unit_price[]" id="price_1" onkeyup="calculateTotal(event)" readonly class="form-control">
                                      </div>
                                  </td>

                                  <td>
                                      <div class="purchase-table-input input-all-disable" >
                                          <input type="number" class="total form-control" readonly id="total_1" placeholder="Total">
                                      </div>
                                  </td>

                                  <td>
                                      <div class="btn btn-danger rounded-full btn-sm" type="button" onclick="removeRow(event)">
                                          <i class='bx bx-x bx-sm'></i>
                                      </div>
                                  </td>


                              </tr>
                          </tbody>

                      </table>

                      <div class="purchase-table-footer py-4 w-25">
                          <label for="total"  class="form-label form-label-lg" >Amount *</label>
                          <input class="form-control form-control-lg" type="number" name="total_amount" id="total" placeholder="All Total" readonly>
                      </div>


                  </div>


                  <div class="submit-btn">
                      <button class="btn btn-primary d-grid w-75 mt-0 mb-4" type="submit">Create</button>
                  </div>


          </form>



      </div>

    </div>

  </div>

</div>

@endsection

@section('page-script')

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script>
      $(document).ready( function () {
        $('#myTable').DataTable({
            "responsive": true,
        });

      } );
    </script>

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let count = 2;

        function cloneRow(){

            const tr = `
            <tr class="tr">
              <td>
                  <div class="purchase-table-selection">
                      <select class="category form-select" name="category_id[]" id="category_${count}">
                          <option style="cursor: pointer;" selected disabled>Choose Category</option>
                          @foreach ($categories as $category)
                              <option style="cursor: pointer;" value="{{ $category->name }}">{{ $category->name }}</option>
                          @endforeach
                      </select>
                      @error('category_${count}')
                          <span class="create-purchase-error-message">{{$message}}</span>
                      @enderror
                  </div>
              </td>

              <td>
                <div class="purchase-table-selection">
                    <select name="product_id[]" id="product_${count}" class="product form-select" data-id="1">
                        <option style="cursor: pointer;" selected disabled>Choose Product</option>
                    </select>
                    @error('product_${count}')
                        <span class="create-purchase-error-message">{{$message}}</span>
                    @enderror
                </div>
              </td>

              <td class="purchase-table-selection">
                  <div>
                    <select name="unit_id[]" id="unit_${count}" class="form-select">
                        <option style="cursor: pointer;" selected disabled>Select Unit</option>
                        @foreach ($units as $unit)
                            <option style="cursor: pointer;" value="{{ $unit->id }}">{{ $unit->name }}</option>
                        @endforeach
                    </select>
                    @error('unit_${count}')
                        <span class="create-purchase-error-message">{{$message}}</span>
                    @enderror
                </div>
              </td>

              <td class="purchase-table-input-header">
                <div class="purchase-table-input">
                    <input type="number" placeholder="0000" name="quantity[]" id="quantity_${count}" onkeyup="calculateTotal(event)" class="form-control">
                </div>
              </td>


              <td>
                <div class="purchase-table-input">
                    <input type="number" placeholder="0000" name="unit_price[]" id="price_${count}" onkeyup="calculateTotal(event)" readonly class="form-control">
                </div>
              </td>

              <td>
                <div class="purchase-table-input input-all-disable" >
                    <input type="number" class="total form-control" readonly id="total_${count}" placeholder="Total">
                </div>
              </td>

              <td>
                <div class="btn btn-danger rounded-full btn-sm" type="button" onclick="removeRow(event)">
                    <i class='bx bx-x bx-sm'></i>
                </div>
              </td>

            </tr>
            `;

            $('.tbody').append(tr);
            count++;
        }

        function removeRow(event){

            let allTotal = 0;

            if($('.tr').length > 1){
                $(event.target).closest('.tr').remove();

                 $('.total').each(function(){

                    const value = parseFloat($(this).val());

                    if($(this).val() != ''){
                        allTotal += value;
                    }

                    });

                    $('#total').val(allTotal);
            }

        }

        function calculateTotal(event){

            let allTotal = 0;

            const id = $(event.target).attr('id');

            const num = id.split('_');

            const quantity = parseFloat($('#quantity_' + num[1]).val());

            const price = parseFloat($('#price_' + num[1]).val());

            const total = quantity * price;

            $('#total_' + num[1]).val(total)

            $('.total').each(function(){

                const value = parseFloat($(this).val());

                if($(this).val() != ''){
                    allTotal += value;
                }

            });

            $('#total').val(allTotal);

            console.log(allTotal);
        }

        //product price change function
        $(document).on('change', '.product', function() {
            var value = $(this).val();
            var price = $(this).find(':selected').data('price');
            var id = $(this).find(':selected').data('id');
            $('#price_'+id).val(price);

        });


        // Category Function
        $(document).on('change', '.category', function() {

            const id = $(this).val();

            const dataId = $(this).attr('id');

            const num = dataId.split('_');

            $.ajax({
                type: "get",
                url: "{{ route('product.get', '') }}" + "/" + id,
                dataType: "json",

                success: function(data){

                    let html = '<option style="cursor: pointer;" selected disabled>Choose Product</option>';

                    data.forEach(product => {

                        html += `<option style="cursor: pointer;" value="${product.name}" data-price="${product.price}" data-id="${num[1]}">${product.name}</option>`;

                    });

                    $('#product_'+num[1]).html(html);

                    console.log(data);
                }
            });

        })

    </script>

@endsection
