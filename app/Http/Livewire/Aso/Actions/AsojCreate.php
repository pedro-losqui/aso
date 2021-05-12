<?php

namespace App\Http\Livewire\Aso\Actions;

use Livewire\Component;
use App\Models\Aso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AsojCreate extends Component
{
    use AuthorizesRequests;

    public $user_id;

    public $type, $company_id, $employee_id, $doctor_id, $conclusion_id, $workplace, $post, $physicist, $chemical, $biological, $ergonomic, $accident, $exam_id, $execution_date;

    protected $listeners = ['selectCompany', 'selectEmployee', 'selectDoctor','selectConclusion', 'selectCompanyClear', 'selectEmployeeClear', 'selectExams', 'selectExamsClear'];

    protected $rules = [
        'user_id'          => 'required',
        'type'             => 'required|string',
        'company_id'       => 'required|integer',
        'employee_id'      => 'required|integer',
        'doctor_id'        => '',
        'conclusion_id'    => '',
        'workplace'        => 'required|string',
        'post'             => 'required|string',
        'physicist'        => '',
        'chemical'         => '',
        'biological'       => '',
        'ergonomic'        => '',
        'accident'         => '',
        'exam_id'          => '',
        'execution_date'   => '',
    ];
    
    public function mount()
    {
       $this->user_id = Auth::user()->id;
    }

    public function render()
    {
        return view('livewire.aso.actions.asoj-create');
    }

    public function store()
    {   
        $this->authorize('aso.juridica.ver', Auth::user()->can('aso.juridica.ver'));
        
        $this->uppercase();

        $aso = Aso::create($this->validate());

        foreach ($this->exam_id as $key => $value) {
            $aso->exams()->attach($this->exam_id[$key], ['execution_date' => $this->execution_date[$key] ]);
        }
        return redirect()->to('/asoj');
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
        $this->exam_id          = $id;
        $this->execution_date   = $date;
    }

    public function selectExamsClear()
    {
        $this->exams     = '';
        $this->exam_date = '';
    }


    public function selectDoctor($id)
    {
        $this->doctor_id = $id;
    }

    public function selectConclusion($id)
    {
        $this->conclusion_id = $id;
    }

    public function uppercase()
    {
        $this->workplace    = ucwords(mb_strtolower($this->workplace, 'UTF-8'));
        $this->post         = ucwords(mb_strtolower($this->post, 'UTF-8'));

        $this->physicist    = ucwords(mb_strtolower($this->physicist, 'UTF-8'));
        $this->chemical     = ucwords(mb_strtolower($this->chemical, 'UTF-8'));
        $this->biological   = ucwords(mb_strtolower($this->biological, 'UTF-8'));
        $this->ergonomic    = ucwords(mb_strtolower($this->ergonomic, 'UTF-8'));
        $this->accident     = ucwords(mb_strtolower($this->accident, 'UTF-8'));
    }

    public function clear()
    {
        $this->busca = '';
    }
}
