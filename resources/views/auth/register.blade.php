@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Регистрация') }}</div>
                    <div class="card--text" style="padding: 20px;">
                        <h6 class="card-title" style="font-weight: 700; font-size: 150%;">
                            Уважаемые партнёры!
                            <br>
                            Добро пожаловать на страницу саморегистрации поставщиков ПАО «СИЛОВЫЕ МАШИНЫ Холдинг».

                        </h6>
                        <p class="card-title">
                            Прохождение регистрации у Вас займет несколько минут. Необходимо ввести основную информацию
                            о компании для передачи данных в ПАО «СИЛОВЫЕ МАШИНЫ Холдинг» ( см. инструкцию ). Для идентификации
                            компании требуется внести ИНН, КПП в разделе " Общая информация о компании ".

                            <br>
                            <br>

                            Обращаем Ваше внимание, что компания СИЛОВЫЕ МАШИНЫ работает в системе электронного документооборота.
                            Отсутствие электронной подписи на момент регистрации в системе не является блокирующим
                            фактором. Однако, в случае победы в конкурентных процедурах и в ходе подготовки к подписанию
                            контракта – одним из требований будет обязательное оформление участником в системе
                            электронного документооборота.

                            <br>
                            <br>

                            Сообщаем о невозможности промежуточного сохранения карточки регистрации, регистрацию
                            необходимо будет пройти до конца за один раз.

                            В случае возникновения вопросов просьба связаться со службой поддержки: +7 (495) 777-55-00
                            доб. 40-58 или по e-mail: srmsupport@sibur.ru
                            <br>
                            <br>


                            <span class="text-red">* </span> Поля, отмеченные <span class="text-red">* </span>, являются
                            обязательными</p>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('rsc') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">


                                <div class="col-md-12">

                                    <div class="card ">
                                        <div class="card-header">
                                            <h3 class="card-title">Общая информация о компании</h3>
                                        </div>

                                        <div class="card-body">


                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>Страна:</label>
                                                        <select name="country_id" class="form-control" required>
                                                            @foreach($countries as $country)
                                                                <option
                                                                    {{request()->session()->has('country_id') ? (request()->session()->get('country_id')[0] == $country->id ? 'selected' : '') : ''}} value="{{$country->id}}">
                                                                    {{$country->title}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>ИНН:</label>
                                                        <input type="text" name="inn"
                                                               value="{{request()->session()->get('inn')[0] ?? ""}}"
                                                               class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>КПП:</label>
                                                        <input type="text" name="kpp"
                                                               value="{{request()->session()->get('kpp')[0] ?? ""}}"
                                                               class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>ОГРН:</label>
                                                        <input type="text" name="ogrn"
                                                               value="{{request()->session()->get('ogrn')[0] ?? ""}}"
                                                               class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>ОКПО:</label>
                                                        <input type="text" name="okpo"
                                                               value="{{request()->session()->get('okpo')[0] ?? ""}}"
                                                               class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>Дата регистрации:</label>
                                                        <input type="date" name="date_registration"
                                                               value="{{request()->session()->get('date_registration')[0] ?? ""}}"
                                                               class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>Название:</label>
                                                        <input type="text" name="company_title"
                                                               value="{{request()->session()->get('company_title')[0] ?? ""}}"
                                                               class="form-control" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>Сокращённое
                                                            название:</label>
                                                        <input type="text" name="company_abbreviated_title"
                                                               value="{{request()->session()->get('company_abbreviated_title')[0] ?? ""}}"
                                                               class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Размер уставного капитала:</label>
                                                        <input type="number" name="initial_capital"
                                                               value="{{request()->session()->get('initial_capital')[0] ?? ""}}"
                                                               class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>Телефон общий:</label>
                                                        <input type="phone" name="shared_phone"
                                                               value="{{request()->session()->get('shared_phone')[0] ?? ""}}"
                                                               class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>Email общий:</label>
                                                        <input type="email" name="shared_email"
                                                               value="{{request()->session()->get('shared_email')[0] ?? ""}}"
                                                               class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Сайт:</label>
                                                        <input type="text" name="site"
                                                               value="{{request()->session()->get('site')[0] ?? ""}}"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">

                                                    <div class="form-group">
                                                        <h5>Почтовый адрес</h5>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                   name="mail_coincides_legal"
                                                                   {{request()->session()->has('mail_coincides_legal') ? 'checked' : ''}}
                                                                   id="exampleCheck2" value="1">
                                                            <label class="form-check-label" for="exampleCheck2">Совпадает
                                                                с юридическим</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Почтовый ящик:</label>
                                                        <input type="text" name="mailbox"
                                                               value="{{request()->session()->get('mailbox')[0] ?? ""}}"
                                                               class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">*  </span>Страна:</label>
                                                        <select name="mail_country_id" class="form-control" required>
                                                            @foreach($countries as $country)
                                                                <option
                                                                    {{request()->session()->has('mail_country_id') ? (request()->session()->get('mail_country_id')[0] == $country->id ? 'selected' : '') : ''}} value="{{$country->id}}">
                                                                    {{$country->title}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>Город
                                                            (поселок/село):</label>
                                                        <select name="mail_city_id" class="form-control" required>
                                                            @foreach($cities as $city)
                                                                <option
                                                                    {{request()->session()->has('mail_city_id') ? (request()->session()->get('mail_city_id')[0] == $city->id ? 'selected' : '') : ''}} value="{{$city->id}}">
                                                                    {{$city->title}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>Индекс:</label>
                                                        <input type="text" name="mail_index"
                                                               value="{{request()->session()->get('mail_index')[0] ?? ""}}"
                                                               class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>Улица:</label>
                                                        <input type="text" name="mail_street"
                                                               value="{{request()->session()->get('mail_street')[0] ?? ""}}"
                                                               class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>Номер дома:</label>
                                                        <input type="text" name="mail_home_number"
                                                               value="{{request()->session()->get('mail_home_number')[0] ?? ""}}"
                                                               class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Номер помещения:</label>
                                                        <input type="text" name="mail_room_number"
                                                               value="{{request()->session()->get('mail_room_number')[0] ?? ""}}"
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
                                                        <label><span class="text-red">*  </span>Страна:</label>
                                                        <select name="legal_country_id" class="form-control" required>
                                                            @foreach($countries as $country)
                                                                <option
                                                                    {{request()->session()->has('legal_country_id') ? (request()->session()->get('legal_country_id')[0] == $country->id ? 'selected' : '') : ''}} value="{{$country->id}}">
                                                                    {{$country->title}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>Город
                                                            (поселок/село):</label>
                                                        <select name="legal_city_id" class="form-control" required>
                                                            @foreach($cities as $city)
                                                                <option
                                                                    {{request()->session()->has('legal_city_id') ? (request()->session()->get('legal_city_id')[0] == $city->id ? 'selected' : '') : ''}} value="{{$city->id}}">
                                                                    {{$city->title}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>Индекс:</label>
                                                        <input type="text" name="legal_index"
                                                               value="{{request()->session()->get('legal_index')[0] ?? ""}}"
                                                               class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>Субъект:</label>
                                                        <input type="text" name="legal_subject"
                                                               value="{{request()->session()->get('legal_subject')[0] ?? ""}}"
                                                               class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>Улица:</label>
                                                        <input type="text" name="legal_street"
                                                               value="{{request()->session()->get('legal_street')[0] ?? ""}}"
                                                               class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>Номер дома:</label>
                                                        <input type="text" name="legal_home_number"
                                                               value="{{request()->session()->get('legal_home_number')[0] ?? ""}}"
                                                               class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Номер помещения:</label>
                                                        <input type="text" name="legal_room_number"
                                                               value="{{request()->session()->get('legal_room_number')[0] ?? ""}}"
                                                               class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6">

                                                    <div class="form-group">
                                                        <h5>Банковские данные</h5>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>Страна:</label>
                                                        <select name="bank_country_id" class="form-control" required>
                                                            @foreach($countries as $country)
                                                                <option
                                                                    {{request()->session()->has('bank_country_id') ? (request()->session()->get('bank_country_id')[0] == $country->id ? 'selected' : '') : ''}} value="{{$country->id}}">
                                                                    {{$country->title}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>БИК или SWIFT
                                                            банка:</label>
                                                        <input type="text" name="bank_bik_or_swift"
                                                               value="{{request()->session()->get('bank_bik_or_swift')[0] ?? ""}}"
                                                               class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>Номер расчётного
                                                            счёта:</label>
                                                        <input type="text" name="bank_current_account"
                                                               value="{{request()->session()->get('bank_current_account')[0] ?? ""}}"
                                                               class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>Валюта счёта:</label>
                                                        <select name="currency_id" class="form-control" required>
                                                            @foreach($currencies as $currency)
                                                                <option
                                                                    {{request()->session()->has('currency_id') ? (request()->session()->get('currency_id')[0] == $currency->id ? 'selected' : '') : ''}} value="{{$currency->id}}">
                                                                    {{$currency->title}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Название банка:</label>
                                                        <input type="text" name="bank_name"
                                                               value="{{request()->session()->get('bank_name')[0] ?? ""}}"
                                                               class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Корр. счёт:</label>
                                                        <input type="text" name="bank_corporate_account"
                                                               value="{{request()->session()->get('bank_corporate_account')[0] ?? ""}}"
                                                               class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Адрес банка:</label>
                                                        <input type="text" name="bank_address"
                                                               value="{{request()->session()->get('bank_address')[0] ?? ""}}"
                                                               class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>Банковские данные</h5>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input name="work_edo"

                                                                   type="checkbox" class="form-check-input"
                                                                   {{request()->session()->has('work_edo') ? 'checked' : ''}}
                                                                   id="exampleCheck2" value="1">
                                                            <label class="form-check-label" for="exampleCheck2">Согласен
                                                                работать по ЭДО</label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>


                            </div>
                            <div class="row">


                                <div class="col-md-12">

                                    <div class="card ">
                                        <div class="card-header">
                                            <h3 class="card-title">Контактное лицо</h3>
                                        </div>

                                        <div class="card-body">


                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>Фамилия:</label>
                                                        <input type="text" name="last_name" class="form-control"
                                                               required
                                                               value="{{request()->session()->get('last_name')[0] ?? ""}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>Имя:</label>
                                                        <input type="text" name="name" class="form-control" required
                                                               value="{{request()->session()->get('name')[0] ?? ""}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>Отчество:</label>
                                                        <input type="text" name="patronymic" class="form-control"
                                                               required
                                                               value="{{request()->session()->get('patronymic')[0] ?? ""}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>Должность:</label>
                                                        <input type="text" name="position" class="form-control"
                                                               required
                                                               value="{{request()->session()->get('position')[0] ?? ""}}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label>ИНН Физ. Лица:</label>
                                                        <input type="text" name="inn_physical_person"
                                                               class="form-control" required
                                                               value="{{request()->session()->get('inn_physical_person')[0] ?? ""}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">*  </span>№ телефона: / Внутренний
                                                            номер:</label>
                                                        <input type="phone" name="internal_phone" class="form-control"
                                                               required
                                                               value="{{request()->session()->get('last_name')[0] ?? ""}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label><span class="text-red">* </span>E-mail:</label>
                                                        <input type="email" name="email" class="form-control" required
                                                               value="{{request()->session()->get('email')[0] ?? ""}}">
                                                    </div>
                                                    {{--                                                    <div class="form-group">--}}
                                                    {{--                                                        <label><span class="text-red">* </span>Язык:</label>--}}
                                                    {{--                                                        <select name="language_id" class="form-control">--}}
                                                    {{--                                                            @foreach($languages as $language)--}}
                                                    {{--                                                                <option--}}
                                                    {{--                                                                    {{request()->session()->has('language_id') ? (request()->session()->get('language_id')[0] == $language->id ? 'selected' : '') : ''}} value="{{$language->id}}">--}}
                                                    {{--                                                                    {{$language->title}}--}}
                                                    {{--                                                                </option>--}}
                                                    {{--                                                            @endforeach--}}
                                                    {{--                                                        </select>--}}
                                                    {{--                                                    </div>--}}
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-12" style="position: relative">

                                    <div class="card">
                                        <div class="card-header">
                                            <div class="form-group">
                                                <select
                                                    id="categories"
                                                    name="categories[]"
                                                    multiple
                                                    class="form-control ">
                                                    @foreach($categories as $category)
                                                        <optgroup label="{{$category->title}}">
                                                            @foreach($category->getSubcategories() as $subcategory)
                                                                <option
                                                                    {{request()->session()->has('categories') ? (in_array($subcategory->id, request()->session()->get('categories')[0]) ? 'selected' : '') : ''}} value="{{$subcategory->id}}">{{$subcategory->title}}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <h3 class="card-title">Категории продуктов</h3>
                                        </div>

                                        <div class="card-body">
                                            @if ($selectedSubcategories != [])
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Название категории</th>
                                                        <th><span class="text-red">* </span>Тип поставщика</th>
                                                        <th style="width: 40px"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($selectedSubcategories as $subcategory)
                                                        <tr>
                                                            <td>{{$subcategory['title']}}</td>
                                                            <td>
                                                                <select name="category_type_{{$subcategory['id']}}"
                                                                        class="form-control select-action">
                                                                    <option
                                                                        {{request()->session()->has('category_type_' . $subcategory['id']) ? (request()->session()->get('category_type_' . $subcategory['id'])[0] == 'Производитель' ? 'selected' : '') : ''}} value="Производитель">
                                                                        Производитель
                                                                    </option>
                                                                    <option
                                                                        {{request()->session()->has('category_type_' . $subcategory['id']) ? (request()->session()->get('category_type_' . $subcategory['id'])[0] == 'Посредник' ? 'selected' : '') : ''}} value="Посредник">
                                                                        Посредник
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <button formnovalidate name="category_delete"
                                                                        value="{{$subcategory['id']}}"
                                                                        class="btn btn-outline-dark">Удалить
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            @else

                                                <p>
                                                    Категории продуктов не выбраны


                                                    Внимание, выбирайте корректные категории МТР/работ/услуг. Необходимо
                                                    выбирать именно те категории продуктов, которые готовы поставлять,
                                                    по
                                                    которым готовы выполнять работы/оказывать услуги. В случае, если Вы
                                                    выбрали категорию верхнего уровня, Вам автоматически выделятся
                                                    подкатегории нижних уровней.


                                                    В дальнейшем, по всем выбранным категориям Вам будут поступать
                                                    запросы
                                                    об участии в закупочных процедурах и подачи коммерческого
                                                    предложения.
                                                    Потенциально, это может привести к большому количеству писем в Ваш
                                                    адрес, который может рассматриваться как спам.


                                                    Рекомендуем Вам выбирать не более 10 категорий, остальные категории
                                                    сможете добавить после получения доступа к личному кабинету. Это
                                                    значительно упростит для Вас процедуру саморегистрации. Просим Вас
                                                    ответственно подойти к выбору категорий МТР/работ/услуг
                                                </p>
                                            @endif


                                        </div>

                                        {{--                                        <div class="card-footer clearfix">--}}
                                        {{--                                            <ul class="pagination pagination-sm m-0 float-right">--}}
                                        {{--                                                <li class="page-item"><a class="page-link" href="#">«</a></li>--}}
                                        {{--                                                <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
                                        {{--                                                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                                        {{--                                                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                                        {{--                                                <li class="page-item"><a class="page-link" href="#">»</a></li>--}}
                                        {{--                                            </ul>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Приложения (не обязательно для резидентов РФ)</h3>
                                            <br>
                                            <p class="card-text">Будьте готовы предоставить комплект
                                                правоустанавливающих документов в
                                                ходе участия в закупочных процедурах</p>
                                        </div>

                                        <div class="card-body">
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <label>Вид приложения:</label>
                                                    <select name="type_annex" id="" class="form-control">
                                                        @foreach($annexTypes as $type)
                                                            <option value="{{$type->id}}">{{$type->title}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label>Срок действия документа:</label>
                                                    <div
                                                        style="display: grid;  grid-template-columns: 1fr 1fr 1fr; gap: 20px ">
                                                        <div style="display: flex; flex-direction: row; gap: 10px">
                                                            <label class="form-check-label" for="">Начало:</label>
                                                            <input type="date" name="start_date">
                                                        </div>
                                                        <div style="display: flex; flex-direction: row; gap: 10px">
                                                            <label class="form-check-label" for="">Окончание:</label>
                                                            <input type="date" name="finish_date">
                                                        </div>
                                                        <div
                                                            style="display: flex; flex-direction: row; gap: 10px; margin-left: 20px">
                                                            <label class="form-check-label" for="">Бессрочный</label>
                                                            <input type="checkbox" class="form-check-input "
                                                                   checked name="indefinite" value="true">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div style="display: flex; flex-direction: row; gap: 10px">
                                                        <input type="file" name="file">
                                                        <button formnovalidate name="new_file" value="true"
                                                                class="btn btn-dark">Загрузить
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            {{--                                           :   Бессрочный:   Бессрочный    или    Начало:--}}
                                            {{--                                            Выбор даты--}}
                                            {{--                                            Окончание:--}}
                                            {{--                                            Выбор даты--}}
                                            @if(request()->session()->has('files') and request()->session()->get('files')[0] != [])
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Имя файла</th>
                                                        <th>Вид приложения</th>
                                                        <th>Срок действия документа</th>
                                                        <th style="width: 40px"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach(request()->session()->get('files')[0] as $key => $file)
                                                        <tr>
                                                            <td>{{$file['title']}}</td>
                                                            <td>{{$file['type_annex_title']}}</td>
                                                            <td>{{$file['indefinite'] == 'true' ? 'Бессрочный' : $file['start_date'] . ' - ' . $file['finish_date']}}</td>
                                                            <td>
                                                                <button formnovalidate name="file_delete"
                                                                        value="{{$key}}"
                                                                        class="btn btn-outline-dark">Удалить
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            @endif
                                        </div>

                                        {{--                                        <div class="card-footer clearfix">--}}
                                        {{--                                            <ul class="pagination pagination-sm m-0 float-right">--}}
                                        {{--                                                <li class="page-item"><a class="page-link" href="#">«</a></li>--}}
                                        {{--                                                <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
                                        {{--                                                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                                        {{--                                                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                                        {{--                                                <li class="page-item"><a class="page-link" href="#">»</a></li>--}}
                                        {{--                                            </ul>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">

                                <div class="col-md-6 offset-md-0">
                                    <div class="form-check">
                                        <a href="{{route('termsOfCooperation')}}" class="link">Условия сотрудничества</a>
                                        <br>
                                        <a href="{{route('storageOfPersonalData')}}" class="link">Согласие на обработку и хранение персональных
                                            данных</a>
                                        <br>
                                        <input required
                                               type="checkbox" class="form-check-input"
                                               id="exampleCheck2">
                                        <label class="form-check-label" for="exampleCheck2">

                                            Я даю согласие на хранение и обработку моих персональных данных</label>
                                    </div>
                                    <br>
                                    <button type="submit" name="register" value="true" class="btn btn-dark">
                                        {{ __('Продолжить') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>--}}
    {{--    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>--}}
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">--}}



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    {{--         <link--}}
    {{--            rel="stylesheet"--}}
    {{--            href="https://maxcdn.bootstrapcdn.com/bootstrap/5/css/bootstrap.min.css"--}}
    {{--        />--}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/1.1.2/js/bootstrap-multiselect.min.js"
            integrity="sha512-lxQ4VnKKW7foGFV6L9zlSe+6QppP9B2t+tMMaV4s4iqAv4iHIyXED7O+fke1VeLNaRdoVkVt8Hw/jmZ+XocsXQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/1.1.2/css/bootstrap-multiselect.css"
          integrity="sha512-tlP4yGOtHdxdeW9/VptIsVMLtgnObNNr07KlHzK4B5zVUuzJ+9KrF86B/a7PJnzxEggPAMzoV/eOipZd8wWpag=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>


    <script>
        $(document).ready(function () {
            $("#categories").multiselect({
                buttonText: function (options, select) {
                    return 'Добавить';
                },
                enableFiltering: true,
                enableClickableOptGroups: true,
                enableCollapsibleOptGroups: true,
                enableCaseInsensitiveFiltering: true,
                widthSynchronizationMode: true,
                searchText: 'Поиск',
                buttonWidth: '100%',
                templates: {
                    button: '<button type="button" class="multiselect dropdown-toggle btn btn-dark" data-bs-toggle="dropdown" aria-expanded="false"><span class="multiselect-selected-text"></span></button>',
                },
                onChange: () => {
                    $('form').submit()

                },

            });


        });
        $('.select-action').change(() => {
            $('form').submit()
        })
        $('button').change(() => {
            $('form').submit()
        })

    </script>
    <style>
        .multiselect-container.dropdown-menu {
            min-width: 100% !important;
        }
    </style>

@endsection
