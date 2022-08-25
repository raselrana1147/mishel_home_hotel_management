@extends('layouts.admin')
@section('title',config('constant.company_name').' Room Booking List')

@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4>Room Booking List</h4>
                 </div>
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
                                 <th>Serial</th>
                                 <th>Room Name</th>
                                 <th>Total Guest</th>
                                 <th>Duration</th>
                                 <th>Date</th>
                                 <th>Guest Name</th>
                                 <th>Guest phone</th>
                                 <th>Guest Email</th>
                                 <th>Guest Address</th>
                                 <th>Status</th>
                                
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
             responsive: false,
             serverSide: true,
             ordering: false,
             pagingType: "full_numbers",
             ajax: '{{ route('booking.load') }}',
             columns: [
                 { data: 'DT_RowIndex',name:'DT_RowIndex' },
                 { data: 'room',name:'room'},
                 { data: 'num_of_guest',name:'num_of_guest'},
                 { data: 'duration',name:'duration'},
                 { data: 'date',name:'date'},
                 { data: 'guest_name',name:'guest_name'},
                 { data: 'guest_phone',name:'guest_phone'},
                 { data: 'guest_email',name:'guest_email'},
                 { data: 'guest_address',name:'guest_address'},
                 { data: 'status',name:'status'},
                 
             ],

              language : {
                   processing: 'Processing'
               },
              
         });
    </script>

    <script>
        $(document).ready(function(){
              
              $('body').on('change','.update_booking',function(){
                let item_id=$(this).attr('item_id');
                let status=$(this).val();

                $.ajax({
                  url: $(this).attr('data-action'),
                  method: "POST",
                  data: {id:item_id,status:status},
                  success:function(data)
                  {
                    sweet(data.message,'success')
                  }
                });
              })
        })
    </script>
    @endsection
