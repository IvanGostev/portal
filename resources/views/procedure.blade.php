@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
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
                                    <form class="row" >
                                        <div class="col-sm-12 col-md-2">
                                            <div>
                                                <div class="fw-bold fs-6">Название</div>
                                                <div class="fht-cell">
                                                    <div class="filter-control">
                                                        <input type="text" value="{{request()['title'] ?? ''}}"
                                                               name="title" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-2">
                                            <div>
                                                <div class="fw-bold fs-6">Статус</div>
                                                <div class="fht-cell">
                                                    <div class="filter-control">
                                                        <select
                                                            class="form-control bootstrap-table-filter-control-price "
                                                            style="width: 100%;" dir="ltr" name="status">
                                                            <option value="all">Все</option>
                                                            <option
                                                                {{request()['status'] == 'Опубликовано' ? 'selected' : '' }}  value="Опубликовано">
                                                                Опубликовано
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-2">
                                            <div>
                                                <div class="fw-bold fs-6">Категория</div>
                                                <div class="fht-cell">
                                                    <div class="filter-control">
                                                        <select
                                                            class="form-control bootstrap-table-filter-control-price "
                                                            style="width: 100%;" dir="ltr" name="subcategory_id">
                                                            <option value="all">Все</option>
                                                            @foreach($subcategories as $subcategory)
                                                                <option
                                                                    {{request()['subcategory_id'] == $subcategory->id ? 'selected' : '' }} value="{{$subcategory->id}}">{{$subcategory->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-2">
                                            <div>
                                                <div class="fw-bold fs-6">Способ закупки</div>
                                                <div class="fht-cell">
                                                    <div class="filter-control">
                                                        <select
                                                            class="form-control bootstrap-table-filter-control-price"
                                                            style="width: 100%;" dir="ltr" name="procurement_method">
                                                            <option value="all">Все</option>
                                                            <option
                                                                {{request()['status'] == 'Запрос предложений' ? 'selected' : '' }}  value="Запрос предложений">
                                                                Запрос предложений
                                                            </option>
                                                            <option
                                                                {{request()['status'] == 'Тендер' ? 'selected' : '' }} value="Тендер">
                                                                Тендер
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-2 gap-5">
                                            <button class="btn btn-dark mt-3" tabindex="0"
                                                    aria-controls="example1" type="submit"><span>Поиск</span></button>
                                            <a href="{{route('procedure.index')}}" class="btn btn-secondary mt-3"
                                               tabindex="0"
                                               aria-controls="example1" type="submit"><span>Сбросить</span></a>
                                        </div>
                                    </form>
                                    <br>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="width: 10px">Номер процедуры</th>
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
                                                <td>{{$procedure->number}}</td>
                                                <td>{{$procedure->title}}</td>
                                                <td>{{$procedure->subcategory()->title}}</td>
                                                <td>{{$procedure->status}}</td>
                                                <td>{{$procedure->procurement_method}}</td>
                                                <td>{{$procedure->type}}</td>
                                                <td>{{$procedure->start}}</td>
                                                <td>{{$procedure->finish}}</td>
                                                <td><a class="btn btn-dark" href="{{ $procedure->url }}">Подать
                                                        предложение</a></td>
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
