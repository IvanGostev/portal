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

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="font-size: 14px!important;">
{{--                                <form class="row" action="">--}}
{{--                                    <div class="col-sm-12 col-md-2">--}}
{{--                                        <div>--}}
{{--                                            <div class="fw-bold fs-6">Категория</div>--}}
{{--                                            <div class="fht-cell">--}}
{{--                                                <div class="filter-control">--}}
{{--                                                    <select--}}
{{--                                                        class="form-select form-control bootstrap-table-filter-control-price "--}}
{{--                                                        style="width: 100%;" dir="ltr" name="status">--}}
{{--                                                        <option value="all">Все</option>--}}
{{--                                                        @foreach($suppliers as $supplier)--}}
{{--                                                            <option {{request()['supplier_id'] == $supplier->id ? 'selected' : '' }} value="{{$supplier->id}}">{{$supplier->title}} </option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    --}}{{--                                    <div class="col-sm-12 col-md-2">--}}
{{--                                    --}}{{--                                        <div >--}}
{{--                                    --}}{{--                                            <div class="fw-bold fs-6">Supplier</div>--}}
{{--                                    --}}{{--                                            <div class="fht-cell">--}}
{{--                                    --}}{{--                                                <div class="filter-control">--}}
{{--                                    --}}{{--                                                    <select--}}
{{--                                    --}}{{--                                                        class="form-select bootstrap-table-filter-control-price "--}}
{{--                                    --}}{{--                                                        style="width: 100%;" dir="ltr" name="supplier_id">--}}
{{--                                    --}}{{--                                                        <option value="all">All</option>--}}
{{--                                    --}}{{--                                                        @foreach($suppliers as $supplier)--}}
{{--                                    --}}{{--                                                            <option {{request()['supplier_id'] == $supplier->id ? 'selected' : '' }} value="{{$supplier->id}}">{{$supplier->title}}</option>--}}
{{--                                    --}}{{--                                                        @endforeach--}}
{{--                                    --}}{{--                                                    </select>--}}
{{--                                    --}}{{--                                                </div>--}}
{{--                                    --}}{{--                                            </div>--}}
{{--                                    --}}{{--                                        </div>--}}
{{--                                    --}}{{--                                    </div>--}}
{{--                                    --}}{{--                                    <div class="col-sm-12 col-md-3">--}}
{{--                                    --}}{{--                                        <div >--}}
{{--                                    --}}{{--                                            <div class="fw-bold fs-6">Start Date</div>--}}
{{--                                    --}}{{--                                            <div class="fht-cell">--}}
{{--                                    --}}{{--                                                <div class="filter-control">--}}
{{--                                    --}}{{--                                                    <input type="text"  name="date" class="form-control" value=" {{request()['date'] ?? '' }}">--}}
{{--                                    --}}{{--                                                </div>--}}
{{--                                    --}}{{--                                            </div>--}}
{{--                                    --}}{{--                                        </div>--}}
{{--                                    --}}{{--                                    </div>--}}
{{--                                    --}}{{--                                    <div class="col-sm-12 col-md-1">--}}
{{--                                    --}}{{--                                        <div >--}}
{{--                                    --}}{{--                                            <div class="fw-bold fs-6">Time</div>--}}
{{--                                    --}}{{--                                            <div class="fht-cell">--}}
{{--                                    --}}{{--                                                <div class="filter-control">--}}
{{--                                    --}}{{--                                                    <select--}}
{{--                                    --}}{{--                                                        class="form-select bootstrap-table-filter-control-price "--}}
{{--                                    --}}{{--                                                        style="width: 100%;" dir="ltr" name="time_id">--}}
{{--                                    --}}{{--                                                        <option value="all">All</option>--}}
{{--                                    --}}{{--                                                        @foreach($times as $time)--}}
{{--                                    --}}{{--                                                            <option {{request()['time_id'] == $time->id ? 'selected' : '' }} value="{{$time->id}}">{{substr($time->title, 0, -3)}}</option>--}}
{{--                                    --}}{{--                                                        @endforeach--}}
{{--                                    --}}{{--                                                    </select>--}}
{{--                                    --}}{{--                                                </div>--}}
{{--                                    --}}{{--                                            </div>--}}
{{--                                    --}}{{--                                        </div>--}}
{{--                                    --}}{{--                                    </div>--}}
{{--                                    --}}{{--                                    <div class="col-sm-12 col-md-1">--}}
{{--                                    --}}{{--                                        <div >--}}
{{--                                    --}}{{--                                            <div class="fw-bold fs-6">Gift</div>--}}
{{--                                    --}}{{--                                            <div class="fht-cell">--}}
{{--                                    --}}{{--                                                <div class="filter-control">--}}
{{--                                    --}}{{--                                                    <select--}}
{{--                                    --}}{{--                                                        class="form-select bootstrap-table-filter-control-price "--}}
{{--                                    --}}{{--                                                        style="width: 100%;" dir="ltr" name="gift">--}}
{{--                                    --}}{{--                                                        <option value="no">No</option>--}}
{{--                                    --}}{{--                                                        <option {{request()['gift'] =='yes' ? 'selected' : '' }} value="yes">Yes</option>--}}
{{--                                    --}}{{--                                                    </select>--}}
{{--                                    --}}{{--                                                </div>--}}
{{--                                    --}}{{--                                            </div>--}}
{{--                                    --}}{{--                                        </div>--}}
{{--                                    --}}{{--                                    </div>--}}
{{--                                    <div class="col-sm-12 col-md-1 d-flex gap-2">--}}
{{--                                        <button class="btn btn-secondary buttons-excel buttons-html5 p\" tabindex="0"--}}
{{--                                                aria-controls="example1" type="submit" name="typeB" value="search">--}}
{{--                                            <span>Search</span></button>--}}
{{--                                        <button class="btn btn-success buttons-excel buttons-html5 p\" tabindex="0"--}}
{{--                                                aria-controls="example1" type="submit" name="typeB" value="excel"><span>Excel</span>--}}
{{--                                        </button>--}}
{{--                                        <a class="btn btn-secondary buttons-excel buttons-html5 p\" tabindex="0"--}}
{{--                                           aria-controls="example1" href="{{back()}}"><span>Refresh</span></a>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
                                <br>

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
