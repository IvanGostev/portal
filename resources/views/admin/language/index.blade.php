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
                                <a href="{{ route('admin.language.create') }}" class="btn btn-block btn-outline-dark">Добавить</a>
                                <br>
                                <h3 class="card-title">Языки</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Название</th>
                                        <th style="width: 40px">Редактировать</th>
                                        <th style="width: 40px">Удалить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($languages as $language)
                                        <tr>
                                            <td>{{$language->title}}</td>
                                            <td>
                                                <a class="btn btn-dark btn-sm"
                                                   href="{{route('admin.language.edit', $language->id)}}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Редактировать
                                                </a>
                                            </td>

                                            <td>
                                                <form action="{{ route('admin.language.destroy', $language->id) }}"
                                                      method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="mit" class="btn btn-dark btn-sm"><i
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
                                    {{ $languages->links() }}
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
