<?php

namespace App\Http\Livewire\Attendance;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Attendance;

class AttendenceArchive extends Component
{
    public $start, $end;

    public $busca;

    public function mount()
    {   
        $this->start = date("Y-m-d", strtotime('-2 days'));
        $this->end   = date("Y-m-d", strtotime('+1 days'));
    }

    public function render()
    {
        return view('livewire.attendance.attendence-archive', [
            'records' => Attendance::whereBetween('created_at', [$this->start, $this->end])
            ->where(function($query) {
                $query->orWhere('ticket', 'LIKE', "%{$this->busca}%")
                      ->orWhere('employee', 'LIKE', "%{$this->busca}%")
                      ->orWhere('company', 'LIKE', "%{$this->busca}%");
            })
            ->take(10)
            ->get()
        ]);
    }

    public function clear()
    {
        $this->busca = '';
    }
}
