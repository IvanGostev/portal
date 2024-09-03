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
                    <p  class="card-title">
                        Прохождение регистрации у Вас займет несколько минут. Необходимо ввести основную информацию о компании для передачи данных в ПАО «СИЛОВЫЕ МАШИНЫ Холдинг» ( см. инструкцию ). Для идентификации компании требуется внести ИНН, КПП в разделе " Общая информация о компании ".

                        <br>
                        <br>

                        Обращаем Ваше внимание, что компания Сибур работает в системе электронного документооборота. Отсутствие электронной подписи на момент регистрации в системе не является блокирующим фактором. Однако, в случае победы в конкурентных процедурах и в ходе подготовки к подписанию контракта – одним из требований будет обязательное оформление участником в системе электронного документооборота.

                        <br>
                        <br>

                        Сообщаем о невозможности промежуточного сохранения карточки регистрации, регистрацию необходимо будет пройти до конца за один раз.

                        В случае возникновения вопросов просьба связаться со службой поддержки: +7 (495) 777-55-00 доб. 40-58 или по e-mail: srmsupport@sibur.ru
                        <br>
                        <br>


                        * Поля, отмеченные *, являются обязательными</p>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __(' Страна: ') }}</label>

                            <div class="col-md-6">
                                <select name="country_id" class="form-control" >
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->title}}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __(' ИНН: ') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="inn" value="{{ old('inn') }}" required autocomplete="name" autofocus>

                                @error('inn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('КПП: ') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="kpp" value="{{ old('kpp') }}" required autocomplete="email">

                                @error('kpp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="spark" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Заполнить из СПАРК') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
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
@endsection
