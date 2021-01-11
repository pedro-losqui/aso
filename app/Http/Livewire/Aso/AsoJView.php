<?php

namespace App\Http\Livewire\Aso;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Aso;

class AsoJView extends Component
{
    public $busca = '',  $user_id = 1;

    public $type, $company_id, $employee_id, $doctor_id, $conclusion_id, $workplace, $post, $physicist, $chemical, $biological, $ergonomic, $accident, $exams, $exam_date;

    protected $listeners = ['selectCompany', 'selectEmployee', 'selectConclusion', 'selectCompanyClear', 'selectEmployeeClear', 'selectExams', 'selectExamsClear'];

    protected $rules = [
        'type'          => 'required|string',
        'company_id'    => 'required|integer',
        'employee_id'   => 'required|integer',
        'doctor_id'     => '',
        'conclusion_id' => '',
        'workplace'     => 'required|string',
        'post'          => 'required|string',
        'physicist'     => '',
        'chemical'      => '',
        'biological'    => '',
        'ergonomic'     => '',
        'accident'      => '',
        'exams'         => '',
        'exam_date'     => '',
    ];

    public function render()
    {
        return view('livewire.aso.aso-j-view', [
            'aso' => Aso::whereNotNull('company_id') 
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function store()
    {
        dd($this->validate());
    }

    public function selectCompany($id)
    {
        $this->company_id = $id;
    }
    
    public function selectCompanyClear($id)
    {
        $this->company_id = $id;
    }

    public function selectEmployee($id)
    {
        $this->employee_id = $id;
    }

    public function selectEmployeeClear($id)
    {
        $this->employee_id = $id;
    }

    public function selectExams($id, $date)
    {
        $this->exams     = $id;
        $this->exam_date = $date;
    }

    public function selectExamsClear()
    {
        $this->exams     = '';
        $this->exam_date = '';
    }


    public function selectConclusion($id)
    {
        $this->conclusion_id = $id;
    }

    public function default()
    {
        $this->type             = '';
        $this->company_id       = '';
        $this->employee_id      = '';
        $this->doctor_id        = '';
        $this->conclusion_id    = '';
        $this->workplace        = '';
        $this->post             = ''; 
        $this->physicist        = '';
        $this->chemical         = ''; 
        $this->biological       = '';
        $this->ergonomic        = '';
        $this->accident         = '';
    }

    public function clear()
    {
        $this->busca = '';
    }
}
