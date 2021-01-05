<?php

namespace App\Http\Livewire\Exam;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Exam;

class ExamView extends Component
{
    public $busca = '', $user_id = 1;

    public $exam_id, $description;

    protected $rules = [
        'user_id'       => 'required',
        'description'   => 'required|string',
    ];

    public function render()
    {
        return view('livewire.exam.exam-view', [
            'exams' => Exam::where('description', 'LIKE', "%{$this->busca}%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function store()
    {
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
        $exam = Exam::find($id);
        $exam->delete();
        session()->flash('delete', 'Exame '. $exam->description . ' foi exluido com sucesso ;)');
        $this->emit('examDelete');
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
