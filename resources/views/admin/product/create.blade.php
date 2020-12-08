@extends('layouts.Admin.admin')

@section('title', 'Admin dashboard :: Add Product')

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Products</a></li>
<li class="breadcrumb-item active" aria-current="page">Add Product</li>
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

        <!-- accordian star  -->
        <div id="accordion">
            <!-- form start -->
            <form action="{{route('admin.product.store')}}" method="post" name="form-example-1" id="form-example-1" enctype="multipart/form-data">
                @csrf
                @METHOD('PUT')
                <!-- card common start -->
                <div class="card">
                    <div class="card-header" id="common">
                        <h5 class="mb-0">
                            <button type="button" type="button" class="btn btn-outline" data-toggle="collapse" data-target="#collapseCommon" aria-expanded="true" aria-controls="collapseCommon">
                                <strong> Common</strong>
                            </button>
                        </h5>
                    </div>

                    <div id="collapseCommon" class="collapse show" aria-labelledby="common" data-parent="#accordion">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
                                <p class="small">{{config('app.url')}}<span id="url"></span></p>
                                <input type="hidden" name="slug" id="slug">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>

                                <textarea name="description" id="description" class="textarea" placeholder="Describe category" style="width: 100%; height: 300px;overflow-y:scroll; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                            

                                </textarea>
                            </div>

                            <div class="row">

                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="brand">Brand</label>
                                        <select name="brand_id" id="brand_id" data-placeholder="Select a Brand" class="select2 form-control" style="width: 100%;">

                                            @foreach($brands as $brand)
                                            <option value="{{$brand->id}}"> {{$brand->title}}</option>
                                            @endforeach
                                        </select>


                                    </div>
                                </div>
                                <div class="col-md">
                                    <label for="status">Visibility</label>
                                    <select type="text" name="status" class="custom-select" id="status">
                                        <option value="1">Visible</option>
                                        <option value="0">Invisible</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- common card ends  -->

                <!-- card thumbnails starts -->
                <div class="card">
                    <div class="card-header" id="Thumbnails">
                        <h5 class="mb-0">
                            <button type="button" class="btn btn-outline collapsed" data-toggle="collapse" data-target="#collapseThumbnails" aria-expanded="false" aria-controls="collapseThumbnails">
                                <strong> Thumbnails</strong>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThumbnails" class="collapse" aria-labelledby="Thumbnails" data-parent="#accordion">
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
                </div>
                <!-- Thumbnails card ends -->

                <!-- card Pricing  starts -->
                <div class="card">
                    <div class="card-header" id="Pricing">
                        <h5 class="mb-0">
                            <button type="button" class="btn btn-outline collapsed" data-toggle="collapse" data-target="#collapsePricing" aria-expanded="false" aria-controls="collapsePricing">
                                <strong> Pricing </strong>
                            </button>

                        </h5>
                    </div>
                    <div id="collapsePricing" class="collapse" aria-labelledby="Pricing" data-parent="#accordion">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md">
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
                                </div>
                                <div class="col-md">
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
                        </div>
                    </div>
                </div>
                <!-- Pricing  card ends -->


                <!-- card Categorization starts -->
                <div class="card">
                    <div class="card-header" id="Categorization">
                        <h5 class="mb-0">
                            <button type="button" class="btn btn-outline collapsed" data-toggle="collapse" data-target="#collapseCategorization" aria-expanded="false" aria-controls="collapseCategorization">
                                <strong> Categorization</strong>
                            </button>

                        </h5>
                    </div>
                    <div id="collapseCategorization" class="collapse" aria-labelledby="Categorization" data-parent="#accordion">
                        <div class="card-body">
                            <input type="text" id="category" name="category" placeholder="Select" autocomplete="off" />
                            <input type="hidden" name="categories" id="categories">
                        </div>
                    </div>
                </div>
                <!-- Categorization card ends -->

                <!-- card Featured  starts -->
                <div class="card">
                    <div class="card-header" id="Featured">
                        <h5 class="mb-0">
                            <button type="button" class="btn btn-outline collapsed" data-toggle="collapse" data-target="#collapseFeatured" aria-expanded="false" aria-controls="collapseFeatured">
                                <strong> Featured</strong>
                            </button>

                        </h5>
                    </div>
                    <div id="collapseFeatured" class="collapse" aria-labelledby="Featured" data-parent="#accordion">
                        <div class="card-body">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="featured" checked>
                                <label for="featured" class="custom-control-label">make this Product featured Product</label>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- featured  card ends -->

                <!-- card Extras starts -->
                <div class="card">
                    <div class="card-header d-flex" id="Extras">
                        <h5 class="mb-0">
                            <button type="button" class="btn btn-outline collapsed" data-toggle="collapse" data-target="#collapseExtras" aria-expanded="false" aria-controls="collapseExtras">
                                <strong> Extras</strong>
                            </button>

                        </h5>
                        <span class="ml-auto" id="collapseExtras">
                            <button type="button" id="btn-add" class="btn  btn-outline-primary btn-sm" style="display:inline">+</button>
                            <button type="button" id="btn-remove" class="btn btn-outline-danger btn-sm" style="display:inline">-</button>
                        </span>
                    </div>
                    <div id="collapseExtras" class="collapse" aria-labelledby="Extras" data-parent="#accordion">
                        <div class="card-body" id="extras">

                            @include('admin.ajax.extras')

                        </div>
                    </div>
                </div>
                <!-- Extras card ends -->




                <div>
                    <button type="submit" type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-plus-circle"></i> Add Product</button>
                </div>
            </form>

        </div>
        <!-- accordion end  -->

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
<!-- comboTree -->
<link rel="stylesheet" href="{{ asset('assets/admin_plugins/comboTree/style.css')}}">
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.0.45/css/materialdesignicons.min.css">
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
<script src="{{asset('assets/admin_plugins/comboTree/comboTreePlugin.js')}}" type="text/javascript"></script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()
        theme: 'bootstrap4'
    });
    jQuery(document).ready(function() {
        ImgUpload();
    });

    const ImgUpload = () => {
        var imgWrap = "";
        var imgArray = [];
        $('.upload__inputfile').each(function() {
            $(this).on('change', function(e) {
                imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                var maxLength = $(this).attr('data-max_length');
                var files = e.target.files;
                var filesArr = Array.prototype.slice.call(files);
                var iterator = 0;
                filesArr.forEach(function(f, index) {
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
                            reader.onload = function(e) {
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
        $('body').on('click', ".upload__img-close", function(e) {
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

    const slugify = (str) => {
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

    $('.textarea').summernote({
        height: 150, //set editable area's height
        codemirror: { // codemirror options
            theme: 'spacelab'
        }
    });
    $('#btn-add').on('click', function(e) {
        $.get("{{route('admin.product.extras')}}").done(function(data) {
            $('#extras').append(data);
        })
    })
    $('#btn-remove').on('click', function(e) {
        $('#opt:last').remove();
    });

    const makeOption = (selector) => {
        var extra = $(selector).val();
        if (extra == 'custom') {
            let choice = prompt('Please Entile Extra Option');
            if (choice) {
                var extra = choice;
                $(selector).append('<option value="' + choice + '" selected>' + choice + ' </option>');

                console.log(choice);
            }

        }
        $(selector).next().find('input').attr('placeholder', 'seperate each ' + extra + ' with semicolm');
        $(selector).next().find('input').attr('name', 'extras[' + extra + ']');

    }



    const Data = [{
        id: 1,
        title: 'Electronic Items',
        isSelectable: false,
        subs: [{
            id: 1,
            title: 'Mobiles & Tablets',
            isSelectable: false,
            subs: [{
                id: 2,
                title: 'Smart phones',
            }, {
                id: 3,
                title: 'Tablets',
            }, {
                id: 4,
                title: 'Accesories',
            }, {
                id: 15,
                title: 'zzzxzxzxzxzx',
            }, ],
        }, ],
    }, {
        id: 2,
        title: 'Fashion',
        isSelectable: false,
        subs: [{
            id: 5,
            title: 'Foot Wear',
            isSelectable: false,
            subs: [{
                id: 6,
                title: 'Men Footwear',
            }, {
                id: 7,
                title: 'Women Footwear',
            }, {
                id: 8,
                title: 'Kids Footwear',
            }, ],
        }, {
            id: 9,
            title: 'Cosmetic & Beauty',
            isSelectable: false,
            subs: [{
                id: 6,
                title: 'Men Footwear',
            }, {
                id: 7,
                title: 'Women Footwear',
            }, {
                id: 8,
                title: 'Kids Footwear',
            }, ],
        }, ],
    }, {
        id: 3,
        title: 'General Store',
        isSelectable: false,
        subs: [{
            id: 10,
            title: 'Foods',
            isSelectable: false,
            subs: [{
                id: 11,
                title: 'Spices',
            }, {
                id: 12,
                title: 'Pickles',
            }, ],
        }, ],
    }, {
        id: 4,
        title: 'Health care',
        isSelectable: false,
        subs: [{
            id: 13,
            title: 'Medicines & Surgical',
            isSelectable: false,
            subs: [],
        }, {
            id: 14,
            title: 'Fitness Equipment',
            isSelectable: false,
            subs: [],
        }, ],
    }, ];


    comboTree = $('#category').comboTree({
        source: Data,
        isMultiple: true,

    });

    comboTree.onChange(function() {
        // strore slected ids of categories it will generate array 
        let SelectedIds = comboTree.getSelectedIds();
        // convert array to string
        let categories = SelectedIds.toString();
        // store selected categories ids in hidden input values (ID categories)  namely categories
        $('#categories').attr("value", SelectedIds);
    });
</script>




@endsection