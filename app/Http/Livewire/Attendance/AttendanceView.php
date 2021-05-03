<?php

namespace App\Http\Livewire\Attendance;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AttendanceView extends Component
{
    use AuthorizesRequests;

    public $busca, $user_id;

    public $company, $employee, $ticket;

    protected $rules = [
        'user_id'   => 'required',
        'company'   => 'required|string',
        'employee'  => 'required|string',
        'ticket'    => 'required|string',
    ];

    public function mount()
    {
       $this->user_id = Auth::user()->id;
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
