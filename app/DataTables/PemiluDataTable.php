<?php

namespace App\DataTables;

use App\Models\Election;
use App\Models\Pemilu;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PemiluDataTable extends DataTable
{
    protected $kabupaten_id;
    protected $kecamatan_id;
    protected $desa_id;

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
            ->addColumn('total', function ($item) {
                $total = $item->vote + $item->vote_party;
                return $total;
            })
            ->rawColumns(['total']);
    }

    public function query(Election $model): QueryBuilder
    {
        $query = $model->with([
            'tps.dapil.project.profile',
            'tps.desa.kecamatan.kabupaten',
        ])->newQuery();

        // Filter by project_id
        $project_id = Auth::user()->project_id;
        $query->whereRelation('tps.dapil.project', 'id', '=', $project_id);

        if($this->kabupaten_id != null)
        {
            $query->whereRelation('tps.desa.kecamatan.kabupaten', 'id', '=', $this->kabupaten_id);
        }

        if($this->kecamatan_id != null)
        {
            $query->whereRelation('tps.desa.kecamatan', 'id', '=', $this->kecamatan_id);
        }

        if($this->desa_id != null)
        {
            $query->whereRelation('tps.desa', 'id', '=', $this->desa_id);
        }

        return $query;
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('pemilu-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->pageLength(10)
                    ->lengthMenu([10, 50, 100, 250, 500, 1000])
                    //->dom('Bfrtip')
                    ->orderBy([0, 'asc'])
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
            Column::make('id')->title('ID'),
            Column::make('tps.dapil.project.profile.nama_lengkap')->title('Profile')->searchable(false)->sortable(false),
            Column::make('vote')->title('Suara'),
            Column::make('vote_party')->title('Suara Partai'),
            Column::make('total')->title('Total'),
            Column::make('tps.desa.name')->title('Desa'),
            Column::make('tps.desa.kecamatan.name')->title('Kecamatan'),
            Column::make('tps.desa.kecamatan.kabupaten.name')->title('Kabupaten'),
            Column::make('tps.dapil.name')->title('Dapil')->sortable(false),
        ];
    }

    protected function filename(): string
    {
        return 'Pemilu_' . date('YmdHis');
    }
}
