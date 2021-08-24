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
                                    ID: {{$user->id}} 
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    ФИО: {{ $user->name }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    Логин: {{ $user->email }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                   Октивность: {{ $user->is_active ? 'Да' : 'Нет' }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    Роль: {{ $user->roles[0]->display_name }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop