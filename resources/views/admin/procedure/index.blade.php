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
                               <div class="row">
                                   <div class="col-lg-4">
                                       <form class="row" action="{{route('admin.procedure.import')}}" method="post" enctype="multipart/form-data">
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
                                       <a href="{{route('admin.procedure.export')}}" class="btn btn-dark btn-block">Экспорт</a>
                                   </div>
                               </div>
                                <br>
                                <h3 class="card-title">Процедуры</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Название</th>
                                        <th>Категория</th>
                                        <th>Статус</th>
                                        <th>Способ закупки</th>
                                        <th>Тип</th>
                                        <th>Начало</th>
                                        <th>Конец</th>
                                        <th>URL</th>
                                        <th style="width: 40px">Удалить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($procedures as $procedure)
                                        <tr>
                                            <td>{{$procedure->title}}</td>
                                            <td>{{$procedure->subcategory()->title}}</td>
                                            <td>{{$procedure->status}}</td>
                                            <td>{{$procedure->procurement_method}}</td>
                                            <td>{{$procedure->type}}</td>
                                            <td>{{$procedure->start}}</td>
                                            <td>{{$procedure->finish}}</td>
                                            <td>{{$procedure->url}}</td>
                                            <td>
                                                <form action="{{ route('admin.procedure.destroy', $procedure->id) }}"
                                                      method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-dark btn-sm"><i
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
                                    {{ $procedures->links() }}
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
