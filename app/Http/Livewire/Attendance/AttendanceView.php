<?php

namespace App\Http\Livewire\Attendance;

use Livewire\Component;
use App\Models\Attendance;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AttendanceView extends Component
{
    use AuthorizesRequests, WithPagination;

    public $busca, $user_id, $btnUpdate;

    public $company, $employee, $ticket, $ticket_id;

    protected $rules = [
        'user_id'   => 'required',
        'company'   => 'required|string',
        'employee'  => 'required|string',
        'ticket'    => 'required|string',
    ];

    public function mount()
    {
       $this->btnUpdate = false;
       $this->user_id   = Auth::user()->id;
    }

    public function render()
    {
        $this->authorize('resgistro.ver', Auth::user()->can('resgistro.ver'));

        return view('livewire.attendance.attendance-view', [
            'records' => Attendance::whereDay('created_at', '=', date('d-m-Y'))
            ->where(function($query) {
                $query->orWhere('ticket', 'LIKE', "%{$this->busca}%")
                      ->orWhere('employee', 'LIKE', "%{$this->busca}%")
                      ->orWhere('company', 'LIKE', "%{$this->busca}%");
            })
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function store()
    {
        $this->authorize('resgistro.criar', Auth::user()->can('resgistro.criar'));

        $this->firstUppercase();
        $this->checkTicket();
        $attendance = Attendance::create($this->validate());
        session()->flash('success', 'Registro gerado com sucesso ;)');
        $this->emit('attendanceStore');
        $this->default();
    }

    public function edit($id)
    {
        $attendance = Attendance::find($id);
        $this->btnUpdate    = true;
        $this->ticket_id    = $attendance->id;
        $this->company      = $attendance->company;
        $this->employee     = $attendance->employee;
        $this->ticket       = substr($attendance->ticket, 1, 4);
    }

    public function update()
    {
        $this->authorize('resgistro.editar', Auth::user()->can('resgistro.editar'));

        $this->firstUppercase();
        $this->checkTicket();

        $data = $this->validate([
            'user_id'   => 'required',
            'company'   => 'required|string',
            'employee'  => 'required|string',
            'ticket'    => 'required|string',
        ]);

        $attendance = Attendance::find($this->ticket_id);
        $attendance->update($data);
        $this->default();
    }

    public function firstUppercase()
    {
        $this->employee = ucwords(mb_strtolower($this->employee, 'UTF-8'));
        $this->company = ucwords(mb_strtolower($this->company, 'UTF-8'));
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
        $this->btnUpdate = false;
        $this->company   = '';
        $this->employee  = '';
        $this->ticket    = '';
    }

    public function clear()
    {
        $this->busca = '';
    }
}
