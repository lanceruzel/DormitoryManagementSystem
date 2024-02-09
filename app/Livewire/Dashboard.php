<?php

namespace App\Livewire;

use App\Models\Account;
use App\Models\Bill;
use App\Models\Room;
use App\Models\Student;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Dashboard extends Component
{
    #[Computed()]
    public function getGrossRevenues(){
        return Bill::sum('amount');
    }

    #[Computed()]
    public function getTotalOccupants(){
        return Student::where('assigned_room', '<>', '')->get();
    }

    #[Computed()]
    public function getTotalStudents(){
        return Student::all();
    }

    #[Computed()]
    public function getTotalRooms(){
        return Room::all();
    }

    #[Computed()]
    public function getTotalAccounts(){
        return Account::all();
    }

    #[Computed()]
    public function getTotalPayments(){
        return Bill::all();
    }

    #[Computed()]
    public function getAvailableRooms(){
        $rooms = Room::withCount('students')->get();

        // Filter rooms where the count of students is less than the room capacity
        $vacantRooms = $rooms->filter(function ($room) {
            return $room->students_count < $room->room_capacity;
        });

        return $vacantRooms;
    }

    #[Computed()]
    public function getBillsHistory(){
        return Bill::all();
    }

    public function getMonthly(){
        $monthlyTotalsArray = [];
        for ($month = 1; $month <= 12; $month++) {
            $yearMonth = date('Y-m', mktime(0, 0, 0, $month, 1)); // Format: YYYY-MM
            $monthlyTotalsArray[$yearMonth] = 0;
        }

        // Retrieve the total "amount" for every month
        $monthlyTotals = Bill::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(amount) as total_amount')
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->toArray();

        // Update the values based on the retrieved data
        foreach ($monthlyTotals as $total) {
            $yearMonth = $total['year'] . '-' . str_pad($total['month'], 2, '0', STR_PAD_LEFT); // Format: YYYY-MM
            $monthlyTotalsArray[$yearMonth] = $total['total_amount'];
        }

        $this->dispatch('monthly_totals', ['monthly' => $monthlyTotalsArray]);
    }

    public function getOccupants(){
        $male = Student::where('assigned_room', '<>', '')
            ->where('gender', 'Female')->get();

        $female = Student::where('assigned_room', '<>', '')
            ->where('gender', 'Male')->get();

        $this->dispatch('get_occupants', ['male' => $male->count(), 'female' => $female->count()]);
    }

    #[Computed()]
    public function getAvailableSpots(){
        $rooms = Room::withCount('students')->get();

        // Calculate the total number of spots available in all rooms
        $totalAvailableSpots = $rooms->sum(function ($room) {
            return max(0, $room->room_capacity - $room->students_count);
        });

        return $totalAvailableSpots;
    }

    public function render()
    {
        $this->getMonthly();
        $this->getOccupants();
        return view('livewire.dashboard');
    }
}
