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
                                    <div class="col-lg-3 col-6">
                                        <div class="small-box bg-dark">
                                            <div class="inner">
                                                <h3>{{getEv($evShow[1])}}</h3>
                                                <p>Первый параметр</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-bag"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="small-box bg-dark">
                                            <div class="inner">
                                                <h3>{{getEv($evShow[2])}}</h3>
                                                <p>Второй параметр</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-bag"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="small-box bg-dark">
                                            <div class="inner">
                                                <h3>{{getEv($evShow[3])}}</h3>
                                                <p>Третий параметр</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-bag"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="small-box bg-dark">
                                            <div class="inner">
                                                <h3>{{getEv($evShow[4])}}</h3>
                                                <p>Четвертый параметр</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-bag"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="small-box bg-dark">
                                            <div class="inner">
                                                <h3>{{getEv($evShow[5])}}</h3>
                                                <p>Пятый параметр</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-bag"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="small-box bg-dark">
                                            <div class="inner">
                                                <h3>{{getEv($evShow[6])}}</h3>
                                                <p>Шестой параметр</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-bag"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="small-box bg-dark">
                                            <div class="inner">
                                                <h3>{{getEv($evShow[7])}}</h3>
                                                <p>Седьмой параметр</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-bag"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="small-box bg-dark">
                                            <div class="inner">
                                                <h3>{{getEv($evShow[8])}}</h3>
                                                <p>Восьмой параметр</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-bag"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="small-box bg-dark">
                                            <div class="inner">
                                                <h3>{{getEv($evShow[9])}}</h3>
                                                <p>Девятый параметр</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-bag"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="small-box bg-dark">
                                            <div class="inner">
                                                <h3>{{getEv($evShow[10])}}</h3>
                                                <p>Десятый параметр</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-bag"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="small-box bg-dark">
                                            <div class="inner">
                                                <h3>{{getEv($evShow[11])}}</h3>
                                                <p>Одиннадцатый параметр</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-bag"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="small-box bg-dark">
                                            <div class="inner">
                                                <h3>{{getEv($evShow[12])}}</h3>
                                                <p>Двенадцатый параметр</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-bag"></i>
                                            </div>
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
