@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <h5></h5>
@stop

@section('content')
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
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <hr>    
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>ID <sup class="text-danger">*</sup></label>
                                        <input class="form-control" value="{{$user->id}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>ФИО</label>
                                        <input class="form-control" value="{{ $user->name }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Логин</label>
                                        <input class="form-control" value="{{ $user->email }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Октивность</label>
                                        <input class="form-control" value="{{ $user->is_active ? 'Да' : 'Нет'}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Роль</label>
                                        <input class="form-control" value="{{ $user->roles[0]->display_name }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop