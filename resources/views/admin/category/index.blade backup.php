@extends('layouts.Admin.admin')

@section('title', 'Admin dashboard :: Category List')

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Categories</li>
@endsection

@section('content')

<!-- Main content -->
<section class="content">

    @if (session()->has('message'))
    <div class="col-md-12">
        <div class="alert alert-success">
            {{session('message')}}
        </div>

    </div>
    @endif


    @if (session()->has('error'))
    <div class="col-md-12">
        <div class="alert alert-danger">
            {{session('error')}}
        </div>

    </div>
    @endif


    <div class="col-md-12">
        <div class="alert hidden" id="alert">

        </div>

    </div>


    <div class="col-md-12">
        <div class="alert" id="alert">
        </div>

    </div>



        <div class="card">

            <div class="card-header">
                <h3 class="card-title"><strong>Category</strong></h3>
                <a href="{{route('admin.category.create')}}"><button class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-plus-circle"></i> Add
                    Category</button></a>
            </div><!-- card header -->

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>description</th>
                                <th>Section</th>
                                <th>parent</th>
                                <th>childs</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if($categories->count() > 0)
                            @foreach($categories as $category)
                            <tr class="category_id_{{$category->id}}">
                                <td>{{$category->id}}</td>
                                <td>{{$category->title}} </td>
                                <td>{{!! $category->description !!}}</td>
                                <td>{{$category->section->title}}</td>

                                <td>{{isset($category->parent->title) ? $category->parent->title : 'No parent cat'}}
                                </td>
                                <td>
                                    @if (count($category->childs) > 0)
                                    @foreach($category->childs as $child)
                                    {{$child->title}},
                                    @endforeach
                                    @else
                                    <strong>Top Level Cat</strong>
                                    @endif

                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm" style="max-height: 30px" role="group" aria-label="Basic example">
                                        <a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-default btn-sm" title="Click To Edit">
                                            <i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-default btn-sm" title="Click Enable/Disable Status">
                                            <i class="fa {{$category->status==1 ? 'fa-eye' : 'fa-eye-slash'}}" onclick="changeStatus({{$category->id}})" aria-hidden="true" id="status_{{$category->id}}"></i> </a>
                                        <a href=" #" onclick="confirmDelete({{$category->id}})" class="btn btn-default btn-sm" title="Click to delete this record">
                                            <i class="fa fa-trash" style="display:inline"></i>
                                        </a>
                                    </div>

                                </td>
                            </tr>


                            @endforeach
                            @else
                            <tr>
                                <td colspan="7">
                                    <p class="text-center">No records in database</p>
                                </td>
                            </tr>
                            @endif

                        </tbody>

                    </table>
                </div>

            <!-- /.card-body -->
            <div class="card-footer pull-right">
                {{$categories->Links()}}
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">

        </div>
    </div>

</section>
<!-- /.content -->

@endsection

@section('Css')
<style>
    .hidden {
        display: none;
    }
</style>


@endsection


@section('JsScript')


<script src="{{asset('assets/admin_plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script>
  const notify= (type, msg, title = 'Alert !')=> {
        $.notify({
            title: '<strong>' + title + '</strong>',
            icon: type == 'success' ? 'fa fa-check' : 'fa fa-ban',
            message: msg
        }, {
            type: type,
            animate: {
                enter: 'animated fadeInUp',
                exit: 'animated fadeOutRight'
            },
            placement: {
                from: "bottom",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
        });
    }
    const deleteCategory= (id)=> {
        $(document).ready(function() {
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let record_id = id;
            const _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{route('admin.category.destroy',1)}}",
                type: "POST",
                data: {
                    record_id: id,
                    _token: _token,
                    '_method': 'DELETE',
                },
                dataType: 'json',
                success: function(response) {
                    console.log();
                    if (response) {
                        notify(response.type, response.msg);
                        $('#category_id_'+id).addClass('hidden');
                    }
                },
            });
        });
    }
    const confirmDelete= (id)=> {
        let choice = confirm("Are You sure, You want to Delete this record ? All its Sub-categories will also be deleted ");
        if (choice) {
            deleteCategory(id);
        }
    }
    const changeStatus= (id)=> {
        $(document).ready(function() {
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            const _token = $('meta[name="csrf-token"]').attr('content');
            let currentStatus = $('#status_' + id).hasClass('fa-eye-slash') ? 0 : 1;
            let record_id = id;
            $.ajax({
                url: "{{route('admin.category.changestatus')}}",
                type: "POST",
                data: {
                    record_id: id,
                    _token: _token,
                    'currentstatus': currentStatus,
                },
                success: function(response) {
                    console.log(response);
                    notify(response.type, response.msg);
                    if (response) {
                        if (currentStatus == 1) {
                            $('#status_' + id).removeClass('fa-eye');
                            $('#status_' + id).addClass('fa-eye-slash');
                        } else {
                            $('#status_' + id).removeClass('fa-eye-slash');
                            $('#status_' + id).addClass('fa-eye');
                        }
                    }
                },
            });
        });
    }
</script>
@endsection