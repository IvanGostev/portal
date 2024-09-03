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
                    <div class="col-md-3">

                        <div class="card card-dark card-outline">
                            <div class="card-body box-profile">
                                <h3 class="profile-username text-center">{{$user->company_title}}</h3>
                                <p class="text-muted text-center">{{$user->last_name . ' ' . $user->name}}</p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item text-center">
                                        <b>Статус поставщика:</b>
                                        <br>
                                        <form action="{{route('admin.company.statusUpdate', $user->id)}}" method="post">
                                            @csrf
                                            @method('patch')
                                            <select name="status" class="form-control"  onchange="$(this).parent('form').submit()">
                                                <option
                                                    {{$user->status == 'moderation' ? 'selected' : 0}} value="moderation">{{translateStatusAll('moderation')}}</option>
                                                <option
                                                    {{$user->status == 'document' ? 'selected' : 0}} value="document">{{translateStatusAll('document')}}</option>
                                                <option
                                                    {{$user->status == 'audit' ? 'selected' : 0}} value="audit">{{translateStatusAll('audit')}}</option>
                                                <option
                                                    {{$user->status == 'approved' ? 'selected' : 0}} value="approved">{{translateStatusAll('approved')}}</option>
                                                <option
                                                    {{$user->status == 'cancelled' ? 'selected' : 0}} value="cancelled">{{translateStatusAll('cancelled')}}</option>
                                            </select>
                                        </form>
                                    </li>


                                </ul>
                            </div>

                        </div>


                    </div>

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Сообщения
                                            по модерации</a></li>
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
                                                    <input type="text" hidden name="for" value="{{$user->id}}">
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
                                                <div class="row">

                                                    <div class="col-12">
                                                        <div class="user-block">
                                                <span class="username" style="margin-left: 0!important;">
<a href="#">{{$message->from != auth()->user()->id ? 'Поставщик' : 'Вы'}}</a>
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
                                                        <br>
                                                    </div>

                                                </div>

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
                                                                {{$usc->type}}
                                                            </td>
                                                            <td>
                                                                <form action="{{route('admin.company.statusCategoryUpdate', $usc->id)}}"
                                                                      method="post">
                                                                    @csrf
                                                                    @method('patch')
                                                                    <select class="form-control" name="status"
                                                                            onchange="$(this).parent('form').submit()">
                                                                        <option
                                                                            {{$usc->status == 'moderation' ? 'selected' : ''}} value="moderation">
                                                                            {{translateStatus('moderation')}}
                                                                        </option>
                                                                        <option
                                                                            {{$usc->status == 'document' ? 'selected' : ''}} value="document">
                                                                            {{translateStatus('document')}}
                                                                        </option>
                                                                        <option
                                                                            {{$usc->status == 'audit' ? 'selected' : ''}} value="audit">
                                                                            {{translateStatus('audit')}}
                                                                        </option>
                                                                        <option
                                                                            {{$usc->status == 'approved' ? 'selected' : ''}} value="approved">
                                                                            {{translateStatus('approved')}}
                                                                        </option>
                                                                        <option
                                                                            {{$usc->status == 'cancelled' ? 'selected' : ''}} value="cancelled">
                                                                            {{translateStatus('cancelled')}}
                                                                        </option>
                                                                    </select>
                                                                </form>
                                                            </td>
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
