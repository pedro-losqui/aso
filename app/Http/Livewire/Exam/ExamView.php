<?php

namespace App\Http\Livewire\Exam;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Exam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ExamView extends Component
{
    use AuthorizesRequests;

    public $busca = '', $user_id;

    public $exam_id, $description;

    protected $rules = [
        'user_id'       => 'required',
        'description'   => 'required|string',
    ];

    public function mount()
    {
       $this->user_id = Auth::user()->id;
    }

    public function render()
    {
        $this->authorize('exames.ver', Auth::user()->can('exames.ver'));

        return view('livewire.exam.exam-view', [
            'exams' => Exam::where('description', 'LIKE', "%{$this->busca}%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function store()
    {
        $this->authorize('exames.criar', Auth::user()->can('exames.criar'));

        $this->firstUppercase();
        $exam = Exam::create($this->validate());
        session()->flash('success', 'Exame '. $exam->description . ' registrado com sucesso ;)');
        $this->emit('examStore');
        $this->default();
    }

    public function edit($id)
    {
        $exam = Exam::find($id);
        $this->exam_id       = $exam->id;
        $this->description    = $exam->description;
    }

    public function update()
    {
        $this->authorize('exames.editar', Auth::user()->can('exames.editar'));

        $data = $this->validate([
            'user_id'       => 'required',
            'description'   => 'required|string'
        ]);

        $exam = Exam::find($this->exam_id);
        $exam->update($data);
        session()->flash('update', 'Exame '. $exam->description . ' foi atualizado com sucesso ;)');
        $this->emit('examUpdate');
        $this->default();
    }

    public function delete($id)
    {
        $this->authorize('exames.excluir', Auth::user()->can('exames.excluir'));

        $exam = Exam::find($id);
        $exam->delete();
        session()->flash('delete', 'Exame '. $exam->description . ' foi exluido com sucesso ;)');
        $this->emit('examDelete');
    }

    public function firstUppercase()
    {
        $words = strtolower($this->description);
        $this->description = ucwords($words);
    }

    public function default()
    {
        $this->description  = '';
    }

    public function clear()
    {
        $this->busca = '';
    }
}
