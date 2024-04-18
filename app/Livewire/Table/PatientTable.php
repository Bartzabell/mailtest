<?php

namespace App\Livewire\Table;

use App\Models\PatientsData;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use WireUi\Traits\Actions;

class PatientTable extends DataTableComponent
{
    protected $model = PatientsData::class;
    use Actions;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    // public function builder(): Builder
    // {
    //     return User::query()
    //         ->select('users.*')
    //         ->where('role', 'user');
    // }

    public function columns(): array
    {
        return [
            Column::make("ID", "user_id")
                ->sortable()
                ->searchable()
                ->hideIf(true),
            Column::make("Name", "id")
                ->format(
                    function ($value, $row, Column $column) {
                        $patientData = PatientsData::where('id', $value)->first();
                        // $user = User::find($value);
                        // dd($patientData);
                        try {
                            if ($patientData->extension_name == null) {
                                return $patientData ? $patientData->last_name . ', ' . $patientData->first_name . ' ' . $patientData->middle_name  : '';
                            } elseif ($patientData->middle_name == null or $patientData->extension_name == null) {
                                return $patientData ? $patientData->last_name . ' ' . $patientData->extension_name . ', ' . $patientData->first_name  : '';
                            } else {
                                return $patientData ? $patientData->last_name . ' ' . $patientData->extension_name . ', ' . $patientData->first_name . ' ' . $patientData->middle_name : '';
                            }
                        } catch (\Throwable $th) {
                            return "Deleted User " . $value;
                        }
                    }
                )
                ->sortable()
                ->searchable(),
            Column::make("Phone Number", "last_name")
                ->hideIf(true)
                ->sortable()
                ->searchable(),
            Column::make("Phone Number", "first_name")
                ->hideIf(true)
                ->sortable()
                ->searchable(),
            Column::make("Phone Number", "middle_name")
                ->hideIf(true)
                ->sortable()
                ->searchable(),
            Column::make("Phone Number", "phone_number")
                ->sortable()
                ->searchable(),
            Column::make("Email", "users.email")
                ->sortable()
                ->searchable(),
            // Column::make("Created at", "created_at")
            //     ->sortable(),
            // Column::make("Updated at", "updated_at")
            //     ->sortable(),
            Column::make('Actions')
                ->label(
                fn ($row, Column $column)  => view('components.layouts.buttons.patient-table')->withRow($row)
            ),
        ];
    }

    public function confirmDelete($id)
    {
        try {
            // Check if there are any dependencies on the patient data
            // For example, you might want to check if there are any related records in other tables
            // Adjust this part based on your specific use case

            // Check if there are any dependencies on the patient data
            $dependenciesExist = false; // Change this based on your actual logic

            if ($dependenciesExist) {
                $this->dialog()->info(
                    $title = "Deletion Failed",
                    $description = "Cannot delete patient with existing dependencies."
                );
            } else {
                $this->dialog()->confirm([
                    'title' => 'Delete Patient?',
                    'icon' => 'warning',
                    'accept' => [
                        'label'  => 'Yes, delete',
                        'method' => 'deletePatient',
                        'params' => $id,
                        'class' => 'bg-red-600',
                    ],
                    'reject' => [
                        'label'  => 'No, cancel',
                    ],
                ]);
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function deletePatient($id)
    {
        try {
            DB::beginTransaction();

            // Find the patient by ID
            $patient = PatientsData::find($id);

            // Check if the patient exists before attempting to delete
            if ($patient) {
                // Delete the patient record
                $patient->delete();

                // Your custom logic or logging here

                // Commit the transaction
                DB::commit();
            } else {
                // Rollback the transaction if the patient doesn't exist
                DB::rollBack();

                // Show an info message
                $this->dialog()->info(
                    $title = "Deletion Failed",
                    $description = "Patient not found."
                );
            }
        } catch (\Throwable $th) {
            // Rollback the transaction on exception
            DB::rollBack();

            // Log the exception or handle it accordingly
            dd($th);

            // Show an info message
            $this->dialog()->info(
                $title = "Deletion Failed",
                $description = "An error occurred while deleting the patient."
            );
        }
    }
}
