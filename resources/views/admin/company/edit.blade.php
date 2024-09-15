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
                                            <select name="status" class="form-control"
                                                    onchange="$(this).parent('form').submit()">
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
                                    <li class="nav-item"><a class="nav-link" href="#company" data-toggle="tab">
                                            Данные</a></li>
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
                                                        <th>№</th>
                                                        <th>Название</th>
                                                        <th>Тип</th>
                                                        <th>Статус</th>
                                                        <th>Дата подачи</th>
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
                                                                <form
                                                                    action="{{route('admin.company.statusCategoryUpdate', $usc->id)}}"
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
                                                            <td>{{$usc->created_at}}</td>
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
                                                        <th>№</th>
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
                                    <div class="tab-pane" id="company">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Общая информация о компании</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Страна:</label>
                                                            <input disabled class="form-control"
                                                                   value="{{$user->country()->title}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>ИНН:</label>
                                                            <input disabled type="text" name="inn"
                                                                   value="{{$user->inn}}"
                                                                   class=" form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>КПП:</label>
                                                            <input disabled type="text" name="kpp"
                                                                   value="{{$user->kpp}}"
                                                                   class=" form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>ОГРН:</label>
                                                            <input disabled type="text" name="ogrn"
                                                                   value="{{$user->ogrn}}"
                                                                   class=" form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>ОКПО:</label>
                                                            <input disabled type="text" name="okpo"
                                                                   value="{{$user->okpo}}"
                                                                   class=" form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Дата
                                                                регистрации:</label>
                                                            <input disabled type="date" name="date_registration"
                                                                   value="{{$user->date_registration}}"
                                                                   class=" form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Название:</label>
                                                            <input disabled type="text" name="company_title"
                                                                   value="{{$user->company_title}}"
                                                                   class=" form-control" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Сокращённое
                                                                название:</label>
                                                            <input disabled type="text" name="company_abbreviated_title"
                                                                   value="{{$user->company_abbreviated_title}}"
                                                                   class=" form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Размер уставного капитала:</label>
                                                            <input disabled type="number" name="initial_capital"
                                                                   value="{{$user->initial_capital}}"
                                                                   class=" form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Телефон
                                                                общий:</label>
                                                            <input disabled type="phone" name="shared_phone"
                                                                   value="{{$user->shared_phone}}"
                                                                   class=" form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email общий:</label>
                                                            <input disabled type="email" name="shared_email"
                                                                   value="{{$user->shared_email}}"
                                                                   class=" form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Сайт:</label>
                                                            <input disabled type="text" name="site"
                                                                   value="{{$user->site}}"
                                                                   class=" form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">

                                                        <div class="form-group">
                                                            <h5>Почтовый адрес</h5>
                                                        </div>
                                                        <div class="form-group">

                                                            <label>Совпадает
                                                                с юридическим</label>
                                                            <input disabled type="text"
                                                                   value="{{$user->mail_coincides_legal ? "ДА" : 'НЕТ'}}"
                                                                   class="form-control">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Почтовый ящик:</label>
                                                            <input disabled type="text" name="mailbox"
                                                                   value="{{$user->mailbox}}"
                                                                   class=" form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Страна:</label>
                                                            <input disabled class="form-control" type="text"
                                                                   value="{{$user->countryMail()->title}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Город
                                                                (поселок/село):</label>
                                                            <input disabled type="text" class="form-control"
                                                                   value="{{$user->cityMail()->title}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Индекс:</label>
                                                            <input disabled type="text" name="mail_index"
                                                                   value="{{$user->mail_index}}"
                                                                   class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Улица:</label>
                                                            <input disabled type="text" name="mail_street"
                                                                   value="{{$user->mail_street}}"
                                                                   class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Номер дома:</label>
                                                            <input disabled type="text" name="mail_home_number"
                                                                   value="{{$user->mail_home_number}}"
                                                                   class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Номер помещения:</label>
                                                            <input disabled type="text" name="mail_room_number"
                                                                   value="{{$user->mail_room_number}}"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">

                                                        <div class="form-group">
                                                            <h5>Юридический адрес</h5>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Страна:</label>
                                                            <input disabled type="text" class="form-control"
                                                                   value="{{$user->countryLegal()->title}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Город
                                                                (поселок/село):</label>
                                                            <input disabled class="form-control" type="text"
                                                                   value="{{$user->cityLegal()->title}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Индекс:</label>
                                                            <input disabled type="text" name="legal_index"
                                                                   value="{{$user->legal_index}}"
                                                                   class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Субъект:</label>
                                                            <input disabled type="text" name="legal_subject"
                                                                   value="{{$user->legal_subject}}"
                                                                   class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Улица:</label>
                                                            <input disabled type="text" name="legal_street"
                                                                   value="{{$user->legal_street}}"
                                                                   class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Номер дома:</label>
                                                            <input disabled type="text" name="legal_home_number"
                                                                   value="{{$user->legal_home_number}}"
                                                                   class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Номер помещения:</label>
                                                            <input disabled type="text" name="legal_room_number"
                                                                   value="{{$user->legal_room_number}}"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">

                                                        <div class="form-group">
                                                            <h5>Банковские данные</h5>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Страна:</label>
                                                            <input disabled class="form-control" type="text"
                                                                   value="{{$user->countryBank()->title}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>БИК или SWIFT
                                                                банка:</label>
                                                            <input disabled type="text" name="bank_bik_or_swift"
                                                                   value="{{$user->bank_bik_or_swift}}"
                                                                   class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Номер расчётного
                                                                счёта:</label>
                                                            <input disabled type="text" name="bank_current_account"
                                                                   value="{{$user->bank_current_account}}"
                                                                   class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Валюта счёта:</label>
                                                            <input disabled class="form-control" type="text"
                                                                   value="{{$user->currency()->title}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Название банка:</label>
                                                            <input disabled type="text" name="bank_name"
                                                                   value="{{$user->bank_name}}"
                                                                   class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Корр. счёт:</label>
                                                            <input disabled type="text" name="bank_corporate_account"
                                                                   value="{{$user->bank_corporate_account}}"
                                                                   class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Адрес банка:</label>
                                                            <input disabled type="text" name="bank_address"
                                                                   value="{{$user->bank_address}}"
                                                                   class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Согласен работать по ЭДО</label>
                                                            <input disabled type="text"
                                                                   value="{{$user->work_edo ? "ДА" : 'НЕТ'}}"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Фамилия:</label>
                                                            <input disabled type="text" name="last_name" class="form-control"
                                                                   required
                                                                   value="{{$user->last_name}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Имя:</label>
                                                            <input disabled type="text" name="name" class="form-control" required
                                                                   value="{{$user->name}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Отчество:</label>
                                                            <input disabled type="text" name="patronymic" class="form-control"
                                                                   required
                                                                   value="{{$user->patronymic}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Должность:</label>
                                                            <input disabled type="text" name="position" class="form-control"
                                                                   required
                                                                   value="{{$user->position}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>ИНН Физ. Лица:</label>
                                                            <input disabled type="text" name="inn_physical_person"
                                                                   class="form-control" required
                                                                   value="{{$user->inn_physical_person}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>№ телефона: /
                                                                Внутренний
                                                                номер:</label>
                                                            <input disabled type="phone" name="internal_phone"
                                                                   class="form-control"
                                                                   required
                                                                   value="{{$user->last_name}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>E-mail:</label>
                                                            <input disabled type="email" name="email" class="form-control"
                                                                   required
                                                                   value="{{$user->email}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
