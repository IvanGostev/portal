@extends('layouts.main')
@section('content')
    <div class="content-wrapper" style="min-height: 1302.4px;">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="font-size: 14px">
                            <div class="card-header">
                                <h3 class="card-title">Мои поставки</h3>
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
                                        <th>Удалить</th>
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
                                            <td>
                                                <form action="{{route('shipment.update', $shipment->id)}}" method="post">
                                                    @csrf
                                                    @method('patch')
                                                    <input type="date" name="date" class="form-control" value="{{$shipment->new_delivery_date}}" onchange="$(this).parent('form').submit()">
                                                </form>
                                            </td></td>
                                            <td>
                                                <form action="{{route('admin.provider.shipment.destroy', $shipment->id)}}" method="post">
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
    </div>
@endsection
