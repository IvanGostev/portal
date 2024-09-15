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
                                <h3 class="card-title">Компании</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <div>
                                            <div class="fw-bold fs-6">Название поставщика (компании)</div>
                                            <div class="fht-cell">
                                                <div class="filter-control">
                                                    <input type="text" value="{{request()['title'] ?? ''}}"
                                                           name="title" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 gap-5">
                                        <button class="btn btn-dark mt-3" tabindex="0"
                                                aria-controls="example1" type="submit"><span>Поиск</span></button>
                                        <a href="{{route('admin.shipment.index')}}" class="btn btn-secondary mt-3"
                                           tabindex="0"
                                           aria-controls="example1" type="submit"><span>Сбросить</span></a>
                                    </div>
                                </form>
                                <br>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Название</th>
                                        <th>Представитель</th>
                                        <th>Статус</th>
                                        <th>Данные</th>
                                        <th style="width: 40px">Удалить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->company_title}}</td>
                                            <td>{{$user->last_name . ' ' . $user->name}}</td>
                                            <td>{{translateStatusAll($user->status)}}</td>
                                            <td>
                                                <a class="btn btn-dark"
                                                   href="{{route('admin.company.edit', $user->id)}}">
                                                    Выбранные категории, файлы, данные компании
                                                </a>
                                            </td>

                                            <td>
                                                <form action="{{ route('admin.country.destroy', $user->id) }}"
                                                      method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="mit" class="btn btn-dark btn-sm"><i
                                                            class="fas fa-trash">
                                                        </i> Удалить
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    {{ $users->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
