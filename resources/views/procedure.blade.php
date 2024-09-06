@extends('layouts.main')
@section('content')
    <div class="content-wrapper" style="min-height: 1302.4px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                @if (auth()->user()->status != 'approved')
                <h1>Вы не прошли общую классификацию</h1>
                    @endif
            </div><!-- /.container-fluid -->
        </section>

        @if (auth()->user()->status  == 'approved')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Процедуры</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="font-size: 14px!important;">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Название процедуры</th>
                                        <th>Категория</th>
                                        <th>Статус</th>
                                        <th>Способ закупки</th>
                                        <th>Тип этапа</th>
                                        <th>Дата начала</th>
                                        <th>Дата конца</th>
                                        <th>Источник</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($procedures as $procedure)
                                        <tr>
                                            <td>{{$procedure->id}}</td>
                                            <td>{{$procedure->title}}</td>
                                            <td>{{$procedure->subcategory()->title}}</td>
                                            <td>{{$procedure->status}}</td>
                                            <td>{{$procedure->procurement_method}}</td>
                                            <td>{{$procedure->type}}</td>
                                            <td>{{$procedure->start}}</td>
                                            <td>{{$procedure->finish}}</td>
                                            <td><a class="btn btn-dark" href="{{ $procedure->url }}">Перейти к источнику</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                {{ $procedures->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        @endif

    </div>
@endsection
