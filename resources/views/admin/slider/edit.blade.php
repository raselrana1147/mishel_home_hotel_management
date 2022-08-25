@extends('layouts.admin')
@section('title',config('constant.company_name').' Update Slider')
@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4>Update Slider</h4>
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
                    <form id="submit_form" data-action="{{ route('slider.update') }}" method="post" enctype="multipart/form-data">
                      @csrf
                       <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Image <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image">
                                <span class="error_image" style="color: red;"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Title One <i class="icofont icofont-info-circle" title="Optional"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title_1" value="{{$data->title_1}}">
                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Title Two <i class="icofont icofont-info-circle" title="Optional"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title_2" value="{{$data->title_2}}">
                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Button title <i class="icofont icofont-info-circle" title="Optional"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="button_title" value="{{$data->button_title}}">
                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Url <i class="icofont icofont-info-circle" title="Optional"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="url" placeholder="URL" value="{{$data->url}}">
                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Type <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                               <select class="form-control" name="type">
                                 <option value="">Select Type</option>
                                  <option value="slider">Slider</option>
                               </select>
                               <span class="error_type" style="color: red;"></span>
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

      })
  </script>
@endsection
