<?php

namespace App\Services\Products;

use DataTables;
use App\Services\BaseService;
use Illuminate\Support\Carbon;
use App\Models\Products\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductService extends BaseService
{
	public $routeName = 'products';

	public $translation = 'products/product.';

	public $templateForm = 'form';

	public $templatePath = 'main.products.';
	
	public function __construct()
    {
        parent::__construct(Product::query());
    }

	/**
	 * Возвращает список всех колонок для DataTable
	 */
	public function tableColumns()
	{
		return [
            [
                'title' 		=> 'ID',
				'data' 			=> 'id',
            ],
			[
				'title' 		=> __($this->translation . 'list_columns.name'),
				'data' 			=> 'name',
			],
			[
				'title' 		=> __($this->translation . 'list_columns.url'),
				'data' 			=> 'url',
			],
			[
				'title' 		=> __($this->translation . 'list_columns.active'),
				'data' 			=> 'is_active',
			],
			[
				'title' 		=> __($this->translation . 'list_columns.sort'),
				'data' 			=> 'sort',
			],
			[
				'title' 		=> __($this->translation . 'list_columns.img'),
				'data' 			=> 'img',
			],

			$this->actionButton()
		];
	}

    /**
     * Данные для работы с элементом
     */
    public function elementData()
    {
        $product = null;
        if(class_basename($this->model) != 'Builder'){
            $product = $this->model;
		}
  
        return compact('product');
    }

    /**
     * Создание записи в БД
     */
    public function store($request)
    {
        $product = $this->model->create($request->all());

        if (isset($request->img) && $request->img) {
            $path = $request->img->store('public/products');
            $product->img = url()->to('/') . Storage::url($path);
            $product->save();
        }
        return true;
    }

    /**
     * Обновление записи в БД
     */
    public function update($request)
    {		
        $this->model->update($request->all());

        if (isset($request->img) && $request->img) {
            $path = $request->img->store('public/products');
            $this->model->img = url()->to('/') . Storage::url($path);
            $this->model->save();
        }

        return true;
    }
	
    /**
     * Собираем объект DataTable для фронта
     */
    public function constructViewDT($selectorForm = '#dt_filters')
    {
        return parent::constructViewDT()
			->orders([0, 'desc'])
			->dom('Bfrtip');
    }

	/**
     * Собираем запрос и формируем коллекцию DT
     */
    protected function constructDataTableQuery()
    {
        $query = $this->model->select('*');

        // Фильтры

        if (request()->has('is_active') and request()->is_active) {
            $query->where('is_active', request()->is_active);
        }

        $query->orderBy('sort');

		return Datatables::of($query)
            ->addColumn('is_active', function ($product) {
                return $product->is_active ? 'Да' : 'Нет';
            })
            ->addColumn('img', function ($product) {
                return '<img src=" ' . $product->img . ' " width="75px" height="75px">';
            })
            ->addColumn('action', $this->actionColumnDT())
            ->rawColumns(['img']);
    }
	
	/**
     * Сформируем колонку "Действие" для DataTable
     */
    protected function actionColumnDT()
    {
        return function ($element){
            $routeName = $this->routeName;
			$permissionKey = 'products';

            return view('main.action_buttons', compact('element', 'routeName', 'permissionKey'));
        };
    } 
}
