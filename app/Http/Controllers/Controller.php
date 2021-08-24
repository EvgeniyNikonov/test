<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		if (request()->ajax()) {
			return $this->service->dataTableData();
		}

		$with = $this->service->outputData();

		$with['title'] = __($this->service->translation . 'index.title');
		$with['datatable'] = $this->service->constructViewDT();

		return view($this->service->templatePath . __FUNCTION__)->with($with);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$with = $this->service->elementData();

		$with['title'] = __($this->service->translation . 'index.title') . ': Создать';
		$with['method'] = __FUNCTION__;
		$with['action'] = route($this->service->routeName . '.store');

		return view($this->service->templatePath . $this->service->templateForm)->with($with);
	}

	
	/**
	 * Display the specified resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	protected function showElement($element)
	{
		$this->service->model = $element;
		$with = $this->service->elementData();

		$with['title'] = __($this->service->translation . 'index.title') . ': Просмотр';

		return view($this->service->templatePath . 'show')->with($with);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	protected function editElement($element)
	{
		$this->service->model = $element;
		$with = $this->service->elementData();

		$with['title'] = __($this->service->translation . 'index.title') . ': Редактировать';
		$with['action'] = route($this->service->routeName . '.update', $element->id);
		$with['method'] = 'edit';

		return view($this->service->templatePath . $this->service->templateForm)->with($with);
	}
	
}
