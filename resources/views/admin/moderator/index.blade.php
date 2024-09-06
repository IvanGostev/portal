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
                                <a href="{{ route('admin.moderator.create') }}" class="btn btn-block btn-outline-dark">Добавить</a>
                                <br>
                                <h3 class="card-title">Модераторы</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Имя</th>
                                        <th>Почта</th>
                                        <th>Роль</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}} {{$user->last_name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                <form action="{{route('admin.moderator.update', $user->id)}}" method="post">
                                                    @csrf
                                                    @method('patch')
                                                    <select class="form-control" name="role" onchange="$(this).parent('form').submit()">
                                                        <option {{$user->role == 'admin' ? 'selected' : ''}} value="admin">{{translateRole('admin')}}</option>
                                                    </select>
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
