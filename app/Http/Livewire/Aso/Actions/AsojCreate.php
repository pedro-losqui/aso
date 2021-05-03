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
        $this->workplace    = ucwords(strtolower($this->workplace));
        $this->post         = ucwords(strtolower($this->post));

        $this->physicist    = ucwords(strtolower($this->physicist));
        $this->chemical     = ucwords(strtolower($this->chemical));
        $this->biological   = ucwords(strtolower($this->biological));
        $this->ergonomic    = ucwords(strtolower($this->ergonomic));
        $this->accident     = ucwords(strtolower($this->accident));
    }

    public function clear()
    {
        $this->busca = '';
    }
}
