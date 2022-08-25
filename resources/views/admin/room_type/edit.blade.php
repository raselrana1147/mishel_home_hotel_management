@extends('layouts.admin')
@section('title',config('constant.company_name').' Update Room Type')
@section('extra_css')
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  <link href="{{ asset('assets/backend/style/css/select2.css') }}" rel="stylesheet" />
@endsection
@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4>Update Room Type</h4>
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
                    <form id="submit_form" data-action="{{ route('room_type.update') }}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Room Type Name <i class="icofont icofont-info-circle" title="Required"></i></label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" name="name" value="{{$data->name}}">
                              <span class="error_name" style="color: red;"></span>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Price <i class="icofont icofont-info-circle" title="Required"></i></label>
                          <div class="col-sm-10">
                              <input type="number" class="form-control" name="price" value="{{$data->price}}" step="any">
                              <span class="error_price" style="color: red;"></span>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Description <i class="icofont icofont-info-circle" title="Required"></i></label>
                          <div class="col-sm-10">
                              <textarea name="description" class="summernote">{{$data->description}}</textarea>
                              <span class="error_description" style="color: red;"></span>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Amenities <i class="icofont icofont-info-circle" title="Required"></i></label>
                          <div class="col-sm-10">
                             <select class="form-control add_amenity" name="amenities[]" multiple="multiple">
                               @foreach ($amenities as $amenity)
                                   <option value="{{$amenity->id}}">{{$amenity->name}}</option>
                               @endforeach
                             </select>
                              <span class="error_amenity" style="color: red;"></span>
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
  <script src="{{ asset('assets/backend/style/js/summernote.js') }}"></script>
   <script src="{{ asset('assets/backend/style/js/select2.js') }}"></script>
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


          $('.summernote').summernote();

              //===select2=====
          $(".add_amenity").select2({
              tags: true,
              tokenSeparators: [',', ' ']
          })

      })
  </script>
@endsection
