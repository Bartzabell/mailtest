<?php

namespace App\Livewire\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\ClinicInformation;

class ClinicInformationTable extends DataTableComponent
{
    protected $model = ClinicInformation::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->hideIf(true),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Content", "content")
                ->sortable(),
            Column::make("Type", "type")
                ->sortable()
                ->searchable(),
        ];
    }
}
