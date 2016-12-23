@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div  class="col-sm-3">
            </div>
        <div  class="product col-sm-5">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#reviews">Satıcı</a></li>
                <li><a data-toggle="tab" href="#details">Alıcı</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="reviews">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="text-align: center">Kayıt Ol</div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">İsim</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group{{ $errors->has('soyisim') ? ' has-error' : '' }}">
                                            <label for="soyisim" class="col-md-4 control-label">Soyisim</label>

                                            <div class="col-md-6">
                                                <input id="soyisim" type="text" class="form-control" name="soyisim" value="{{ old('soyisim') }}">

                                                @if ($errors->has('soyisim'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('soyisim') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-4 control-label">E-Mail Adresi</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('telefon') ? ' has-error' : '' }}">
                                            <label for="telefon" class="col-md-4 control-label">Telefon Numarası</label>

                                            <div class="col-md-6">
                                                <input id="telefon" type="text" class="form-control" name="telefon" value="{{ old('telefon') }}">

                                                @if ($errors->has('telefon'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefon') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">Şifre</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password">

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                            <label for="password-confirm" class="col-md-4 control-label">Şifre Onayı</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                                @if ($errors->has('password_confirmation'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>



                                        <div class="col-md-6">
                                            <input type="hidden" id="user_type"  class="form-control" name="user_type" value="1">
                                        </div>

                                            <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">

                                                    <i class="fa fa-btn fa-user"></i> Kayıt Ol

                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                         </div>







                <div class="tab-pane" id="details">
                    <div class="tab-content">
                        <div class="tab-pane active" id="reviews">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="text-align: center">Kayıt Ol</div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">İsim</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('soyisim') ? ' has-error' : '' }}">
                                            <label for="soyisim" class="col-md-4 control-label">Soyisim</label>

                                            <div class="col-md-6">
                                                <input id="soyisim" type="text" class="form-control" name="soyisim" value="{{ old('soyisim') }}">

                                                @if ($errors->has('soyisim'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('soyisim') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-4 control-label">E-Mail Adresi</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group{{ $errors->has('telefon') ? ' has-error' : '' }}">
                                            <label for="telefon" class="col-md-4 control-label">Telefon Numarası</label>

                                            <div class="col-md-6">
                                                <input id="telefon" type="text" class="form-control" name="telefon" value="{{ old('telefon') }}">

                                                @if ($errors->has('telefon'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefon') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">Şifre</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password">

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                            <label for="password-confirm" class="col-md-4 control-label">Şifre Onayı</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                                @if ($errors->has('password_confirmation'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <input type="hidden" id="user_type"  class="form-control" name="user_type" value="2">
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-user"></i> Kayıt Ol
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
