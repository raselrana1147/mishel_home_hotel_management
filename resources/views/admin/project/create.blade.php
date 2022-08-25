@extends('layouts.admin')
@section('title',config('constant.company_name').' Create Project')
@section('extra_css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection
@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4>Create Project</h4>
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
                    <form id="submit_form" data-action="{{ route('project.store') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Project Name <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" placeholder="Project Name">
                                <span class="error_name" style="color: red;"></span>
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
                              if (response.responseJSON.errors.hasOwnProperty('name')) {
                                   $('.error_name').html(response.responseJSON.errors.name)      
                               }else{
                                   $('.error_name').html('') 
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
