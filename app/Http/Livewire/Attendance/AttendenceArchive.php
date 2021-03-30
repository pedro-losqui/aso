<?php

namespace App\Http\Livewire\Attendance;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Attendance;

class AttendenceArchive extends Component
{
    public $start, $end;

    public $busca, $records = [];

    public function mount()
    {
        $this->searchRecords();
        $this->start = date("Y-m-d", strtotime('-6 days'));
        $this->end   = date("Y-m-d", strtotime('+1 days'));
    }

    public function updated()
    {
        $this->searchRecords();
    }

    public function render()
    {
        return view('livewire.attendance.attendence-archive');
    }

    public function searchRecords()
    {
        $this->records = '';
        $this->records = Attendance::whereBetween('created_at', [$this->start, $this->end])
        ->orWhere('employee', 'LIKE', "%{$this->busca}%")
        ->orWhere('company', 'LIKE', "%{$this->busca}%")
        ->orWhere('ticket', 'LIKE', "%{$this->busca}%")
        ->orderBy('id', 'DESC')
        ->paginate(10);
    }

    public function clear()
    {
        $this->busca = '';
    }
}
