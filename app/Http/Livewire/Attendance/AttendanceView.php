<?php

namespace App\Http\Livewire\Attendance;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Attendance;

class AttendanceView extends Component
{
    public $busca, $user_id = 1;

    public $company, $employee, $ticket;

    protected $rules = [
        'user_id'   => 'required',
        'company'   => 'required|string',
        'employee'  => 'required|string',
        'ticket'    => 'required|string',
    ];

    public function render()
    {
        return view('livewire.attendance.attendance-view', [
            'records' => Attendance::where('company', 'LIKE', "%{$this->busca}%")
            ->orWhere('employee', 'LIKE', "%{$this->busca}%")
            ->orWhere('company', 'LIKE', "%{$this->busca}%")
            ->orWhere('ticket', 'LIKE', "%{$this->busca}%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function store()
    {
        $this->firstUppercase();
        $this->checkTicket();
        $attendance = Attendance::create($this->validate());
        session()->flash('success', 'Registro gerado com sucesso ;)');
        $this->emit('attendanceStore');
        $this->default();
    }

    public function firstUppercase()
    {
        $this->employee = ucwords(strtolower($this->employee));
        $this->company = ucwords(strtolower($this->company));
        
    }

    public function checkTicket()
    {
        $this->validate();

        if ($this->ticket <= 99) {
            return $this->ticket = 'P'. $this->ticket;
        } else {
            return $this->ticket = 'N'. $this->ticket;
        }
        
    }

    public function default()
    {
        $this->company  = '';
        $this->employee = '';
        $this->ticket   = '';
    }

    public function clear()
    {
        $this->busca = '';
    }

}
