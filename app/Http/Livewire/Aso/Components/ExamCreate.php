<?php

namespace App\Http\Livewire\Aso\Components;

use Livewire\Component;
use App\Models\Exam;

class ExamCreate extends Component
{
    public $busca = [];

    public $inputs = [], $i;

    public $exam_id, $exams = [] , $date;

    public function mount()
    {
        $this->aux      = 1;
        $this->i        = 1;
        array_push($this->inputs , $this->i);
        $this->searchExame();
    }

    public function updated()
    {
        $this->selectExams();

    }

    public function render()
    {
        return view('livewire.aso.components.exam-create');
    }

    public function searchExame()
    {
        $this->exams = Exam::all();
    }
    
    public function selectExams()
    {
        $this->emit('selectExams', $this->exam_id, $this->date);
    }

    public function selectExamsClear()
    {
        $this->emit('selectExamsClear');
    }


    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function remove($i, $key)
    {           
        $aux = $key + 1;

        $this->selectExamsClear();
        unset($this->inputs[$key]);
        unset($this->exam_id[$aux]);
        unset($this->date[$aux]);
        $this->i = $i - 1;
        $this->selectExams();
    }
}
