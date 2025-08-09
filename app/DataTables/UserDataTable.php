<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('#', function ($item) {
                $editRoute = route('user.edit', $item->uuid);
                $deleteRoute = route('user.destroy', $item->uuid);
                $actionButton = "<a href='{$editRoute}'
                                    class='badge bg-dark text-white text-decoration-none' title='Edit'>
                                    <i class='fas fa-edit'></i>
                                </a>
                                <a href='javascript:void(0);'
                                    class='badge bg-danger text-white text-decoration-none' title='Delete'
                                    data-bs-toggle='modal' data-bs-target='#deleteModal'data-url='{$deleteRoute}'>
                                    <i class='fas fa-trash-alt'></i>
                                </a>
                                ";

                return $actionButton;
            })
            ->rawColumns(['#']);
    }

    public function query(User $model): QueryBuilder
    {
        $query = $model->with([
            'role',
            'gender',
        ])->newQuery();

        // Filter by project_id
        $project_id = Auth::user()->project_id;
        $query->whereNot('role_id', 1)
            ->where('project_id', $project_id);

        return $query;
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('user-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->pageLength(10)
                    ->lengthMenu([10, 50, 100, 250, 500, 1000])
                    //->dom('Bfrtip')
                    ->orderBy([1, 'asc'])
                    ->selectStyleSingle()
                    ->buttons([
                        [
                            'extend' => 'excel',
                            'text' => 'Export to Excel',
                            'attr' => [
                                'id' => 'datatable-excel',
                                'style' => 'display: none;',
                            ],
                        ],
                    ]);
    }

    public function getColumns(): array
    {
        return [
            Column::computed('#')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('name')->title('Nama'),
            Column::make('email')->title('Email'),
            Column::make('phone')->title('No. HP'),
            Column::make('role.name')->title('Role'),
            Column::make('gender.name')->title('Gender'),
        ];
    }

    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}
