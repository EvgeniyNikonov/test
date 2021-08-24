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
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>ID</label>
                                        <input class="form-control" value="{{ $product->id }}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Наименование</label>
                                        <input class="form-control " value="{{ $product->name }}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Символьный код (url) </label>
                                        <input class="form-control" value="{{ $product->url }}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Октивность</label>
                                        <input class="form-control" value="{{ $product->is_active ? 'Да' : 'Нет'}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Сортировка</label>
                                        <input class="form-control" value="{{ $product->sort }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Изображение</label>
                                    </div>
                                    @if ($product->img)
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <img src="{{$product->img}}" width="100px" height="100px">
                                        </div>
                                    @endif
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label>Цена</label>
                                                <input class="form-control" value="{{ $product->price }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label>Бренд</label>
                                                <input class="form-control" value="{{ $product->brand_name }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label>Внутренний диаметр (d)</label>
                                                <input class="form-control" value="{{ $product->inner_diameter }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label>Внешний диаметр (D)</label>
                                                <input class="form-control" value="{{ $product->external_diameter }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label>Ширина B (H)</label>
                                                <input class="form-control" value="{{ $product->width }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label>Аналоги</label>
                                                <input class="form-control" value="{{ $product->analogs }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label>Вес</label>
                                                <input class="form-control" value="{{ $product->weight }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label>Описание</label>
                                                <input class="form-control" value="{{ $product->description }}" disabled>
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
@stop