<?php
namespace App\Services;

use DataTables;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Builder as BuilderDT;

class BaseService
{
    public $model;
    protected $translation;

    /**
     * Service constructor.
     * @param Builder $model
     */
    public function __construct(Builder $model)
    {
        $this->model = $model;
    }

    /**
     * Стандартная кнопка действия для DataTable
     */
    protected function actionButton()
    {
        return [
            'title' => __('main.action_column'),
            'remove_select' => true,
            'data' => 'action',
            'searchable' => false,
            'orderable' => false,
        ];
    }

    /**
     * Собираем объект DataTable для фронта
     */
    public function constructViewDT($selectorForm = '#dt_filters')
    {
        return app(BuilderDT::class)
            ->language(config('datatables.lang'))
            ->orders([0, 'desc'])
            ->pageLength(25)
			->responsive(true)
			->lengthChange(false)
			->autoWidth(false)
            ->ajaxWithForm('', $selectorForm)
            ->columns( $this->tableColumns() );
    }

  
    /**
     * Формирует данные для шаблона "Список элементов"
     */
    public function dataTableData()
    {
        return $this->constructDataTableQuery()->make(true);
    }

    /**
     * Формирует данные для шаблона "Список элементов"
     */
    public function outputData()
    {
        return [];
    }
 
}
