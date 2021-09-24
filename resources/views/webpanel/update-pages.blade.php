@extends('webpanel.include.master')
@section('content')
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> {{ $row->title }}s Information</h3>

				<div class="row">



                  <div class="col-md-12">
                      <div class="content-panel">
                      <p align="center" style="color:#F00;">@if(session('msg')) {{ session('msg') }} @endif</p>
                           <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                           <p style="color:#F00">@if(session('msg')) {{ session('msg') }} @endif</p>
                          @csrf
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Page title </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="title" value="{{ $row->title }}" >
                              </div>
                          </div>




                               <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Content </label>
                              <div class="col-sm-10">
                                  <textarea   class="form-control summernote"  name="text" value="{{ $row->text }}">{{ $row->text }}</textarea>
                              </div>
                          </div>

                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Created Date </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="pdate" value="@if(!empty($row->date)) {{ $row->date }} @endif" readonly >
                              </div>
                          </div>

						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Status </label>
                              <div class="col-sm-10">
                                 <select name="status" value="{{ $row->status }}" class="form-control">
									  <option value="active">Active</option>
									  <option value="deactive">Deactive</option>

								 </select>
                              </div>
                          </div>





                          <div style="margin-left:100px;">
                          <input type="submit" name="Submit" value="Update" class="btn btn-theme"></div>
                          </form>
                      </div>
                  </div>
              </div>
		</section>
      </section></section>
@endsection('content')

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-beta.1/js/froala_editor.pkgd.min.js"></script>
<script>
    new FroalaEditor('#froala-editor', {
      // Set the file upload URL.
      imageUploadURL: 'assets/img/page-edit/upload_image.php',

      imageUploadParams: {
        id: 'my_editor'
      }
    })
  </script>
