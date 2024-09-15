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
                        <div class="card" style="font-size: 14px">
                            <div class="card-header">
                                <h3 class="card-title">Завершенные поставки</h3>
                            </div>
                            <div class="card-body">
                                <form class="row">
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
                                        <th>Номер поставки</th>
                                        <th>Название поставщика (компании)</th>
                                        <th>Описание товара</th>
                                        <th>Количество</th>
                                        <th>Плановая дата поставки</th>
                                        <th>Новая плановая дата поставки</th>
                                        <th>Оценка</th>
                                        <th>Удалить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($shipments as $shipment)
                                        <tr>
                                            <td>{{$shipment->number}}</td>
                                            <td>{{$shipment->user()->company_title}}</td>
                                            <td>{{$shipment->descirption}}</td>
                                            <td>{{$shipment->count}}</td>
                                            <td>{{$shipment->delivery_date}}</td>
                                            <td>{{$shipment->new_delivery_date}}</td>
                                            <td>
                                                @if($shipment->evaluation())
                                                    <a class="btn btn-outline-dark"
                                                       href="{{ route('admin.evaluation.edit', $shipment->evaluation()->id) }}">Изменить
                                                        оценку</a>
                                                @else
                                                    <a class="btn btn-outline-dark"
                                                       href="{{ route('admin.evaluation.create', $shipment->id) }}">Оценить</a>
                                                @endif
                                            </td>
                                            <td>
                                                <form
                                                    action="{{route('admin.provider.shipment.destroy', $shipment->id)}}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-dark" type="submit">Удалить</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                {{ $shipments->links() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
