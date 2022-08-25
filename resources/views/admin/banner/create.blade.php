@extends('layouts.admin')
@section('title',config('constant.company_name').' Create Banner')
@section('extra_css')
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
 
@endsection
@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4>Add New Banner</h4>
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
                    <form id="submit_form" data-action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                      @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Image <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image">
                                <span class="error_image" style="color: red;"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Title<i class="icofont icofont-info-circle" title="Optional"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" placeholder="Title">
                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Description<i class="icofont icofont-info-circle" title="Optional"></i></label>
                            <div class="col-sm-10">
                                <textarea class="summernote" name="description"></textarea>
                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Type <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                               <select class="form-control" name="type">
                                 <option value="">Select Type</option>
                                  <option value="explore_one">Explore One</option>
                                  <option value="explore_two">Explore Two</option>
                                  <option value="city">City</option>
                                  <option value="footer">Footer</option>
                                  <option value="contact_one">Contact One</option>
                                  <option value="contact_two">Contact Two</option>
                               </select>
                               <span class="error_type" style="color: red;"></span>
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
                              if (response.responseJSON.errors.hasOwnProperty('image')) {
                                   $('.error_image').html(response.responseJSON.errors.image)      
                               }else{
                                   $('.error_image').html('') 
                               }

                               if (response.responseJSON.errors.hasOwnProperty('type')) {
                                    $('.error_type').html(response.responseJSON.errors.type)      
                                }else{
                                    $('.error_type').html('') 
                                }  
                              $(".submit_button").text("Submit").prop('disabled', false)
                         }
                      }
                    });
              });
           $('.summernote').summernote();

      })
  </script>
@endsection
