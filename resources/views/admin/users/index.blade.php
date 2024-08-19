@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper" style="min-height: 1302.4px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Users</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th style="width: 40px">Name</th>
                                        <th style="width: 40px">Email</th>
                                        <th style="width: 20px">Role</th>
                                        <th style="width: 20px">Edit</th>
                                        <th style="width: 40px">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->first_name}} {{$user->last_name}}</td>
                                            <td>{{$user->email}}</td>
                                                <?php
                                            if ($user->role == 1) {
                                                echo '<td class="project-state">
                                                <span class="badge badge-success">Admin</span>
                                            </td>';
                                            } elseif ($user->role == 0) {
                                                echo '<td class="project-state">
                                                <span class="badge badge-warning">User</span>
                                            </td>';
                                            } elseif ($user->role == 2) {
                                                echo '<td class="project-state">
                                                <span class="badge badge-primary">Moderator</span>
                                            </td>';
                                            } elseif ($user->role == 3) {
                                                echo '<td class="project-state">
                                                <span class="badge badge-danger">Seller</span>
                                            </td>';
                                            }
                                                ?>

                                            <td class="project-actions">
                                                {{--                                                <a class="btn btn-primary btn-sm" href="#">--}}
                                                {{--                                                    <i class="fas fa-folder">--}}
                                                {{--                                                    </i>--}}
                                                {{--                                                    View--}}
                                                {{--                                                </a>--}}
                                                <a class="btn btn-info btn-sm"
                                                   href="{{route('admin.user.edit', $user->id)}}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>


                                            </td>

                                            <td>
                                                <form action="{{ route('admin.user.destroy', $user->id) }}"
                                                      method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button
                                                        {{auth()->user()->id == $user->id ? 'disabled' : ' '}}  type="submit"
                                                        class="btn btn-danger btn-sm"><i class="fas fa-trash">
                                                        </i> Delete
                                                    </button>
                                                    {{auth()->user()->id == $user->id ? ' Your account' : ' '}}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
