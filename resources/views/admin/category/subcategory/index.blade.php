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
                                <a href="{{ route('admin.category.subcategory.create', $category->id) }}" class="btn btn-block btn-outline-dark">Добавить</a>
                                <br>
                                <h3 class="card-title">Подкатегории для <span style="font-weight: bold">{{$category->title}}</span></h3>
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
                                    @foreach($subcategories as $subcategory)
                                        <tr>
                                            <td>{{$subcategory->title}}</td>
                                            <td>
                                                <a class="btn btn-dark btn-sm"
                                                   href="{{route('admin.category.subcategory.edit', $subcategory->id)}}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Редактировать
                                                </a>
                                            </td>

                                            <td>
                                                <form action="{{ route('admin.category.subcategory.destroy', $subcategory->id) }}"
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
                                    {{ $subcategories->links() }}
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
