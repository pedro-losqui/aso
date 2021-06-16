<?php

namespace App\Http\Livewire\Aso\Components;

use Livewire\Component;
use App\Models\Exam;
use App\Models\Aso;

class ExamCreate extends Component
{
    public $busca = [];

    public $inputs = [], $i;

    public $aso_id, $exam_id, $exams = [] , $date = [];

    protected $listeners = ['editExams'];

    public function mount()
    {
        $this->aux      = 1;
        $this->i        = 1;
        array_push($this->inputs , $this->i);
        $this->searchExams();
    }

    public function updated()
    {
        $this->selectExams();
    }

    public function render()
    {
        return view('livewire.aso.components.exam-create');
    }

    public function editExams($id)
    {
        $aso = Aso::find($id);
     
        $this->selectExamsClear();
        $this->inputs = [];

        foreach ($aso->exams as $key => $item) {
            array_push($this->inputs, $key);
            $this->i                = count($aso->exams);
            $this->exam_id[$key]    = $item->pivot->exam_id;
            $this->date[$key]       = $item->pivot->execution_date;
        }
        $this->selectExams();
    }

    public function searchExams()
    {
        $this->exams = Exam::orderBy('description', 'ASC')->get();
    }
    
    public function selectExams()
    {
        $this->emit('selectExams', $this->exam_id, $this->date);
    }

    public function selectExamsClear()
    {
        $this->emit('selectExamsClear');
    }

    public function add()
    {
        $this->i = $this->i + 1;
        array_push($this->inputs , $this->i);
    }

    public function remove($key)
    {
        $this->selectExamsClear();
        unset($this->inputs[$key]);
        unset($this->exam_id[$key]);
        unset($this->date[$key]);
        $this->i = $this->i - 1;
        $this->selectExams();
    }
}
