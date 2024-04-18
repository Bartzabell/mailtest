<?php

namespace App\Livewire\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Service;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class ServicesTable extends DataTableComponent
{
    protected $model = Service::class;

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
            Column::make("Price", "price")
                ->sortable()
                ->searchable(),
            BooleanColumn::make("Requires Checkup", "requires_checkup")
                ->sortable()
                ->searchable(),
            Column::make("Description", "description")
                ->sortable(),
            Column::make("Duration (minutes)", "duration")
                ->sortable(),
            Column::make('Actions')
                ->label(
                    fn ($row, Column $column)  => view('components.layouts.buttons.services-table')->withRow($row)
                ),
        ];
    }
}
