@extends('layouts.Admin.admin')

@section('title', 'Admin dashboard :: Add Product')

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Products</a></li>
<li class="breadcrumb-item active" aria-current="page">Add Product</li>
@endsection

@section('content')
<!-- Main content -->
<section class="content  style=" padding:20px"">
  <div class="container-fluid">

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif


    @if (session()->has('message'))
    <div class="alert alert-success">
      {{session('message')}}
    </div>
    @endif



    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Add Product</h3>
      </div>

      <!-- /.card-header -->

      <!-- form start -->
      <form action="{{route('admin.product.store')}}" method="post"  name="form-example-1" id="form-example-1" enctype="multipart/form-data">
        @csrf
        <div class="card-body">


          <div class="row">

            <div class="col-md-8">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
                <p class="small">{{config('app.url')}}<span id="url"></span></p>
                <input type="hidden" name="slug" id="slug" value="">
              </div>

              <div class="form-group">
                <label for="description">Description</label>

                <textarea name="description" id="description" class="textarea" placeholder="Describe category" style="width: 100%; height: 300px;overflow-y:scroll; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">


                      </textarea>
              </div>







              <div class="card card-primary">

                <div class="card-header">
                  <h3 class="card-title"><strong>Thumbnails</strong></h3>


                </div><!-- card header -->

                <div class="card-body">
                <div class="upload__box">
                <div class="upload__img-wrap"></div>
                <div class="upload__btn-box">
  <label class="upload__btn btn btn-outline-primary btn-block btn-sm"><i class="fas fa-upload"></i> Upload Multiple Images
  <input type="file" multiple="" data-max_length="20" name="thumbnails[]" class="upload__inputfile">
    </label>
  </div>
</div>

                </div>
              </div>


              <div class="card card-primary col-sm-12 p-0 mb-2">
                <div class="card-header align-items-center">

                  <span class="float-left">
                    <h3 class="card-title">Extra Options</h3>
                  </span>
                  <span class="float-right">
                    <button type="button" id="btn-add" class="btn  btn-primary btn-sm" style="display:inline">+</button>
                    <button type="button" id="btn-remove" class="btn btn-danger btn-sm" style="display:inline">-</button>
                  </span>
                </div>
                <div class="card-body" id="extras">


                </div>
              </div>

            </div>

            <div class="col-md-4">
              <div class="card card-primary">
                <div class="card-header">
                  Select Section/Category
                </div>
                <div class="card-body">
                  <div class="form-group">

                    <label>Section</label>
                    <select name="section_id" id="section_id" class="custom-select">
                      <option value="0">Top Level</option>

                      @foreach($sections as $section)
                      <option value="{{$section->id}}">{{$section->title}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">

                    <label>Category</label>
                    <select name="main_category_id" id="category_list" data-placeholder="Select a State" class="custom-select" disabled>
                      <option value="0">First Select Section</option>

                    </select>
                  </div>


                  <div class="form-group">

                    <label>Sub Category</label>
                    <select name="category_id" id="sub_category_list" data-placeholder="Select a State" class="select2" style="width: 100%;" disabled>
                      <option value="0">First Select Main-Category</option>
                    </select>
                  </div>


                </div>
              </div>

              <div class="card card-primary">
                <div class="card-header">
                  Price/Discount
                </div>
                <div class="card-body">
                  <div class="form-input">
                    <label for="Price">Price</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                      </div>
                      <input type="text" name="price" placeholder="00.00" class="form-control">
                      <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                      </div>
                    </div>

                  </div>
                  <div class="form-input">
                    <label for="Price">Discount</label>
                    <div class="input-group">

                      <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                      </div>
                      <input type="text" name="discount" placeholder="00.00" class="form-control">
                      <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                      </div>
                    </div>

                  </div>

                </div>
              </div>
              <!-- /.card -->

              <div class="card card-primary">
                <div class="card-header">
                  Setting
                </div>
                <div class="card-body">
              

                  <div class="form-group">
                <label for="status">Visibility</label>
                <select type="text" name="status" class="custom-select" id="status">
                  <option value="1">Visible</option>
                  <option value="0">Invisible</option>
                </select>

              </div>



              <div class="form-group">
                <label for="brand">Brand</label>
                <select name="brand_id" id="brand_id" data-placeholder="Select a Brand" class="select2 form-control" style="width: 100%;">

                @foreach($brands as $brand)
                <option value="{{$brand->id}}"> {{$brand->title}}</option>
                @endforeach
                 </select>

              </div>

                </div>
              </div>

              <!-- /.card -->



              <div>
                <button type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-plus-circle"></i> Add Product</button>
              </div>

            </div>
            <!-- /.col (right) -->

          </div>


        </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
    </div>
    </form>
  </div>
  <!-- /.card -->
</section>

@endsection
@section('Css')
 <!-- Select2 -->
 <link rel="stylesheet" href="{{asset('assets/admin_plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin_plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('assets/admin_plugins/summernote/summernote-bs4.css')}}">

<style>

.upload__box {
	padding: 5px;
}

.upload__inputfile {
	width: .1px;
	height: .1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}

.upload__btn-box {
	margin-bottom: 10px;
}

.upload__img-wrap {
	display: flex;
	flex-wrap: wrap;
	margin: 0 -10px;
}

.upload__img-box {
	width: 200px;
	padding: 0 10px;
	margin-bottom: 12px;
}

.upload__img-close {
	width: 24px;
	height: 24px;
	border-radius: 50%;
	background-color: rgba(0, 0, 0, 0.5);
	position: absolute;
	top: 10px;
	right: 10px;
	text-align: center;
	line-height: 24px;
	z-index: 1;
	cursor: pointer;
}

.upload__img-close:after {
	content: '\2716';
	font-size: 14px;
	color: white;
}

.img-bg {
	background-repeat: no-repeat;
	background-position: center;
	background-size: cover;
	position: relative;
	padding-bottom: 100%;
}
.hidden {
    display: none;
  }

</style>
@endsection



@section('JsScript')
<!-- Select2 -->
<script src="{{asset('assets/admin_plugins/select2/js/select2.full.min.js')}}"></script>
  <!-- summernote bs4 -->
<script src="{{asset('assets/admin_plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    theme: 'bootstrap4'

});

jQuery(document).ready(function () {
  ImgUpload();
});

function ImgUpload() {
  var imgWrap = "";
  var imgArray = [];

  $('.upload__inputfile').each(function () {
    $(this).on('change', function (e) {
      imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
      var maxLength = $(this).attr('data-max_length');

      var files = e.target.files;
      var filesArr = Array.prototype.slice.call(files);
      var iterator = 0;
      filesArr.forEach(function (f, index) {

        if (!f.type.match('image.*')) {
          return;
        }

        if (imgArray.length > maxLength) {
          return false
        } else {
          var len = 0;
          for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i] !== undefined) {
              len++;
            }
          }
          if (len > maxLength) {
            return false;
          } else {
            imgArray.push(f);

            var reader = new FileReader();
            reader.onload = function (e) {
              var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
              imgWrap.append(html);
              iterator++;
            }
            reader.readAsDataURL(f);
          }
        }
      });
    });
  });

  $('body').on('click', ".upload__img-close", function (e) {
    var file = $(this).parent().data("file");
    for (var i = 0; i < imgArray.length; i++) {
      if (imgArray[i].name === file) {
        imgArray.splice(i, 1);
        break;
      }
    }
    $(this).parent().parent().remove();
  });
}
function slugify(str) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();
    // remove accents, swap ñ for n, etc
    var from = "àáãäâèéëêìíïîòóöôùúüûñç·/_,:;";
    var to = "aaaaaeeeeiiiioooouuuunc------";
    for (var i = 0, l = from.length; i < l; i++) {
      str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }
    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
      .replace(/\s+/g, '-') // collapse whitespace and replace by -
      .replace(/-+/g, '-'); // collapse dashes
    return str;
  }
  $('#title').on('keyup', function() {
    var url = slugify($(this).val());
    $('#url').html(url);
    $('#slug').val(url);
  });

  $(document).ready(function() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    const category_list = document.getElementById('category_list');
    const sub_category_list = document.getElementById('sub_category_list');
    $('#section_id').on('change', function() {
      let section_id = $('#section_id').val();
      let _token = $('meta[name="csrf-token"]').attr('content');
      if (section_id > 0)
        $('#category_list').prop('disabled', false);
        else{
        $('#category_list').prop('disabled', true);
        $('#sub_category_list').prop('disabled', true);
      
      }
      $.ajax({
        url: "{{route('admin.ajaxload.cats')}}",
        type: "POST",
        data: {
          id: section_id,
          _token: _token
        },
        success: function(response) {
          console.log(response);
          if (response) {
            category_list.innerHTML = '<option value="0">select Sub category</option>'+response
          }
        },
      });
    });
  });




  $(document).ready(function() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    const sub_category_list = document.getElementById('sub_category_list');

    $('#category_list').on('change', function() {
      let category_id = $('#category_list').val();
      let _token = $('meta[name="csrf-token"]').attr('content');
      let section_id = $('#section_id').val();
      if (category_id > 0)
        $('#sub_category_list').prop('disabled', false);
        else
        $('#sub_category_list').prop('disabled', true);
      $.ajax({
        url: "{{route('admin.ajaxload.subcats')}}",
        type: "POST",
        data: {
          id: category_id,
          _token: _token
        },
        success: function(response) {
          console.log(response);
          if (response) {
            sub_category_list.innerHTML = response
          }
        },
      });
    });
  });






  $('.textarea').summernote({
    height: 150, //set editable area's height
    codemirror: { // codemirror options
      theme: 'spacelab'
    }
  });

</script>
@endsection