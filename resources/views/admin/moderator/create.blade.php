@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper" style="min-height: 1345.6px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title">Создание модератора</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.moderator.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Имя</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Фамилия</label>
                                            <input type="text" name="last_name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Почта</label>
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Роль</label>
                                            <select name="role" class="form-control" required>
                                                <option value="admin">
                                                    Администратор
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-dark">Отправить</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->


                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->

                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
