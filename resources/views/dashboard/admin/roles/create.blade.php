@extends('dashboard.admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Role</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                <li class="breadcrumb-item">ACL</li>
                <li class="breadcrumb-item"><a href="{{route('admin.roles.index')}}">Roles</a></li>
                <li class="breadcrumb-item active">Create</li>
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
                        <h3 class="card-title">Create Role</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{ route('admin.roles.store') }}">
                        @csrf 
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" placeholder="name of role e.g admin" name="name" required>
                                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="permissions">Assign Permissions</label>
                                <p><small class="text-muted">Select 0 or more permissions for this role or first <a href="{{ route('admin.permissions.create') }}">create permissions</a> to assign to this new role</small></p>
                                <div class="row">
                                    @forelse($permissions as $permission)
                                        <div class="col-md-4">
                                            <div class="form-group form-check">
                                                <input type="checkbox" name="permissions[]" value="{{$permission->id}}" class="form-check-input" id="add-permission-{{$permission->id}}" 
                                                {{ (is_array(old('permissions')) && in_array($permission->id, old('permissions'))) ? ' checked' : '' }}>
                                                <label class="form-check-label" for="add-permission-{{$permission->id}}">{{$permission->name}}</label>
                                            </div>
                                        </div>
                                    @empty 
                                        <div class="alert alert-warning" role="alert">
                                            No permissions to show
                                        </div>
                                    @endforelse
                                </div>

                                @error('permissions')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create</button>
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