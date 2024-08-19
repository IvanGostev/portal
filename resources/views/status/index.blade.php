@extends('layouts.main')
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
                    <div class="col-md-3">

                        <div class="card card-dark card-outline">
                            <div class="card-body box-profile">
                                <h3 class="profile-username text-center">{{auth()->user()->last_name . ' ' . auth()->user()->name}}</h3>
                                <p class="text-muted text-center">{{auth()->user()->position}}</p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Мой статус:</b> <a class="float-right">{{auth()->user()->status != 'activity' ? 'На модерации' : 'Активный'}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Категорий всего:</b> <a class="float-right">1,322</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Категорий на модерации:</b> <a class="float-right">543</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Категорий принятых:</b> <a class="float-right">13,287</a>
                                    </li>

                                </ul>
{{--                                <a href="#" class="btn btn-dark btn-block"><b>Follow</b></a>--}}
                            </div>

                        </div>


{{--                        <div class="card card-dark">--}}
{{--                            <div class="card-header">--}}
{{--                                <h3 class="card-title">About Me</h3>--}}
{{--                            </div>--}}

{{--                            <div class="card-body">--}}
{{--                                <strong><i class="fas fa-book mr-1"></i> Education</strong>--}}
{{--                                <p class="text-muted">--}}
{{--                                    B.S. in Computer Science from the University of Tennessee at Knoxville--}}
{{--                                </p>--}}
{{--                                <hr>--}}
{{--                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>--}}
{{--                                <p class="text-muted">Malibu, California</p>--}}
{{--                                <hr>--}}
{{--                                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>--}}
{{--                                <p class="text-muted">--}}
{{--                                    <span class="tag tag-danger">UI Design</span>--}}
{{--                                    <span class="tag tag-success">Coding</span>--}}
{{--                                    <span class="tag tag-info">Javascript</span>--}}
{{--                                    <span class="tag tag-warning">PHP</span>--}}
{{--                                    <span class="tag tag-dark">Node.js</span>--}}
{{--                                </p>--}}
{{--                                <hr>--}}
{{--                                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>--}}
{{--                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam--}}
{{--                                    fermentum enim neque.</p>--}}
{{--                            </div>--}}

{{--                        </div>--}}

                    </div>

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Сообщения
                                            по модерации</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#categories" data-toggle="tab">Категории</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline"
                                                            data-toggle="tab">Файлы</a></li>
{{--                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Личные--}}
{{--                                            данные</a></li>--}}
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">



                                        <div class="post clearfix">
                                            <div class="user-block">
                                                <span class="username"  style="margin-left: 0!important;">
<a href="#">Sarah Ross</a>
</span>
                                                <span class="description" style="margin-left: 0!important;">Категория: 53253</span>
                                            </div>

                                            <p>
                                                Lorem ipsum represents a long-held tradition for designers,
                                                typographers and the like. Some people hate it and argue for
                                                its demise, but others ignore the hate as they create awesome
                                                tools to help create filler text for everyone from bacon lovers
                                                to Charlie Sheen fans.
                                            </p>
                                            <form class="form-horizontal">
                                                <div class="input-group input-group-sm mb-0">
                                                    <input class="form-control form-control-sm" placeholder="Response">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-danger">Send</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>



                                    </div>
                                    <div class="tab-pane" id="categories">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Категории</h3>
                                            </div>

                                            <div class="card-body">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Название</th>
                                                        <th>Статус</th>
                                                        <th>Удалить</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr data-widget="expandable-table" aria-expanded="false">
                                                        <td>183</td>
                                                        <td>John Doe</td>
                                                        <td>11-7-2014</td>
                                                        <td>
                                                            <a href="" class="btn btn-dark">Удалить</a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        </div>
                                    <div class="tab-pane" id="timeline">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Файлы</h3>
                                            </div>

                                            <div class="card-body">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Тип</th>
                                                        <th>Посмотреть</th>
                                                        <th>Удалить</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr data-widget="expandable-table" aria-expanded="false">
                                                        <td>183</td>
                                                        <td>John Doe</td>
                                                        <td>
                                                            <a href="" class="btn btn-dark">Посмотреть</a>
                                                        </td>
                                                        <td>
                                                            <a href="" class="btn btn-dark">Удалить</a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
