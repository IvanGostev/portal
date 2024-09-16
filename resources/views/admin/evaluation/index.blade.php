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
                                <h3 class="card-title">Оценки</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <form class="row" action="{{route('admin.evaluation.import')}}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-6">
                                                <input type="file" name="file" class="form-control-file">
                                            </div>
                                            <div class="col-6">
                                                <button type="submit" name="import" value="true"
                                                        class="btn btn-dark btn-block">Импорт
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="{{route('admin.evaluation.export')}}" class="btn btn-dark btn-block">Экспорт</a>
                                    </div>
                                </div>
                                <br>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Компания</th>
                                        <th>Первый параметр</th>
                                        <th>Второй параметр</th>
                                        <th>Третий параметр</th>
                                        <th>Четвертый параметр</th>
                                        <th>Пятый параметр</th>
                                        <th>Шестой параметр</th>
                                        <th>Седьмой параметр</th>
                                        <th>Восьмой параметр</th>
                                        <th>Девятый параметр</th>
                                        <th>Десятый параметр</th>
                                        <th>Одиннадцатый параметр</th>
                                        <th>Двенадцатый параметр</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($evaluations as $item)
                                        <tr>
                                            <td>{{$item->user()->company_title}}</td>
                                            <td>{{$item->first_parameter}}</td>
                                            <td>{{$item->second_parameter}}</td>
                                            <td>{{$item->third_parameter}}</td>
                                            <td>{{$item->fourth_parameter}}</td>
                                            <td>{{$item->fifth_parameter}}</td>
                                            <td>{{$item->sixth_parameter}}</td>
                                            <td>{{$item->seventh_parameter}}</td>
                                            <td>{{$item->eighth_parameter}}</td>
                                            <td>{{$item->ninth_parameter}}</td>
                                            <td>{{$item->tenth_parameter}}</td>
                                            <td>{{$item->eleventh_parameter}}</td>
                                            <td>{{$item->twelfth_parameter}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                {{ $evaluations->links() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
