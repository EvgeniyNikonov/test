<?php

namespace App\Services\Users;

use DataTables;
use App\Models\Role;
use App\Models\User;
use App\Services\BaseService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserService extends BaseService
{
	public $routeName = 'users';

	public $translation = 'users/user.';

	public $templateForm = 'form';

	public $templatePath = 'main.users.';
	
	public function __construct()
    {
        parent::__construct(User::query());
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
				'title' 		=> __($this->translation . 'list_columns.login'),
				'data' 			=> 'email',
			],
			[
				'title' 		=> __($this->translation . 'list_columns.active'),
				'data' 			=> 'is_active',
			],
			[
				'title' 		=> __($this->translation . 'list_columns.role'),
                'data'        => 'role',
                'name'        => 'users.role'
    
			],

			$this->actionButton()
		];
	}

    /**
     * Данные для работы с элементом
     */
    public function elementData()
    {
        $roles = Role::get();
        $user = null;
        if(class_basename($this->model) != 'Builder'){
            $user = $this->model;
		}
  
        return compact('roles', 'user');
    }

    /**
     * Создание записи в БД
     */
    public function store($request)
    {
		$user = $this->model->create($request->all());
        $user->syncRoles([$request->role]);
        return true;
    }

    /**
     * Обновление записи в БД
     */
    public function update($request)
    {		
        $this->model->update($request->all());
        $this->model->syncRoles([$request->role]);
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

        if (request()->has('is_active') and request()->is_active != null) {
            $query->where('is_active', request()->is_active);
        }

		return Datatables::of($query)
        ->addColumn('role', function ($user) {
            return implode(' ', $user->roles->pluck('display_name')->toArray());
        })
        ->addColumn('is_active', function ($user) {
            return $user->is_active ? 'Да' : 'Нет';
        })
        ->addColumn('action', $this->actionColumnDT());
    }
	
	/**
     * Сформируем колонку "Действие" для DataTable
     */
    protected function actionColumnDT()
    {
        return function ($element){
            $routeName = $this->routeName;
			$permissionKey = 'users';

            return view('main.action_buttons', compact('element', 'routeName', 'permissionKey'));
        };
    } 
}
