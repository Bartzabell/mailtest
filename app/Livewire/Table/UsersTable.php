<?php

namespace App\Livewire\Table;

use App\Models\DentistsData;
use App\Models\PatientsData;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use PhpParser\Node\Stmt\Else_;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class UsersTable extends DataTableComponent
{
    public $userData;
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Name", "id")
                ->format(
                    function ($value, $row, Column $column) {
                        $user = User::where('id', $value)->first();
                        if ($user->role == 'admin') {
                            $this->userData = DentistsData::where('user_id', $value)->first();
                        } elseif ($user->role == 'user') {
                            $this->userData = PatientsData::where('user_id', $value)->first();
                        }
                        try {
                            if ($this->userData->extension_name == null) {
                                return $this->userData ? $this->userData->last_name . ', ' . $this->userData->first_name . ' ' . $this->userData->middle_name  : '';
                            } elseif ($this->userData->middle_name == null or $this->userData->extension_name == null) {
                                return $this->userData ? $this->userData->last_name . ' ' . $this->userData->extension_name . ', ' . $this->userData->first_name  : '';
                            } else {
                                return $this->userData ? $this->userData->last_name . ' ' . $this->userData->extension_name . ', ' . $this->userData->first_name . ' ' . $this->userData->middle_name : '';
                            }
                        } catch (\Throwable $th) {
                            return "Deleted User " . $value;
                        }
                    }
                )
                ->sortable()
                ->searchable(),
            Column::make("Email", "email")
                ->sortable()
                ->searchable()
                ->collapseAlways(),
            Column::make("Phone Number", "patientsData.phone_number")
                ->format(
                    function ($value, $row, Column $column) {
                        if ($value == null) {
                            return 'NA';
                        } else {
                            return $value;
                        }
                    }
                )
                ->sortable()
                ->collapseAlways(),
            BooleanColumn::make("Status", "status")
                ->sortable(),
            Column::make("Role", "role")
                ->sortable(),
            Column::make("Profile photo", "profile_photo")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable()
                ->hideIf(true),
            Column::make("Updated at", "updated_at")
                ->sortable()
                ->hideIf(true),
            Column::make('Actions')
                ->label(
                    fn ($row, Column $column)  => view('components.layouts.buttons.users-table')->withRow($row)
                ),
        ];
    }
}
