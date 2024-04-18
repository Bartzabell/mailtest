<?php

namespace App\Livewire\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\DentistsData;

class DentistsTable extends DataTableComponent
{
    protected $model = DentistsData::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "user_id")
                ->searchable()
                ->sortable()
                ->hideIf(true),
            Column::make("Name", "id")
                ->format(
                    function ($value, $row, Column $column) {
                        $dentistData = DentistsData::where('id', $value)->first();
                        // $user = User::find($value);
                        // dd($patientData);
                        try {
                            if ($dentistData->extension_name == null) {
                                return $dentistData ? $dentistData->last_name . ', ' . $dentistData->first_name . ' ' . $dentistData->middle_name  : '';
                            } elseif ($dentistData->middle_name == null or $dentistData->extension_name == null) {
                                return $dentistData ? $dentistData->last_name . ' ' . $dentistData->extension_name . ', ' . $dentistData->first_name  : '';
                            } else {
                                return $dentistData ? $dentistData->last_name . ' ' . $dentistData->extension_name . ', ' . $dentistData->first_name . ' ' . $dentistData->middle_name : '';
                            }
                        } catch (\Throwable $th) {
                            return "Deleted User " . $value;
                        }
                    }
                )
                ->sortable(),
            Column::make("Last name", "last_name")
                ->hideIf(true)
                ->searchable()
                ->sortable(),
            Column::make("First name", "first_name")
                ->hideIf(true)
                ->searchable()
                ->sortable(),
            Column::make("Middle name", "middle_name")
                ->hideIf(true)
                ->sortable(),
            Column::make("License number", "license_number")
                ->sortable(),
            Column::make('Actions')
                ->label(
                    fn ($row, Column $column)  => view('components.layouts.buttons.dentist-table')->withRow($row)
                ),
        ];
    }
}
