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
                                <h3 class="profile-username text-center">{{auth()->user()->company_title}}</h3>
                                <p class="text-muted text-center">{{auth()->user()->last_name . ' ' . auth()->user()->name}}</p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item text-center align-items-center justify-content-center">
                                        <b>Мой статус</b>
                                        <br>
                                        <a class="float-right text-center">{{translateStatusAll(auth()->user()->status)}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    =
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Сообщения</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#categories" data-toggle="tab">Категории</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline"
                                                            data-toggle="tab">Приложения</a></li>
                                    {{--                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Личные--}}
                                    {{--                                            данные</a></li>--}}
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">


                                        <div class="post clearfix">
                                            <div class="card card-dark">
                                                <form class="form-horizontal" action="{{route('message.store')}}"
                                                      method="post">
                                                    @csrf
                                                    <input type="text" hidden name="for" value="0">
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Сообщение</label>
                                                            <div class="col-sm-12">
                                                                <textarea type="email" required class="form-control"
                                                                          placeholder="Текст ..."
                                                                          name="text"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-dark float-right">
                                                            Отправить
                                                        </button>
                                                    </div>

                                                </form>
                                            </div>
                                            @foreach($messages as $message)
                                                <div class="row"
                                                     style="background-color: #00000008; border-radius: 5px">

                                                    <div class="col-12">
                                                        <div class="user-block">
                                                <span class="username" style="margin-left: 0!important;">
<a href="#">{{$message->from != auth()->user()->id ? 'Модератор' : 'Вы'}}</a>
</span>
                                                        </div>

                                                        <p>{{$message->text}}</p>
                                                        @if($message->from != auth()->user()->id or $message->answer != null)
                                                            <form class="form-horizontal"
                                                                  action="{{route('message.answer', $message->id)}}"
                                                                  method="post">
                                                                @csrf
                                                                @method('patch')

                                                                <div class="input-group input-group mb-0">
                                                                    <input required
                                                                           class="form-control"
                                                                           {{$message->answer != null ? 'disabled' : '' }}
                                                                           name="answer" placeholder="Текст ..."
                                                                           value="{{$message->answer}}">

                                                                    @if($message->answer == null)
                                                                        <div class="input-group-append">
                                                                            <button type="submit" class="btn btn-dark">
                                                                                Отправить
                                                                            </button>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </form>
                                                        @endif

                                                    </div>

                                                </div>
                                                <br>
                                            @endforeach

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
                                                        <th>Тип</th>
                                                        <th>Статус</th>
                                                        <th>Удалить</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($userSubcategories as $usc)
                                                        <tr data-widget="expandable-table" aria-expanded="true">
                                                            <td>{{$usc->id}}</td>
                                                            <td>{{$usc->subcategory()->title}}</td>
                                                            <td>
                                                                <form action="{{route('category.update', $usc->id)}}"
                                                                      method="post">
                                                                    @csrf
                                                                    @method('patch')
                                                                    <select class="form-control" name="type"
                                                                            onchange="$(this).parent('form').submit()">
                                                                        <option
                                                                            {{$usc->type == 'Производитель' ? 'selected' : ''}} value="Производитель">
                                                                            Производитель
                                                                        </option>
                                                                        <option
                                                                            {{$usc->type == 'Посредник' ? 'selected' : ''}} value="Посредник">
                                                                            Посредник
                                                                        </option>
                                                                        <option
                                                                            {{$usc->type == 'Торговый дом' ? 'selected' : ''}} value="Торговый дом">
                                                                            Торговый дом
                                                                        </option>
                                                                    </select>
                                                                </form>
                                                            </td>
                                                            <td>{{translateStatus($usc->status)}}</td>
                                                            <td>
                                                                <form action="{{route('category.destroy', $usc->id)}}"
                                                                      method="post">
                                                                    @csrf
                                                                    <button class="btn btn-dark">Удалить</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                        @if ($usc->commnet != null)
                                                            <tr class="expandable-body">
                                                                <td colspan="5">
                                                                    <p style="height: auto; padding-top: 12px; margin-top: 0px; padding-bottom: 12px; margin-bottom: 16px;">
                                                                        {{$usc->commnet}}
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        @endif

                                                    @endforeach


                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="timeline">
                                        <div class="card">
                                            <div class="card-header">

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <form class="row" action="{{route('file.store')}}" method="post"
                                                              enctype="multipart/form-data">
                                                            @csrf

                                                            <div class="col-12">
                                                                <label for="">Описание (не обязательно)</label>
                                                                <textarea name="text" class="form-control"></textarea>
                                                                <br>
                                                            </div>
                                                            <div class="col-12 col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Срок действия документа:</label>
                                                                    <div
                                                                        style="display: grid;  grid-template-columns: 1fr 1fr 1fr; gap: 20px ">
                                                                        <div
                                                                            style="display: flex; flex-direction: row; gap: 10px">
                                                                            <label class="form-check-label" for="">Начало:</label>
                                                                            <input type="date" name="start">
                                                                        </div>
                                                                        <div
                                                                            style="display: flex; flex-direction: row; gap: 10px">
                                                                            <label class="form-check-label" for="">Окончание:</label>
                                                                            <input type="date" name="finish">
                                                                        </div>
                                                                        <div
                                                                            style="display: flex; flex-direction: row; gap: 10px; margin-left: 20px">
                                                                            <label class="form-check-label" for="">Бессрочный</label>
                                                                            <input type="checkbox"
                                                                                   class="form-check-input " checked=""
                                                                                   name="indefinite" value="true">
                                                                        </div>
                                                                        <div
                                                                            style="display: flex; flex-direction: row; gap: 10px">
                                                                            <label class="form-check-label" for="">Вид
                                                                                приложения:</label>
                                                                            <select name="annex_type_id"
                                                                                    class="form-control">
                                                                                @foreach($types as $type)
                                                                                    <option
                                                                                        value="{{$type->id}}">{{$type->title}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-8">
                                                                <input type="file" name="file"
                                                                       class="form-control-file">
                                                            </div>
                                                            <div class="col-4">
                                                                <button type="submit" name="import" value="true"
                                                                        class="btn btn-dark btn-block">Добавить
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <br>
                                                <h3 class="card-title">Приложения</h3>
                                            </div>

                                            <div class="card-body">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Тип</th>
                                                        <th>Описание</th>
                                                        <th>Продолжительность</th>
                                                        <th>Посмотреть</th>
                                                        <th>Удалить</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($files as $file)
                                                        <tr data-widget="expandable-table" aria-expanded="false">
                                                            <td>{{$file->id}}</td>
                                                            <td>{{$file->type()->title}}</td>
                                                            <td>{{$file->text}}</td>
                                                            <td>{{$file->indefinite ? 'Бессрочный' : $file->start . ' - ' . $file->finish}}</td>
                                                            <td>
                                                                <a href="{{asset($file->patch)}}"
                                                                   download="{{$file->type()->title}}"
                                                                   class="btn btn-dark">Посмотреть</a>
                                                            </td>
                                                            <td>

                                                                <form action="{{route('file.destroy', $file->id)}}"
                                                                      method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button class="btn btn-dark">Удалить</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
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
