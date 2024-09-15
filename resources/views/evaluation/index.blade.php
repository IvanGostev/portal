@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <br>
                        <div class="card" style="font-size: 14px">
                            <div class="card-header">
                                <h3 class="card-title">Моя оценка</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div id="chart1">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div id="chart2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div id="chart3">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div id="chart4">
                                        </div>
                                    </div>
                                </div>

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
                                    <div class="col-sm-12 col-md-2">
                                        <div>
                                            <div class="fw-bold fs-6">Номер договора</div>
                                            <div class="fht-cell">
                                                <div class="filter-control">
                                                    <input type="text" value="{{request()['contract_number'] ?? ''}}"
                                                           name="contract_number" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <div>
                                            <div class="fw-bold fs-6">Номер заказа</div>
                                            <div class="fht-cell">
                                                <div class="filter-control">
                                                    <input type="text" value="{{request()['order_number'] ?? ''}}"
                                                           name="order_number" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <div>
                                            <div class="fw-bold fs-6">СПП-элемент</div>
                                            <div class="fht-cell">
                                                <div class="filter-control">
                                                    <input type="text" value="{{request()['spp_element'] ?? ''}}"
                                                           name="spp_element" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <div>
                                            <div class="fw-bold fs-6">Код номенклатуры</div>
                                            <div class="fht-cell">
                                                <div class="filter-control">
                                                    <input type="text" value="{{request()['code_num'] ?? ''}}"
                                                           name="code_num" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <div>
                                            <div class="fw-bold fs-6">Наименование номенклатуры</div>
                                            <div class="fht-cell">
                                                <div class="filter-control">
                                                    <input type="text" value="{{request()['title_num'] ?? ''}}"
                                                           name="title_num" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <div>
                                            <div class="fw-bold fs-6">Адрес грузополучателя</div>
                                            <div class="fht-cell">
                                                <div class="filter-control">
                                                    <input type="text" value="{{request()['address'] ?? ''}}"
                                                           name="address" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <div>
                                            <div class="fw-bold fs-6">Плановая дата поставки</div>
                                            <div class="fht-cell">
                                                <div class="filter-control">
                                                    <input type="date" value="{{request()['delivery_date'] ?? ''}}"
                                                           name="delivery_date" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <div>
                                            <div class="fw-bold fs-6">Новая плановая дата поставки</div>
                                            <div class="fht-cell">
                                                <div class="filter-control">
                                                    <input type="date" value="{{request()['new_delivery_date'] ?? ''}}"
                                                           name="new_delivery_date" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <div>
                                            <div class="fw-bold fs-6">Сортировка</div>
                                            <div class="fht-cell">
                                                <div class="filter-control">
                                                    <select
                                                        class="form-control bootstrap-table-filter-control-price"
                                                        style="width: 100%;" dir="ltr" name="sort">
                                                        <option value="no">Без</option>
                                                        <option
                                                            {{request()['status'] == 'delivery_date' ? 'selected' : '' }}  value="delivery_date">
                                                            Плановая дата поставки
                                                        </option>
                                                        <option
                                                            {{request()['status'] == 'new_delivery_date' ? 'selected' : '' }} value="new_delivery_date">
                                                            Новая плановая дата поставки
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
                                        <th>Категория</th>
                                        <th>Номер договора</th>
                                        <th>Номер заказа</th>
                                        <th>СПП-элемент</th>
                                        <th>Код номенклатуры</th>
                                        <th>Наименования номенклатуры</th>
                                        <th>Количество</th>
                                        <th>Единица измерения</th>
                                        <th>Адрес грузополучателя</th>
                                        <th>Плановая дата поставки</th>
                                        <th>Новая плановая дата поставки</th>
                                        <th>Оценка</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($shipments as $shipment)
                                        <tr>
                                            <td>{{$shipment->subcategory()->title}}</td>
                                            <td>{{$shipment->contract_number}}</td>
                                            <td>{{$shipment->order_number}}</td>
                                            <td>{{$shipment->spp_element}}</td>
                                            <td>{{$shipment->code_num}}</td>
                                            <td>{{$shipment->title_num}}</td>
                                            <td>{{$shipment->count}}</td>
                                            <td>{{$shipment->unit}}</td>
                                            <td>{{$shipment->address}}</td>
                                            <td>{{$shipment->delivery_date}}</td>
                                            <td>{{$shipment->new_delivery_date}}</td>
                                            <td>
                                                @if($shipment->evaluation())
                                                    <a class="btn btn-dark"
                                                       href="{{route('evaluation.show', $shipment->id)}}">Оценка</a>
                                                @endif
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
    </div>

@endsection
