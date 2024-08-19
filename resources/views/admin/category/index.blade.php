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
                                <a href="{{ route('admin.category.create') }}" class="btn btn-block btn-outline-dark">Добавить</a>
                                <br>
                                <h3 class="card-title">Категории</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Название</th>
                                        <th style="width: 40px">Кол. подкатегорий</th>
                                        <th style="width: 40px">Смотреть подкатегории</th>
                                        <th style="width: 40px">Добавить подкатегорию</th>
                                        <th style="width: 40px">Редактировать</th>
                                        <th style="width: 40px">Удалить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$category->title}}</td>
                                            <td>{{$category->countSubcategories()}}</td>
                                            <td><a class="btn btn-dark btn-sm"
                                                   href="{{route('admin.category.subcategory.index', $category->id)}}">
                                                    Смотреть подкатегории
                                                </a></td>
                                            <td><a class="btn btn-dark btn-sm"
                                                   href="{{route('admin.category.subcategory.create', $category->id)}}">
                                                    Добавить подкатегорию
                                                </a></td>
                                            <td><a class="btn btn-dark btn-sm"
                                                   href="{{route('admin.category.edit', $category->id)}}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Редактировать
                                                </a>
                                            </td>

                                            <td>
                                                <form action="{{ route('admin.category.destroy', $category->id) }}"
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
                                    {{ $categories->links() }}
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
