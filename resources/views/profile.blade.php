@extends('layouts.main')
@section('content')
    <div class="content-wrapper" style="min-height: 1302.4px;">
        <div class="card">

            <div class="card-body">
                <form method="POST" action="{{ route('profile.update', auth()->user()->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
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
                                                            {{auth()->user()->country_id == $country->id ? 'selected' : 0}} value="{{$country->id}}" > {{$country->title}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-red">* </span>ИНН:</label>
                                                <input type="text" name="inn"
                                                       value="{{auth()->user()->inn}}"
                                               class=" form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-red">* </span>КПП:</label>
                                                <input type="text" name="kpp"
                                                       value="{{auth()->user()->kpp}}"
                                               class=" form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-red">* </span>ОГРН:</label>
                                                <input type="text" name="ogrn"
                                                       value="{{auth()->user()->ogrn}}"
                                               class=" form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-red">* </span>ОКПО:</label>
                                                <input type="text" name="okpo"
                                                       value="{{auth()->user()->okpo}}"
                                               class=" form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-red">* </span>Дата регистрации:</label>
                                                <input type="date" name="date_registration"
                                                       value="{{auth()->user()->date_registration}}"
                                               class=" form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-red">* </span>Название:</label>
                                                <input type="text" name="company_title"
                                                       value="{{auth()->user()->company_title}}"
                                               class=" form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label><span class="text-red">* </span>Сокращённое
                                                    название:</label>
                                                <input type="text" name="company_abbreviated_title"
                                                       value="{{auth()->user()->company_abbreviated_title}}"
                                               class=" form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Размер уставного капитала:</label>
                                                <input type="number" name="initial_capital"
                                                       value="{{auth()->user()->initial_capital}}"
                                               class=" form-control">
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-red">* </span>Телефон общий:</label>
                                                <input type="phone" name="shared_phone"
                                                       value="{{auth()->user()->shared_phone}}"
                                               class=" form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-red">* </span>Email общий:</label>
                                                <input type="email" name="shared_email"
                                                       value="{{auth()->user()->shared_email}}"
                                               class=" form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Сайт:</label>
                                                <input type="text" name="site"
                                                       value="{{auth()->user()->site}}"
                                               class=" form-control">
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
                                                    {{auth()->user()->mail_coincides_legal ? 'checked' : ''}}
                                                    <label class="form-check-label" for="exampleCheck2">Совпадает
                                                        с юридическим</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Почтовый ящик:</label>
                                                <input type="text" name="mailbox"
                                                       value="{{auth()->user()->mailbox}}"
                                               class=" form-control">
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-red">*  </span>Страна:</label>
                                                <select name="mail_country_id" class="form-control" required>
                                                    @foreach($countries as $country)
                                                        <option
                                                            {{auth()->user()->mail_country_id == $country->id ? 'selected' : ''}} value="{{$country->id}}">{{$country->title}}
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
                                                            {{auth()->user()->mail_city_id == $city->id ? 'selected' : ''}} value="{{$city->id}}"> {{$city->title}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-red">* </span>Индекс:</label>
                                                <input type="text" name="mail_index"
                                                       value="{{auth()->user()->mail_index}}"
                                                       class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-red">* </span>Улица:</label>
                                                <input type="text" name="mail_street"
                                                       value="{{auth()->user()->mail_street}}"
                                                       class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-red">* </span>Номер дома:</label>
                                                <input type="text" name="mail_home_number"
                                                       value="{{auth()->user()->mail_home_number}}"
                                                       class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Номер помещения:</label>
                                                <input type="text" name="mail_room_number"
                                                       value="{{auth()->user()->mail_room_number}}"
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
                                                            {{auth()->user()->legal_country_id == $country->id ? 'selected' : ''}} value="{{$country->id}}"> {{$country->title}}
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
                                                            {{ auth()->user()->legal_city_id == $city->id ? 'selected' : ''}} value="{{$city->id}}" > {{$city->title}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-red">* </span>Индекс:</label>
                                                <input type="text" name="legal_index"
                                                       value="{{auth()->user()->legal_index}}"
                                                       class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-red">* </span>Субъект:</label>
                                                <input type="text" name="legal_subject"
                                                       value="{{auth()->user()->legal_subject}}"
                                                       class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-red">* </span>Улица:</label>
                                                <input type="text" name="legal_street"
                                                       value="{{auth()->user()->legal_street}}"
                                                       class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-red">* </span>Номер дома:</label>
                                                <input type="text" name="legal_home_number"
                                                       value="{{auth()->user()->legal_home_number}}"
                                                       class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Номер помещения:</label>
                                                <input type="text" name="legal_room_number"
                                                       value="{{auth()->user()->legal_room_number}}"
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
                                                            {{auth()->user()->bank_country_id == $country->id ? 'selected' : ''}} value="{{$country->id}}"> {{$country->title}}
                                                        </option>

                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label><span class="text-red">* </span>БИК или SWIFT
                                                    банка:</label>
                                                <input type="text" name="bank_bik_or_swift"
                                                       value="{{auth()->user()->bank_bik_or_swift}}"
                                                       class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-red">* </span>Номер расчётного
                                                    счёта:</label>
                                                <input type="text" name="bank_current_account"
                                                       value="{{auth()->user()->bank_current_account}}"
                                                       class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-red">* </span>Валюта счёта:</label>
                                                <select name="currency_id" class="form-control" required>
                                                    @foreach($currencies as $currency)
                                                        <option
                                                            {{auth()->user()->currency_id == $currency->id ? 'selected' : ''}} value="{{$currency->id}}">  {{$currency->title}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Название банка:</label>
                                                <input type="text" name="bank_name"
                                                       value="{{auth()->user()->bank_name}}"
                                                       class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Корр. счёт:</label>
                                                <input type="text" name="bank_corporate_account"
                                                       value="{{auth()->user()->bank_corporate_account}}"
                                                       class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Адрес банка:</label>
                                                <input type="text" name="bank_address"
                                                       value="{{auth()->user()->bank_address}}"
                                                       class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <h5>Банковские данные</h5>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input name="work_edo" type="checkbox"
                                                           class="form-check-input" {{auth()->user()->work_edo ? 'checked' : ''}}>
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
                                                       value="{{auth()->user()->last_name}}">
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-red">* </span>Имя:</label>
                                                <input type="text" name="name" class="form-control" required
                                                       value="{{auth()->user()->name}}">
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-red">* </span>Отчество:</label>
                                                <input type="text" name="patronymic" class="form-control"
                                                       required
                                                       value="{{auth()->user()->patronymic}}">
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-red">* </span>Должность:</label>
                                                <input type="text" name="position" class="form-control"
                                                       required
                                                       value="{{auth()->user()->position}}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>ИНН Физ. Лица:</label>
                                                <input type="text" name="inn_physical_person"
                                                       class="form-control" required
                                                       value="{{auth()->user()->inn_physical_person}}">
                                            </div>
                                            <div class="form-group">
                                                <label><span class="text-red">*  </span>№ телефона: / Внутренний
                                                    номер:</label>
                                                <input type="phone" name="internal_phone" class="form-control" required
                                                       value="{{auth()->user()->last_name}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" row mb-0">

                        <div class="col-md-6 offset-md-0">
                            <div class="form-check">
                                <a href="/" class="link">Условия сотрудничества</a>
                                <br>
                                <a href="/" class="link">Согласие на обработку и хранение
                                    персональных
                                    данных</a>
                                <br>
                                <input required
                                       type="checkbox" class="form-check-input"
                                       id="exampleCheck2">
                                <label class="form-check-label" for="exampleCheck2">

                                    Я даю согласие на хранение и обработку моих персональных
                                    данных</label>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-dark">{{ __('Обновить') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
