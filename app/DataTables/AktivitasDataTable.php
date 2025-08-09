<?php

namespace App\DataTables;

use App\Models\Aktivita;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AktivitasDataTable extends DataTable
{
    protected $kabupaten_id;
    protected $kecamatan_id;
    protected $desa_id;
    protected $visit_type_id;
    protected $start_date;
    protected $end_date;

    public function with(array|string $key, mixed $value = null): static
    {
        if (is_array($key)) {
            foreach ($key as $k => $v) {
                $this->{$k} = $v;
            }
        } else {
            $this->{$key} = $value;
        }

        return $this;
    }

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('#', function ($item) {
                $showRoute = route('aktivitas.show', $item->uuid);
                $editRoute = route('aktivitas.edit', $item->uuid);
                $deleteRoute = route('aktivitas.destroy', $item->uuid);
                $actionButton = "<a href='{$showRoute}'
                                    class='badge bg-success text-white text-decoration-none'
                                    data-toggle='tooltip' title='View'>
                                    <i class='fas fa-eye'></i>
                                </a>
                                <a href='{$showRoute}'
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
            ->addColumn('visit_type', function ($item) {
                $class = match ($item->visit_type_id) {
                    1 => 'bg-primary',
                    2 => 'bg-success',
                    3 => 'bg-warning',
                    default => 'bg-secondary',
                };

                $visitType = "
                    <span class='badge rounded-pill text-xxs font-weight-bold {$class}'>
                        {$item->visit_type->name}
                    </span>
                ";

                return $visitType;
            })
            ->rawColumns(['#', 'visit_type']);
    }

    public function query(Visit $model): QueryBuilder
    {
        $query = $model->with([
            'visit_type',
            'desa.kecamatan.kabupaten',
        ])->newQuery();

        // Filter by project_id
        $project_id = Auth::user()->project_id;
        $query->where('project_id', $project_id);

        if($this->kabupaten_id != null)
        {
            $query->whereRelation('desa.kecamatan.kabupaten', 'id', '=', $this->kabupaten_id);
        }

        if($this->kecamatan_id != null)
        {
            $query->whereRelation('desa.kecamatan', 'id', '=', $this->kecamatan_id);
        }

        if($this->desa_id != null)
        {
            $query->whereRelation('desa', 'id', '=', $this->desa_id);
        }

        if($this->visit_type_id != null)
        {
            $query->where('visit_type_id', $this->visit_type_id);
        }

        if ($this->start_date != null && $this->end_date != null) {
            $clean_start_date = explode('?', $this->start_date)[0];
            $clean_end_date = explode('?', $this->end_date)[0];

            $start = Carbon::parse($clean_start_date)->startOfDay()->format('Y-m-d');
            $end = Carbon::parse($clean_end_date)->endOfDay()->format('Y-m-d');

            $query->whereBetween('date', [$start, $end]);
        }

        return $query;
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('aktivitas-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->pageLength(10)
                    ->lengthMenu([10, 50, 100, 250, 500, 1000])
                    //->dom('Bfrtip')
                    ->orderBy([0, 'desc'])
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
            Column::make('date')->title('Tanggal')->addClass('text-center'),
            Column::computed('visit_type')->title('Jenis Kunjungan')->addClass('text-center'),
            Column::make('desa.name')->title('Desa'),
            Column::make('desa.kecamatan.name')->title('Kecamatan'),
            Column::make('desa.kecamatan.kabupaten.name')->title('Kabupaten'),
            Column::computed('#')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'Aktivitas_' . date('YmdHis');
    }
}
