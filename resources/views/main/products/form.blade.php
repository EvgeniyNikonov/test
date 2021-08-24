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
                                        <a href="{{route('products.index')}}" class="btn btn-danger"><i class="fas fa-times"></i> Отмена</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <hr>    
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="row">
                                    @if ($product)
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>ID <sup class="text-danger">*</sup></label>
                                                <input class="form-control {{ $errors->has('id') ? 'is-invalid' : '' }}" name="id"
                                                    value="{{$product->id}}" readonly>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Наименование <sup class="text-danger">*</sup></label>
                                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" required
                                                value="{{ old('name') ?? $product->name ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Символьный код (url) <sup class="text-danger">*</sup></label>
                                            <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" name="url" required
                                                value="{{ old('url') ?? $product->url ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Октивность</label>
                                            <select class="form-control select2" name="is_active"> 
                                                <option value="1" @if ($product && $product->is_active == 1)
                                                    selected
                                                @endif>Да</option>
                                                <option value="0" @if ($product && $product->is_active == 0)
                                                    selected
                                                @endif>Нет</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Сортировка</label>
                                            <input class="form-control {{ $errors->has('sort') ? 'is-invalid' : '' }}" name="sort"
                                                value="{{ old('sort') ?? $product->sort ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Изображение</label>
                                            <input type="file" class="form-control" name="img" >
                                        </div>
                                    </div>
                                   
                                    @if ($product && $product->img)
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <img src="{{$product->img}}" width="100px" height="100px">
                                        </div>
                                     @endif
                                   
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label>Бренд</label>
                                                    <input class="form-control {{ $errors->has('brand_name') ? 'is-invalid' : '' }}" name="brand_name"
                                                        value="{{ old('brand_name') ?? $product->brand_name ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label>Внутренний диаметр (d)</label>
                                                    <input class="form-control {{ $errors->has('inner_diameter') ? 'is-invalid' : '' }}" name="inner_diameter"
                                                        value="{{ old('inner_diameter') ?? $product->inner_diameter ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label>Внешний диаметр (D)</label>
                                                    <input class="form-control {{ $errors->has('external_diameter') ? 'is-invalid' : '' }}" name="external_diameter"
                                                        value="{{ old('external_diameter') ?? $product->external_diameter ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label>Ширина B (H)</label>
                                                    <input class="form-control {{ $errors->has('width') ? 'is-invalid' : '' }}" name="width"
                                                        value="{{ old('width') ?? $product->width ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label>Аналоги</label>
                                                    <input class="form-control {{ $errors->has('analogs') ? 'is-invalid' : '' }}" name="analogs"
                                                        value="{{ old('analogs') ?? $product->analogs ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label>Вес</label>
                                                    <input class="form-control {{ $errors->has('weight') ? 'is-invalid' : '' }}" name="weight"
                                                        value="{{ old('weight') ?? $product->weight ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label>Описание</label>
                                                    <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description"
                                                        value="{{ old('description') ?? $product->description ?? '' }}">
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
    </form>
@stop