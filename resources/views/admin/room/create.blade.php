@extends('layouts.admin')
@section('title',config('constant.company_name').' Create Room')
@section('extra_css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection
@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4>Create Room</h4>
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
                    <form id="submit_form" data-action="{{ route('room.store') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Room title <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" placeholder="Room title">
                                <span class="error_title" style="color: red;"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Room Type <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                               <select class="form-control" name="room_type_id">
                                <option value="">Select Room Type</option>
                                 @foreach ($room_types as $room_type)
                                     <option value="{{$room_type->id}}">{{$room_type->name}}</option>
                                 @endforeach
                               </select>
                                <span class="error_room_type" style="color: red;"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Floor <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                               <select class="form-control" name="floor_id">
                                <option value="">Select Floor</option>
                                 @foreach ($floors as $floor)
                                     <option value="{{$floor->id}}">{{$floor->floor_name}}</option>
                                 @endforeach
                               </select>
                                <span class="error_floor" style="color: red;"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Room Keeper <i class="icofont icofont-info-circle" title="Optional"></i></label>
                            <div class="col-sm-10">
                               <select class="form-control" name="room_keeper_id">
                                <option value="">Select Room Keeper</option>
                                 @foreach ($room_keepers as $room_keeper)
                                     <option value="{{$room_keeper->id}}">{{$room_keeper->name}}</option>
                                 @endforeach
                               </select>
                                <span class="error_room_keeper" style="color: red;"></span>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-4 col-lg-2 col-form-label">Room Number <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-8 col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icofont icofont-ui-rotation generat_number"></i></span>
                                    <input type="text" class="form-control" placeholder="Room Number" name="room_number" id="room_number">
                                </div>
                                <span class="error_room_number" style="color: red;"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Max Capacity <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="max_capacity" placeholder="Max capacity">
                                <span class="error_max_capacity" style="color: red;"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Number Of Beds <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="num_of_bed" placeholder="Number of beds">
                                <span class="error_num_of_bed" style="color: red;"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Image <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image">
                                <span class="error_image" style="color: red;"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Description <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                                <textarea name="description" class="summernote"></textarea>
                                <span class="error_description" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary m-b-0 submit_button">Add  New</button>
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
   
   <script src="{{ asset('assets/backend/style/js/summernote.js') }}"></script>

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
                          $("#submit_form")[0].reset();
                          $(".submit_button").text("Submit").prop('disabled', false)
                          $('.message_section').html('').hide();
                      },

                      error:function(response)
                      {
                         if (response.status === 422) 
                         {
                              if (response.responseJSON.errors.hasOwnProperty('title')) {
                                   $('.error_title').html(response.responseJSON.errors.title)      
                               }else{
                                   $('.error_title').html('') 
                               }

                               if (response.responseJSON.errors.hasOwnProperty('room_type_id')) {
                                    $('.error_room_type').html(response.responseJSON.errors.room_type_id)      
                                }else{
                                    $('.error_room_type').html('') 
                                }

                                if (response.responseJSON.errors.hasOwnProperty('floor_id')) {
                                     $('.error_floor').html(response.responseJSON.errors.floor_id)      
                                 }else{
                                     $('.error_floor').html('') 
                                 }

                                 if (response.responseJSON.errors.hasOwnProperty('room_number')) {
                                     $('.error_room_number').html(response.responseJSON.errors.room_number)      
                                 }else{
                                     $('.error_room_number').html('') 
                                 }

                                 if (response.responseJSON.errors.hasOwnProperty('max_capacity')) {
                                     $('.error_max_capacity').html(response.responseJSON.errors.max_capacity)      
                                 }else{
                                     $('.error_max_capacity').html('') 
                                 }

                                 if (response.responseJSON.errors.hasOwnProperty('num_of_bed')) {
                                     $('.error_num_of_bed').html(response.responseJSON.errors.num_of_bed)      
                                 }else{
                                     $('.error_num_of_bed').html('') 
                                 }

                                if (response.responseJSON.errors.hasOwnProperty('description')) {
                                     $('.error_description').html(response.responseJSON.errors.description)      
                                 }else{
                                     $('.error_description').html('') 
                                 }

                                 if (response.responseJSON.errors.hasOwnProperty('image')) {
                                      $('.error_image').html(response.responseJSON.errors.image)      
                                  }else{
                                      $('.error_image').html('') 
                                  }
                                 
                              $(".submit_button").text("Submit").prop('disabled', false)
                         }
                      }
                    });
              });

          $('.summernote').summernote();

          // generate coupon code
          $('body').on('click','.generat_number',function(){
              let code= Math.floor(100000 + Math.random() * 900000);
              $('#room_number').val("MH-"+code);
            
          })

       })
   </script>
@endsection
