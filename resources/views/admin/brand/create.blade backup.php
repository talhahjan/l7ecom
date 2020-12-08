@extends('layouts.Admin.admin')

@section('title', 'Admin dashboard :: Add Brand')

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{route('admin.brand.index')}}">Brand</a></li>
<li class="breadcrumb-item active" aria-current="page">Add Brand</li>
@endsection

@section('content')
<!-- Main content -->
<section class="content" style="padding:20px">
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
                <h3 class="card-title">Add Brand</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('admin.brand.store')}}" accept-charset="utf-8" enctype="multipart/form-data" method="post">
                @csrf
                <div class="card-body">


                    <div class="row">
                        <div class="col-12">
                            <!-- textarea -->
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="brand Title">

                            </div>
                        </div>
                    </div>



                    <div class="col-12">

                        <div class="card card-primary">
                            <div class="card card-header">
                                <h3 class="card-title">brand Logo</h3>
                            </div>

                            <div class="card-body">



                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" id="inputGroupFile01" name="logo" class="form-controll" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose
                                            file</label>

                                    </div>

                                </div>

                                <div class="alert"></div>



                                <div id="thumbnail">
                                    <img id="blah" class="img-thumbnail" src="{{asset('assets/img/No_image_available.png')}}" alt="your image">
                                </div>





                            </div>
                        </div>


                    </div>
                </div>









        </div>
        <!-- /.card body -->


        <div class="card-footer">

            <button type="submit" class="btn btn-outline-primary float-right"><i class="fa fa-plus-circle"></i> Create Brand</button>
            </form>
        </div>


    </div><!-- /.card -->

    @endsection
    @section('Css')
    @endsection


    @section('JsScript')
    <script>
        $("#inputGroupFile01").change(function(event) {
            RecurFadeIn();
            readURL(this);
        });
        $("#inputGroupFile01").on('click', function(event) {
            RecurFadeIn();
        });

        const readURL = (input) => {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var filename = $("#inputGroupFile01").val();
                filename = filename.substring(filename.lastIndexOf('\\') + 1);
                reader.onload = function(e) {
                    debugger;
                    $('#blah').attr('src', e.target.result);

                    $('#blah').hide();
                    $('#blah').fadeIn(500);
                    $('.custom-file-label').text(filename);
                }
                reader.readAsDataURL(input.files[0]);
            }
            $(".alert").removeClass("loading").hide();
        }

        const RecurFadeIn = () => {
            // console.log('ran');
            FadeInAlert("Wait for it...");
        }

        const FadeInAlert = (text) => {
            $(".alert").show();
            $(".alert").text(text).addClass("loading");

        }
    </script>
    @endsection