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
                                <div class="row">
                                    <div class="col-lg-4">
                                        <form class="row" action="{{route('admin.shipment.import')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-6">
                                                <input type="file" name="file" class="form-control-file">
                                            </div>
                                            <div class="col-6">
                                                <button type="submit" name="import" value="true" class="btn btn-dark btn-block">Импорт</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="{{route('admin.shipment.export')}}" class="btn btn-dark btn-block">Экспорт</a>
                                    </div>
                                </div>
                                <br>
                                <h3 class="card-title">Поставки</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered" >
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
        <!-- /.content -->
    </div>
@endsection
