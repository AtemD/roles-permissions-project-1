@extends('dashboard.admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Roles</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                <li class="breadcrumb-item">ACL</li>
                <li class="breadcrumb-item"><a href="{{route('admin.permissions.index')}}">Permissions</a></li>
                <li class="breadcrumb-item active">Update</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">Update Permission: <strong>{{$permission->name}}</strong></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{ route('admin.permissions.update', ['permission' => $permission->id]) }}">
                            @method('PUT')
                            @csrf 

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $permission->name }}" id="name" placeholder="name of permission e.g create users" name="name">
                                    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="roles">Assign Roles</label>
                                    <p><small class="text-muted">Assign roles for this permission or first <a href="#">create permissions</a> to assign to this permission</small></p>
                                    <div class="row">
                                        @forelse($roles as $role)
                                            <div class="col-md-4">
                                                <div class="form-group form-check">
                                                    <input type="checkbox" name="roles[]" value="{{$role->id}}" class="form-check-input" id="add-role-{{$role->id}}" 
                                                        {{ ($permission->roles->contains($role->id)) ? ' checked' : '' }}>
                                                    <label class="form-check-label" for="add-role-{{$role->id}}">{{$role->name}}</label>
                                                </div>
                                            </div>
                                        @empty 
                                            <div class="alert alert-warning" role="alert">
                                                No roles to show
                                            </div>
                                        @endforelse
                                    </div>

                                    @error('roles')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                    
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    <!-- /.content -->
    </section>
@endsection