@extends('layouts.admin')
@section('title',config('constant.company_name').' Room Type List')

@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4>Room Type List</h4>
                 </div>
             </div>
         </div>
         <div class="col-lg-4">
             <div class="page-header-breadcrumb">
                 <a href="{{ route('room_type.create') }}" class="btn btn-success"><i class="icofont icofont-ui-add"></i>Add New</a>
             </div>
         </div>
     </div>
 </div>

 <div class="page-body">
     <div class="row">
         <div class="col-sm-12">
             <!-- Zero config.table start -->
             <div class="card">
                 
                 <div class="card-block">
                     <div class="dt-responsive table-responsive">
                         <table id="simpletable" class="table table-striped table-bordered nowrap">
                             <thead>
                             <tr class="set_row">
                                 <th style="max-width:5px">Serial</th>
                                 <th style="max-width:15px">Name</th>
                                 <th style="max-width:10px">Price</th>
                                 <th style="max-width:30px">Description</th>
                                 <th style="max-width:20px">Amenities</th>
                                 <th style="max-width:5px">Status</th>
                                 <th style="max-width:15px">Action</th>
                             </tr>
                             </thead>
                         </table>
                     </div>
                 </div>
             </div> 
         </div>
     </div>
 </div>

@endsection

@section('extra_js')

  <script>
         var table = $("#simpletable").DataTable({
             processing: true,
             responsive: true,
             serverSide: true,
             ordering: false,
             pagingType: "full_numbers",
             ajax: '{{ route('room_type.load') }}',
             columns: [
                 { data: 'DT_RowIndex',name:'DT_RowIndex' },
                 { data: 'name',name:'name'},
                 { data: 'price',name:'price'},
                 { data: 'description',name:'description'},
                 { data: 'amenity',name:'amenity'},
                 { data: 'status',name:'status'},
                 { data: 'action',name:'action' },
             ],

              language : {
                   processing: 'Processing'
               },
              
         });
    </script>
    <script>
        $(document).ready(function(){
              
              $('body').on('click','.delete_item',function(){
                let item_id=$(this).attr('item_id');
                Swal.fire({
                  title: 'Are you sure?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes Delete'
                }).then((result) => {
                  if (result.isConfirmed) {
                    $.ajax({
                       url:$(this).attr('data-action'),
                       method:'post',
                       data:{item_id:item_id},
                       success:function(data){
                         sweet(data.message,'success')
                          $('#simpletable').DataTable().ajax.reload();
                          
                       }

                    }); 
                  }
                })
              })
            
        })
    </script>
    @endsection
