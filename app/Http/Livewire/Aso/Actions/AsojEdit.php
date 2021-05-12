<?php

namespace App\Http\Livewire\Aso\Actions;

use Livewire\Component;
use App\Models\Aso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AsojEdit extends Component
{
    use AuthorizesRequests;
    
    public $busca,  $user_id = 1;

    public $aso_id, $type, $company_id, $employee_id, $doctor_id, $conclusion_id, $workplace, $post, $physicist, $chemical, $biological, $ergonomic, $accident, $exam_id, $execution_date;

    protected $listeners = ['editJ', 'selectCompany', 'selectEmployee', 'selectDoctor','selectConclusion', 'selectCompanyClear', 'selectEmployeeClear', 'selectExams', 'selectExamsClear'];

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
        return view('livewire.aso.actions.asoj-edit');
    }

    public function editJ($id)
    {   
        $aso = Aso::find($id);

        if (strtotime($aso->created_at->format('Y-m-d')) < strtotime(date('Y-m-d'))) {
            
            $this->authorize('aso.juridica.editar.admin', Auth::user()->can('aso.juridica.editar.admin'));
            
            $this->aso_id           = $aso->id;
            $this->type             = $aso->type;
            $this->company_id       = $aso->company_id;
            $this->employee_id      = $aso->employee_id;
            $this->doctor_id        = $aso->doctor_id;
            $this->conclusion_id    = $aso->conclusion_id;
            $this->workplace        = $aso->workplace;
            $this->post             = $aso->post;
            $this->physicist        = $aso->physicist;
            $this->chemical         = $aso->chemical;
            $this->biological       = $aso->biological;
            $this->ergonomic        = $aso->ergonomic;
            $this->accident         = $aso->accident;
            $this->exam_id          = $aso->exam_id;
            $this->execution_date   = $aso->execution_date;

            if (!empty($this->company_id)) {
                $this->emit('editCompany', $this->company_id);
            }
            if (!empty($this->employee_id)) {
                $this->emit('editEmployee', $this->employee_id);
            }
            if (!empty($this->conclusion_id)) {
                $this->emit('editConclusion', $this->conclusion_id);
            }
            if (!empty($this->doctor_id)) {
                $this->emit('editDoctor', $this->doctor_id);
            }
            if (!empty($this->aso_id)) {
                $this->emit('editExams', $this->aso_id);
            }

            $this->emit('editAsoJ');
        }else{
            
            $this->authorize('aso.juridica.editar', Auth::user()->can('aso.juridica.editar'));

            $this->aso_id           = $aso->id;
            $this->type             = $aso->type;
            $this->company_id       = $aso->company_id;
            $this->employee_id      = $aso->employee_id;
            $this->doctor_id        = $aso->doctor_id;
            $this->conclusion_id    = $aso->conclusion_id;
            $this->workplace        = $aso->workplace;
            $this->post             = $aso->post;
            $this->physicist        = $aso->physicist;
            $this->chemical         = $aso->chemical;
            $this->biological       = $aso->biological;
            $this->ergonomic        = $aso->ergonomic;
            $this->accident         = $aso->accident;
            $this->exam_id          = $aso->exam_id;
            $this->execution_date   = $aso->execution_date;

            if (!empty($this->company_id)) {
                $this->emit('editCompany', $this->company_id);
            }
            if (!empty($this->employee_id)) {
                $this->emit('editEmployee', $this->employee_id);
            }
            if (!empty($this->conclusion_id)) {
                $this->emit('editConclusion', $this->conclusion_id);
            }
            if (!empty($this->doctor_id)) {
                $this->emit('editDoctor', $this->doctor_id);
            }
            if (!empty($this->aso_id)) {
                $this->emit('editExams', $this->aso_id);
            }

            $this->emit('editAsoJ');
        }
    }

    public function update()
    {   
        $this->authorize('aso.juridica.editar', Auth::user()->can('aso.juridica.editar'));

        $this->uppercase();
        
        $aso = Aso::find($this->aso_id);
        $aso->update($this->validate());
        
        $aso->exams()->detach();
        
        foreach ($this->exam_id as $key => $value) {
            $aso->exams()->attach($this->exam_id[$key], ['execution_date' => $this->execution_date[$key] ]);
        }

        return redirect()->to('/asoj');

    }

    public function selectCompany($id)
    {
        $this->company_id = $id;
    }

    public function selectEmployee($id)
    {
        $this->employee_id = $id;
    }

    public function selectExams($id, $date)
    {
        $this->exam_id          = $id;
        $this->execution_date   = $date;
    }

    public function selectDoctor($id)
    {
        $this->doctor_id = $id;
    }

    public function selectConclusion($id)
    {
        $this->conclusion_id = $id;
    }

    public function selectCompanyClear($id)
    {
        $this->company_id = $id;
    }

    public function selectEmployeeClear($id)
    {
        $this->employee_id = $id;
    }

    public function selectExamsClear()
    {
        $this->exams     = '';
        $this->exam_date = '';
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
}
