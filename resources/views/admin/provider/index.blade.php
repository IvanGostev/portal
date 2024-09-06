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
                                <h3 class="card-title">Поставщики</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Инн</th>
                                        <th>Кпп</th>
                                        <th>Название</th>
                                        <th>Представитель</th>
                                        <th>Почта</th>
                                        <th style="width: 40px">Поставки</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->inn}}</td>
                                            <td>{{$user->kpp}}</td>
                                            <td>{{$user->company_title}}</td>
                                            <td>{{$user->name}} {{$user->last_name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                <a href="{{route('admin.provider.shipment.index', $user->id)}}" class="btn btn-dark">Поставки</a>
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
