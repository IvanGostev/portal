@extends('admin.layouts.main-small')
@section('content')
    <main class="page">
        <section class="settings">
            <div class="settings__container container">

                <div class="settings__content tabs">
                    <div class="settings__blocks">
                        <form action="{{ route('admin.user.update', $user->id) }}" method="post" class="settings__body tab-content active">
                            @method('patch')
                            @csrf
                            <div class="settings__sections">
                                <div class="settings__section">
                                    <h2 class="settings__caption">
                                        Profile details
                                    </h2>
                                    <div class="settings__row">
                                        <div class="form__row">
                                            <div class="form__label">
                                                First Name
                                            </div>
                                            <input type="text" name="first_name" class="form__input" placeholder="Enter your name" value="{{$user->first_name}}">
                                        </div>
                                        <div class="form__row">
                                            <div class="form__label">
                                                Last Name
                                            </div>
                                            <input type="text" name="last_name" class="form__input" placeholder="Enter your lasname" value="{{$user->last_name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="settings__section">
                                    <h2 class="settings__caption">
                                        Contact details
                                    </h2>
                                    <div class="settings__row">
                                        <div class="form__row">
                                            <div class="form__label">
                                                E-mail
                                            </div>
                                                <input type="email" name="email" class="form__input" value="{{$user->email}}">
                                        </div>
                                        <div class="form__row">
                                            <div class="form__label">
                                                Mobile Phone
                                            </div>
                                            <input type="tel" name="phone" class="form__input" value="{{$user->phone}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="settings__section">
                                    <h2 class="settings__caption">
                                        Date of birth
                                    </h2>
                                    <div class="settings__row settings__row-lg">
                                        <div class="form__row">
                                            <div class="form__label">
                                                Day
                                            </div>
                                            <div class="form__select">
                                                <select name="day" class="question-select">
                                                    <option value="">Day</option>
                                                    <option {{$user->day == 1 ? "selected" : ''}} value="1">1</option>
                                                    <option {{$user->day == 2 ? "selected" : ''}} value="2">2</option>
                                                    <option {{$user->day == 3 ? "selected" : ''}} value="3">3</option>
                                                    <option {{$user->day == 4 ? "selected" : ''}} value="4">4</option>
                                                    <option {{$user->day == 5 ? "selected" : ''}} value="5">5</option>
                                                    <option {{$user->day == 6 ? "selected" : ''}} value="6">6</option>
                                                    <option {{$user->day == 7 ? "selected" : ''}} value="7">7</option>
                                                    <option {{$user->day == 8 ? "selected" : ''}} value="8">8</option>
                                                    <option {{$user->day == 9 ? "selected" : ''}} value="9">9</option>
                                                    <option {{$user->day == 10 ? "selected" : ''}} value="10">10</option>
                                                    <option {{$user->day == 11 ? "selected" : ''}} value="11">11</option>
                                                    <option {{$user->day == 12 ? "selected" : ''}} value="12">12</option>
                                                    <option {{$user->day == 13 ? "selected" : ''}} value="13">13</option>
                                                    <option {{$user->day == 14 ? "selected" : ''}} value="14">14</option>
                                                    <option {{$user->day == 15 ? "selected" : ''}} value="15">15</option>
                                                    <option {{$user->day == 16 ? "selected" : ''}} value="16">16</option>
                                                    <option {{$user->day == 17 ? "selected" : ''}} value="17">17</option>
                                                    <option {{$user->day == 18 ? "selected" : ''}} value="18">18</option>
                                                    <option {{$user->day == 19 ? "selected" : ''}} value="19">19</option>
                                                    <option {{$user->day == 20 ? "selected" : ''}} value="20">20</option>
                                                    <option {{$user->day == 21 ? "selected" : ''}} value="21">21</option>
                                                    <option {{$user->day == 22 ? "selected" : ''}} value="22">22</option>
                                                    <option {{$user->day == 23 ? "selected" : ''}} value="23">23</option>
                                                    <option {{$user->day == 24 ? "selected" : ''}} value="24">24</option>
                                                    <option {{$user->day == 25 ? "selected" : ''}} value="25">25</option>
                                                    <option {{$user->day == 26 ? "selected" : ''}} value="26">26</option>
                                                    <option {{$user->day == 27 ? "selected" : ''}} value="27">27</option>
                                                    <option {{$user->day == 28 ? "selected" : ''}} value="28">28</option>
                                                    <option {{$user->day == 29 ? "selected" : ''}} value="29">29</option>
                                                    <option {{$user->day == 30 ? "selected" : ''}} value="30">30</option>
                                                    <option {{$user->day == 31 ? "selected" : ''}} value="31">31</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form__row">
                                            <div class="form__label">
                                                Month
                                            </div>
                                            <div class="form__select" >
                                                <select name="month" class="question-select month-select" id="city_id">
                                                    <option value="">Month</option>
                                                    <option {{$user->month == 1 ? 'selected' : ''}} value="1">January</option>
                                                    <option {{$user->month == 2 ? 'selected' : ''}} value="2">February</option>
                                                    <option {{$user->month == 3 ? 'selected' : ''}} value="3">March</option>
                                                    <option {{$user->month == 4 ? 'selected' : ''}} value="4">April</option>
                                                    <option {{$user->month == 5 ? 'selected' : ''}} value="5">May</option>
                                                    <option {{$user->month == 6 ? 'selected' : ''}} value="6">June</option>
                                                    <option {{$user->month == 7 ? 'selected' : ''}} value="7">July</option>
                                                    <option {{$user->month == 8 ? 'selected' : ''}} value="8">August</option>
                                                    <option {{$user->month == 9 ? 'selected' : ''}} value="9">September</option>
                                                    <option {{$user->month == 10 ? 'selected' : ''}} value="10">October</option>
                                                    <option {{$user->month == 11 ? 'selected' : ''}} value="11">November</option>
                                                    <option {{$user->month == 12 ? 'selected' : ''}} value="12">December</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form__row">
                                            <div class="form__label">
                                                Year
                                            </div>
                                            <div class="form__select">
                                                <select name="year" class="question-select">
                                                    <option value="">Year</option>
                                                    <option {{$user->year == 2024 ? 'selected' : ''}} value="2024">2024</option>
                                                    <option {{$user->year == 2023 ? 'selected' : ''}} value="2023">2023</option>
                                                    <option {{$user->year == 2022 ? 'selected' : ''}} value="2022">2022</option>
                                                    <option {{$user->year == 2021 ? 'selected' : ''}} value="2021">2021</option>
                                                    <option {{$user->year == 2020 ? 'selected' : ''}} value="2020">2020</option>
                                                    <option {{$user->year == 2019 ? 'selected' : ''}} value="2019">2019</option>
                                                    <option {{$user->year == 2018 ? 'selected' : ''}} value="2018">2018</option>
                                                    <option {{$user->year == 2017 ? 'selected' : ''}} value="2017">2017</option>
                                                    <option {{$user->year == 2016 ? 'selected' : ''}} value="2016">2016</option>
                                                    <option {{$user->year == 2015 ? 'selected' : ''}} value="2015">2015</option>
                                                    <option {{$user->year == 2014 ? 'selected' : ''}} value="2014">2014</option>
                                                    <option {{$user->year == 2013 ? 'selected' : ''}} value="2013">2013</option>
                                                    <option {{$user->year == 2012 ? 'selected' : ''}} value="2012">2012</option>
                                                    <option {{$user->year == 2011 ? 'selected' : ''}} value="2011">2011</option>
                                                    <option {{$user->year == 2010 ? 'selected' : ''}} value="2010">2010</option>
                                                    <option {{$user->year == 2009 ? 'selected' : ''}} value="2009">2009</option>
                                                    <option {{$user->year == 2008 ? 'selected' : ''}} value="2008">2008</option>
                                                    <option {{$user->year == 2007 ? 'selected' : ''}} value="2007">2007</option>
                                                    <option {{$user->year == 2006 ? 'selected' : ''}} value="2006">2006</option>
                                                    <option {{$user->year == 2005 ? 'selected' : ''}} value="2005">2005</option>
                                                    <option {{$user->year == 2004 ? 'selected' : ''}} value="2004">2004</option>
                                                    <option {{$user->year == 2003 ? 'selected' : ''}} value="2003">2003</option>
                                                    <option {{$user->year == 2002 ? 'selected' : ''}} value="2002">2002</option>
                                                    <option {{$user->year == 2001 ? 'selected' : ''}} value="2001">2001</option>
                                                    <option {{$user->year == 2000 ? 'selected' : ''}} value="2000">2000</option>
                                                    <option {{$user->year == 1999 ? 'selected' : ''}} value="1999">1999</option>
                                                    <option {{$user->year == 1998 ? 'selected' : ''}} value="1998">1998</option>
                                                    <option {{$user->year == 1997 ? 'selected' : ''}} value="1997">1997</option>
                                                    <option {{$user->year == 1996 ? 'selected' : ''}} value="1996">1996</option>
                                                    <option {{$user->year == 1995 ? 'selected' : ''}} value="1995">1995</option>
                                                    <option {{$user->year == 1994 ? 'selected' : ''}} value="1994">1994</option>
                                                    <option {{$user->year == 1993 ? 'selected' : ''}} value="1993">1993</option>
                                                    <option {{$user->year == 1992 ? 'selected' : ''}} value="1992">1992</option>
                                                    <option {{$user->year == 1991 ? 'selected' : ''}} value="1991">1991</option>
                                                    <option {{$user->year == 1990 ? 'selected' : ''}} value="1990">1990</option>
                                                    <option {{$user->year == 1989 ? 'selected' : ''}} value="1989">1989</option>
                                                    <option {{$user->year == 1988 ? 'selected' : ''}} value="1988">1988</option>
                                                    <option {{$user->year == 1987 ? 'selected' : ''}} value="1987">1987</option>
                                                    <option {{$user->year == 1986 ? 'selected' : ''}} value="1986">1986</option>
                                                    <option {{$user->year == 1985 ? 'selected' : ''}} value="1985">1985</option>
                                                    <option {{$user->year == 1984 ? 'selected' : ''}} value="1984">1984</option>
                                                    <option {{$user->year == 1983 ? 'selected' : ''}} value="1983">1983</option>
                                                    <option {{$user->year == 1982 ? 'selected' : ''}} value="1982">1982</option>
                                                    <option {{$user->year == 1981 ? 'selected' : ''}} value="1981">1981</option>
                                                    <option {{$user->year == 1980 ? 'selected' : ''}} value="1980">1980</option>
                                                    <option {{$user->year == 1979 ? 'selected' : ''}} value="1979">1979</option>
                                                    <option {{$user->year == 1978 ? 'selected' : ''}} value="1978">1978</option>
                                                    <option {{$user->year == 1977 ? 'selected' : ''}} value="1977">1977</option>
                                                    <option {{$user->year == 1976 ? 'selected' : ''}} value="1976">1976</option>
                                                    <option {{$user->year == 1975 ? 'selected' : ''}} value="1975">1975</option>
                                                    <option {{$user->year == 1974 ? 'selected' : ''}} value="1974">1974</option>
                                                    <option {{$user->year == 1973 ? 'selected' : ''}} value="1973">1973</option>
                                                    <option {{$user->year == 1972 ? 'selected' : ''}} value="1972">1972</option>
                                                    <option {{$user->year == 1971 ? 'selected' : ''}} value="1971">1971</option>
                                                    <option {{$user->year == 1970 ? 'selected' : ''}} value="1970">1970</option>
                                                    <option {{$user->year == 1969 ? 'selected' : ''}} value="1969">1969</option>
                                                    <option {{$user->year == 1968 ? 'selected' : ''}} value="1968">1968</option>
                                                    <option {{$user->year == 1967 ? 'selected' : ''}} value="1967">1967</option>
                                                    <option {{$user->year == 1966 ? 'selected' : ''}} value="1966">1966</option>
                                                    <option {{$user->year == 1965 ? 'selected' : ''}} value="1965">1965</option>
                                                    <option {{$user->year == 1964 ? 'selected' : ''}} value="1964">1964</option>
                                                    <option {{$user->year == 1963 ? 'selected' : ''}} value="1963">1963</option>
                                                    <option {{$user->year == 1962 ? 'selected' : ''}} value="1962">1962</option>
                                                    <option {{$user->year == 1961 ? 'selected' : ''}} value="1961">1961</option>
                                                    <option {{$user->year == 1960 ? 'selected' : ''}} value="1960">1960</option>
                                                    <option {{$user->year == 1959 ? 'selected' : ''}} value="1959">1959</option>
                                                    <option {{$user->year == 1958 ? 'selected' : ''}} value="1958">1958</option>
                                                    <option {{$user->year == 1957 ? 'selected' : ''}} value="1957">1957</option>
                                                    <option {{$user->year == 1956 ? 'selected' : ''}} value="1956">1956</option>
                                                    <option {{$user->year == 1955 ? 'selected' : ''}} value="1955">1955</option>
                                                    <option {{$user->year == 1954 ? 'selected' : ''}} value="1954">1954</option>
                                                    <option {{$user->year == 1953 ? 'selected' : ''}} value="1953">1953</option>
                                                    <option {{$user->year == 1952 ? 'selected' : ''}} value="1952">1952</option>
                                                    <option {{$user->year == 1951 ? 'selected' : ''}} value="1951">1951</option>
                                                    <option {{$user->year == 1950 ? 'selected' : ''}} value="1950">1950</option>
                                                    <option {{$user->year == 1949 ? 'selected' : ''}} value="1949">1949</option>
                                                    <option {{$user->year == 1948 ? 'selected' : ''}} value="1948">1948</option>
                                                    <option {{$user->year == 1947 ? 'selected' : ''}} value="1947">1947</option>
                                                    <option {{$user->year == 1946 ? 'selected' : ''}} value="1946">1946</option>
                                                    <option {{$user->year == 1945 ? 'selected' : ''}} value="1945">1945</option>
                                                    <option {{$user->year == 1944 ? 'selected' : ''}} value="1944">1944</option>
                                                    <option {{$user->year == 1943 ? 'selected' : ''}} value="1943">1943</option>
                                                    <option {{$user->year == 1942 ? 'selected' : ''}} value="1942">1942</option>
                                                    <option {{$user->year == 1941 ? 'selected' : ''}} value="1941">1941</option>
                                                    <option {{$user->year == 1940 ? 'selected' : ''}} value="1940">1940</option>
                                                    <option {{$user->year == 1939 ? 'selected' : ''}} value="1939">1939</option>
                                                    <option {{$user->year == 1938 ? 'selected' : ''}} value="1938">1938</option>
                                                    <option {{$user->year == 1937 ? 'selected' : ''}} value="1937">1937</option>
                                                    <option {{$user->year == 1936 ? 'selected' : ''}} value="1936">1936</option>
                                                    <option {{$user->year == 1935 ? 'selected' : ''}} value="1935">1935</option>
                                                    <option {{$user->year == 1934 ? 'selected' : ''}} value="1934">1934</option>
                                                    <option {{$user->year == 1933 ? 'selected' : ''}} value="1933">1933</option>
                                                    <option {{$user->year == 1932 ? 'selected' : ''}} value="1932">1932</option>
                                                    <option {{$user->year == 1931 ? 'selected' : ''}} value="1931">1931</option>
                                                    <option {{$user->year == 1930 ? 'selected' : ''}} value="1930">1930</option>
                                                    <option {{$user->year == 1929 ? 'selected' : ''}} value="1929">1929</option>
                                                    <option {{$user->year == 1928 ? 'selected' : ''}} value="1928">1928</option>
                                                    <option {{$user->year == 1927 ? 'selected' : ''}} value="1927">1927</option>
                                                    <option {{$user->year == 1926 ? 'selected' : ''}} value="1926">1926</option>
                                                    <option {{$user->year == 1925 ? 'selected' : ''}} value="1925">1925</option>
                                                    <option {{$user->year == 1924 ? 'selected' : ''}} value="1924">1924</option>
                                                    <option {{$user->year == 1923 ? 'selected' : ''}} value="1923">1923</option>
                                                    <option {{$user->year == 1922 ? 'selected' : ''}} value="1922">1922</option>
                                                    <option {{$user->year == 1921 ? 'selected' : ''}} value="1921">1921</option>
                                                    <option {{$user->year == 1920 ? 'selected' : ''}} value="1920">1920</option>
                                                    <option {{$user->year == 1919 ? 'selected' : ''}} value="1919">1919</option>
                                                    <option {{$user->year == 1918 ? 'selected' : ''}} value="1918">1918</option>
                                                    <option {{$user->year == 1917 ? 'selected' : ''}} value="1917">1917</option>
                                                    <option {{$user->year == 1916 ? 'selected' : ''}} value="1916">1916</option>
                                                    <option {{$user->year == 1915 ? 'selected' : ''}} value="1915">1915</option>
                                                    <option {{$user->year == 1914 ? 'selected' : ''}} value="1914">1914</option>
                                                    <option {{$user->year == 1913 ? 'selected' : ''}} value="1913">1913</option>
                                                    <option {{$user->year == 1912 ? 'selected' : ''}} value="1912">1912</option>
                                                    <option {{$user->year == 1911 ? 'selected' : ''}} value="1911">1911</option>
                                                    <option {{$user->year == 1910 ? 'selected' : ''}} value="1910">1910</option>
                                                    <option {{$user->year == 1909 ? 'selected' : ''}} value="1909">1909</option>
                                                    <option {{$user->year == 1908 ? 'selected' : ''}} value="1908">1908</option>
                                                    <option {{$user->year == 1907 ? 'selected' : ''}} value="1907">1907</option>
                                                    <option {{$user->year == 1906 ? 'selected' : ''}} value="1906">1906</option>
                                                    <option {{$user->year == 1905 ? 'selected' : ''}} value="1905">1905</option>
                                                    <option {{$user->year == 1904 ? 'selected' : ''}} value="1904">1904</option>
                                                    <option {{$user->year == 1903 ? 'selected' : ''}} value="1903">1903</option>
                                                    <option {{$user->year == 1902 ? 'selected' : ''}} value="1902">1902</option>
                                                    <option {{$user->year == 1901 ? 'selected' : ''}} value="1901">1901</option>
                                                    <option {{$user->year == 1900 ? 'selected' : ''}} value="1900">1900</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="settings__section">
                                    <h2 class="settings__caption">
                                        Gender
                                    </h2>
                                    <div class="">
                                        <div class="form__row">
                                            <div class="form__label">
                                                Gender
                                            </div>
                                            <div class="form__select">
                                                <select name="gender" class="question-select">
                                                    <option {{$user->gender == 0 ? 'selected' : '' }} value="0" >Mr.</option>
                                                    <option {{$user->gender == 1 ? 'selected' : '' }} value="1" selected >Mrs.</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(auth()->user()->role == 1)
                                    <div class="settings__section">
                                        <h2 class="settings__caption">
                                            Role
                                        </h2>
                                        <div class="">
                                            <div class="form__row">
                                                <div class="form__label">
                                                    Role
                                                </div>
                                                <div class="form__select">
                                                    <select name="role" class="question-select">
                                                        <option {{$user->role == 0 ? 'selected' : '' }} value="0" >User</option>
                                                        <option {{$user->role == 1 ? 'selected' : '' }} value="1" >Admin</option>
                                                        <option {{$user->role == 2 ? 'selected' : '' }} value="2" >Manager</option>
                                                        <option {{$user->role == 3 ? 'selected' : '' }} value="3" >Seller</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="settings__section">
                                    <h2 class="settings__caption">
                                        Location
                                    </h2>
                                    <div class="settings__row">
                                        <div class="form__row">
                                            <div class="form__label">
                                                Your location now
                                            </div>
                                            <input type="text" name="location" required class="form__input" value="{{$user->location}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit"  class="settings__btn btn btn-primary btn-rounded">Save</button>
                        </form>
                        <div class="settings__body tab-content">
                            <h2 class="settings__caption">
                                Notifications
                            </h2>
                        </div>
                        <div class="settings__body tab-content">
                            <h2 class="settings__caption">
                                Password
                            </h2>
                        </div>
                        <div class="settings__body tab-content">
                            <h2 class="settings__caption">
                                Billing address
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        localStorage.setItem('day', '{{$user->day ?? 0}}')
        localStorage.setItem('month', '{{$user->month ?? 0}}')
        localStorage.setItem('year', '{{$user->year ? 2024 - $user->year + 1 : 0 }}')
        localStorage.setItem('gender', '{{$user->gender ?? 0}}')
        localStorage.setItem('role', '{{$user->role}}')
    </script>
@endsection


