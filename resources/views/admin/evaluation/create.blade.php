@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper" style="min-height: 1345.6px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title">Оценка поставки</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.evaluation.store', $shipment->id) }}" method="post">
                                @csrf
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Оперативность доставки:</label>
                                                <input type="number" value="5" name="speed" class="form-control col-3" required min="1" max="5">
                                            <br>
                                            <input placeholder="Комментарий" type="text" name="speed_comment" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Качество товаров/материалов:</label>
                                            <input type="number" value="5" name="quality" class="form-control col-3" required min="1" max="5">
                                            <br>
                                            <input placeholder="Комментарий" type="text" name="quality_comment" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Соблюдение условий контракта:</label>
                                            <input type="number" value="5" name="conditions" class="form-control col-3" required min="1" max="5">
                                            <br>
                                            <input placeholder="Комментарий" type="text" name="conditions_comment" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Уровень взаимодействия:</label>
                                            <input type="number" value="5" name="interaction" class="form-control col-3" required min="1" max="5">
                                            <br>
                                            <input placeholder="Комментарий" type="text" name="interaction_comment" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Комментарий</label>
                                            <textarea class="form-control" name="comment"></textarea>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-dark">Отправить</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->



                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->

                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
