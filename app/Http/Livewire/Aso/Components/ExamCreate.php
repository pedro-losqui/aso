<?php

namespace App\Http\Livewire\Aso\Components;

use Livewire\Component;
use App\Models\Exam;

class ExamCreate extends Component
{
    public $busca, $date;

    public $exams, $description;

    public function mount()
    {
        $this->date = date('Y-m-d');
    }

    public function updated()
    {
        if (strlen($this->busca) >  1) {
            $this->searchExame();
        }else{
            $this->selectClear();
        }
    }

    public function render()
    {
        return view('livewire.aso.components.exam-create');
    }

    public function searchExame()
    {
        $this->exams = Exam::where('description', 'LIKE', "%{$this->busca}%")
        ->get();
    }

    public function selectExam($id, $description)
    {
        $this->busca        = $description;
        $this->exams        = '';
        $this->emit('selectCompany', $id);
    }

    
    public function selectClear()
    {
        $this->busca        = '';
        $this->exams        = '';
        $this->description  = '';
    }

}
