@extends('layouts.Admin.admin')

@section('title', 'Admin dashboard :: user')

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Brands</li>
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

        <div class="card">

            <div class="card-header">
                <h3 class="card-title"><strong>Brands</strong></h3>
                <a href="{{route('admin.brand.create')}}"><button class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-plus-circle"></i> Add
                        Brand</button></a>
            </div><!-- card header -->

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>title</th>
                            <th>logo</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if($brands->count() > 0)
                        @foreach($brands as $brand)

                        <tr id="{{$brand->id}}">
                            <td>{{$brand->id}}</td>

                            <td> {{$brand->title}}</td>
                            <td></td>
                            <td>
                                <div class="btn-group btn-group-sm" style="max-height: 30px" role="group" aria-label="Basic example">
                                    <a href="{{route('admin.brand.edit',$brand->id)}}" class="btn btn-default btn-sm" title="Click To Edit">
                                        <i class="fa fa-edit"></i></a>
                                    <a href=" #" onclick="confirmDelete(this)" class="btn btn-default btn-sm" title="Click to delete this record">
                                        <i class="fa fa-trash" style="display:inline"></i>
                                    </a>
                                </div>

                            </td>


                        </tr>

                        @endforeach
                        @else
                        <tr>
                            <td colspan="3">
                                <p class="text-center">No records in database</p>
                            </td>
                        </tr>
                        @endif

                    </tbody>

                    </tbody>

                </table>
                <div class="card-footer float-right">
                    {{$brands->Links()}}
                </div>

            </div>


        </div>


    </div>
</section>

@endsection


@section('Css')

@endsection


@section('JsScript')

<!-- bootstrap notify -->
<script src="{{asset('assets/admin_plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script>
    const notify=(type, msg, title = 'Alert !') =>{
        $.notify({
            title: `<strong>${title}</strong>`,
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

    const deleteBrand= (selector)=> {
        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        const _token = $('meta[name="csrf-token"]').attr('content');
        let row = $(selector).parent().parent().parent();
        let id = $(row).attr('id');

        $.ajax({
            url: "{{route('admin.brand.destroy',1)}}",
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
                    $(row).fadeOut(500);
                }
            },
        });

    }

    const confirmDelete=(selector) =>{
        let choice = confirm("Are You sure, You want to Delete this record ? All its Sub-categories will also be deleted ");
        if (choice) {
            deleteBrand(selector);
        }
    }
</script>
@endsection