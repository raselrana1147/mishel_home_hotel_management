@extends('layouts.admin')
@section('title',config('constant.company_name').' Update Room Keeper')
@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4>Update Room Keeper</h4>
                 </div>
             </div>
         </div>
         <div class="col-lg-4">
             <div class="page-header-breadcrumb">
                 <a href="javascript:history.back();" class="btn btn-success"><i class="icofont icofont-arrow-left"></i>Go Back</a>
             </div>
         </div>
     </div>
 </div>

  <div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <!-- Basic Inputs Validation start -->
            <div class="card">
                <div class="card-header">
                    <h5>Fill Up information</h5>
                </div>
                <div class="card-block">
                    <form id="submit_form" data-action="{{ route('room_keeper.update') }}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Name <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{$data->name}}">
                                <span class="error_name" style="color: red;"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Phone <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="phone" value="{{$data->phone}}">
                                <span class="error_phone" style="color: red;"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Charge <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="charge" value="{{$data->charge}}">
                                <span class="error_charge" style="color: red;"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Avatar <i class="icofont icofont-info-circle" title="Optional"></i></label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="avatar">
                                
                            </div>
                        </div>

                     
                        
                        <div class="form-group row">
                            <label class="col-sm-2"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary m-b-0 submit_button">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
           
        </div>
    </div>
</div>

@endsection

@section('extra_js')
    <script>
      $(document).ready(function(){
                
          $('body').on('submit','#submit_form',function(e){
          
                 e.preventDefault();
                 let formDta = new FormData(this);
                 $(".submit_button").html("Processing...").prop('disabled', true)
                    $.ajax({
                      url: $(this).attr('data-action'),
                      method: "POST",
                      data: formDta,
                      cache: false,
                      contentType: false,
                      processData: false,
                      success:function(data){
                          sweet(data.message,'success')
                          $(".submit_button").text("Save Change").prop('disabled', false)
                          $('.message_section').html('').hide();
                      },

                      error:function(response)
                      {
                         if (response.status === 422) 
                         {
                              if (response.responseJSON.errors.hasOwnProperty('name')) {
                                   $('.error_name').html(response.responseJSON.errors.name)      
                               }else{
                                   $('.error_name').html('') 
                               }
                                 
                              $(".submit_button").text("Save Change").prop('disabled', false)
                         }
                      }
                    });
              });
         

      })
  </script>
@endsection
