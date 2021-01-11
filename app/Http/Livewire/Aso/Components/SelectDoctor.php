<?php

namespace App\Http\Livewire\Aso\Components;

use Livewire\Component;
use App\Models\Doctor;

class SelectDoctor extends Component
{
    public $doctor_id;

    public function updated()
    {
        $this->selectDoctor($this->doctor_id);
    }

    public function render()
    {
        return view('livewire.aso.components.select-doctor', [
            'doctors' => Doctor::orderBy('name', 'ASC')
            ->get()
        ]);
    }

    public function selectDoctor($id)
    {
        $this->emit('selectDoctor', $id);
    }
}
