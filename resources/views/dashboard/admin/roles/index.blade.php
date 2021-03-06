@extends('dashboard.admin.layouts.app')

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">All Roles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item">ACL</li>
                    <li class="breadcrumb-item active">Roles</li>
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
                    <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools float-left">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
            
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                                </div>
                            </div>
                        
                            <div class="card-tools">
                                <a class="btn btn-primary" href="{{ route('admin.roles.create') }}" role="button">
                                    <i class="fas fa-plus xs"></i>
                                    Add Role
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Permissions</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($roles as $role)
                                    <tr>
                                        <td>{{$role->id}}</td>
                                        <td><span class="badge badge-primary mt-1">{{$role->name}}</span></td>
                                        <td>
                                            @forelse($role->permissions as $permission)
                                                <li>{{$permission->name}}</li>
                                            @empty 
                                                <div class="alert alert-warning" role="alert">
                                                    No permissions assigned to this role
                                                    <p><small>Click edit to assign permissions</small></p>
                                                </div>
                                            @endforelse
                                        </td>
                                        <td class="project-actions">
                                            <a class="btn btn-info btn-sm" href="{{ route('admin.roles.edit', ['role' => $role->id]) }}" role="button">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-role-{{$role->id}}">
                                                <i class="fas fa-trash">
                                                </i>
                                            </button>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="delete-role-{{$role->id}}" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete {{$role->name}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form role="form" method="POST" action="{{ route('admin.roles.destroy', ['role' => $role->id]) }}">
                                                @method('DELETE')
                                                @csrf
                                                <div class="modal-body">

                                                    <div class="alert alert-danger alert-dismissible">
                                                        <h5><i class="icon fas fa-ban"></i> Warning!</h5>
                                                        Are you sure you want to delete the role: 
                                                        <br><strong>{{$role->name}}</strong>???
                                                        <br><small>This action is irreversible!</small>
                                                    </div>

                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">No Cancel</button>
                                                    <button type="submit" class="btn btn-danger">Yes Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>

                                @empty
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-warning">
                                                <h5><i class="icon fas fa-warning"></i> No role Registered Yet!</h5>
                                                register at least one role.
                                            </div>
                                        </div>
                                    </div>
                                @endempty

                            </tbody>
                        </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                {{$roles->links()}}
                            </ul>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                    </div>
                </div>
            </div>
        <!-- /.content -->
        </section>
@endsection