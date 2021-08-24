@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <h5></h5>
@stop

@section('content')
    <form role="form" method="POST" action="{{ $action }}" enctype="multipart/form-data">
		@csrf
		@if($method == 'edit')
			{{ method_field('PATCH') }}
		@endif
		<div class="card card-primary">
			<div class="card-body">				
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                        <h2>{{ $title }}</h2>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Сохранить</button>
                                        <a href="{{route('users.index')}}" class="btn btn-danger"><i class="fas fa-times"></i> Отмена</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <hr>    
                            </div>
                            @if ($user)
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>ID <sup class="text-danger">*</sup></label>
                                                <input class="form-control {{ $errors->has('id') ? 'is-invalid' : '' }}" name="id"
                                                    value="{{$user->id}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>ФИО <sup class="text-danger">*</sup></label>
                                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" required
                                                value="{{ old('name') ?? $user->name ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Логин <sup class="text-danger">*</sup></label>
                                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" required
                                                value="{{ old('email') ?? $user->email ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Пароль <sup class="text-danger">*</sup></label>
                                            <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" required
                                                value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Октивность</label>
                                            <select class="form-control select2" name="is_active"> 
                                                <option value="1" @if ($user && $user->is_actve == 1)
                                                    selected
                                                @endif>Да</option>
                                                <option value="0" @if ($user && $user->is_actve == 0)
                                                    selected
                                                @endif>Нет</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Роль</label>
                                            <select class="form-control select2" name="role"> 
                                                @foreach ($roles as $item)
                                                    <option value="{{$item->id}}" @if ($user && $user->hasRole($item->name))
                                                        selected
                                                    @endif>{{$item->display_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
    </form>
@stop