<?php

namespace App\Livewire\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Discount;

class DiscountTable extends DataTableComponent
{
    protected $model = Discount::class;

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
                ->sortable(),
            Column::make("Percentage", "percentage")
                ->sortable(),
            Column::make('Actions')
                ->label(
                    fn ($row, Column $column)  => view('components.layouts.buttons.discount-edit')->withRow($row)
                ),
        ];
    }
}
