<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Aso;
use Livewire\Component;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

class DashView extends Component
{
    public $asoTotal, $asoUsuario, $atendimentos, $senhas;

    public function mount()
    {
        $this->asoTotal();
        $this->asoUsuario();
        $this->atendimentos();
        $this->senha();
    }

    public function render()
    {
        return view('livewire.dashboard.dash-view');
    }

    public function asoTotal()
    {
        $this->asoTotal = count(Aso::all());
    }

    public function asoUsuario()
    {
        $this->asoUsuario = count(Aso::where('user_id', Auth::user()->id)->get());
    }

    public function atendimentos()
    {
        $this->atendimentos = count(Aso::whereDay('created_at', date('d'))->get());
    }

    public function senha()
    {
        $this->senhas = count(Attendance::whereDay('created_at', date('d'))->get());
    }
}
