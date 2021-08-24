@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <h5></h5>
@stop

@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body"> 
                    <div class="row">
                        <div class="col-12" id="dt_filters">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-12">
                                    <h2>{{ $title }}</h2>
                                </div>
                                @if(auth()->user()->isAbleTo('users-create'))
                                    <div class="col-lg-2 col-md-3 col-sm-12">
                                        <a href="{{route('users.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Создать</a>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Активность</label>
                                        <select class="form-control select2" name="is_active" onchange="Main.updateDataTable(event);"> 
                                            <option value="">Все</option>
                                            <option value="1">Да</option>
                                            <option value="0">Нет</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                   
                    <div class="p-0">
						{!! $datatable->table() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('js')
    {!! $datatable->scripts() !!}
@stop
