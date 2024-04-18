<?php

namespace App\Livewire\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;
use WireUi\Traits\Actions;

class AppointmentTable extends DataTableComponent
{
    use Actions;
    protected $model = Appointment::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Appointment ID", "id")
                ->searchable()
                ->sortable()
                ->hideIf(true),
            Column::make("Patient ID", "user_id")
                ->sortable(),
            Column::make("Date and Time", "date_time")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable(),
            // Column::make("Services id", "services_id")
            //     ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable()
                ->hideIf(true),
            Column::make("Updated at", "updated_at")
                ->sortable()
                ->hideIf(true),
            Column::make('Actions')
                ->label(
                    fn ($row, Column $column)  => view('components.layouts.buttons.appointment-table')->withRow($row)
                ),
        ];
    }

    public function confirmDeleteAppointment($id)
    {
        try {
            $this->dialog()->confirm([
                'title' => 'Delete Appointment?',
                'icon' => 'warning',
                'accept' => [
                    'label'  => 'Yes, delete',
                    'method' => 'deleteAppointment',
                    'params' => $id,
                    'class' => 'bg-red-600',
                ],
                'reject' => [
                    'label'  => 'No, cancel',
                ],
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function deleteAppointment($id)
    {
        try {
            DB::beginTransaction();

            // Find the appointment by ID
            $appointment = Appointment::find($id);

            // Check if the appointment exists before attempting to delete
            if ($appointment) {
                // Detach services from the appointment
                $appointment->services()->detach();

                // Delete the appointment record
                $appointment->delete();

                // Your custom logic or logging here

                // Commit the transaction
                DB::commit();
            } else {
                // Rollback the transaction if the appointment doesn't exist
                DB::rollBack();

                // Show an info message
                $this->dialog()->info(
                    $title = "Deletion Failed",
                    $description = "Appointment not found."
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
                $description = "An error occurred while deleting the appointment."
            );
        }
    }

    public function toggleAppointmentStatus($id)
    {
        try {
            DB::beginTransaction();

            // Find the appointment by ID
            $appointment = Appointment::find($id);

            // Check if the appointment exists before attempting to toggle the status
            if ($appointment) {
                // Toggle the status (if it's "scheduled", change it to "cancel" and vice versa)
                $appointment->status = ($appointment->status == 'scheduled') ? 'canceled' : 'scheduled';
                $appointment->save();

                // Your custom logic or logging here

                // Commit the transaction
                DB::commit();

                $this->dialog()->success(
                    $title = 'Success',
                    $description = 'Appointment status updated successfully!'
                );
            } else {
                // Rollback the transaction if the appointment doesn't exist
                DB::rollBack();

                // Show an info message
                $this->dialog()->info(
                    $title = "Update Failed",
                    $description = "Appointment not found."
                );
            }
        } catch (\Throwable $th) {
            // Rollback the transaction on exception
            DB::rollBack();

            // Log the exception or handle it accordingly
            dd($th);

            // Show an info message
            $this->dialog()->info(
                $title = "Update Failed",
                $description = "An error occurred while updating the appointment status."
            );
        }
    }
}
