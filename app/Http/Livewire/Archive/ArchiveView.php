<?php

namespace App\Http\Livewire\Archive;

use Livewire\Component;
use App\Models\Input;
use App\Models\Output;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ArchiveView extends Component
{
    use AuthorizesRequests, WithPagination;

    public $start, $end;

    public $busca, $input, $output, $exams = [];

    public function mount()
    {
        $this->start = date("Y-m-d", strtotime('-6 days'));
        $this->end   = date("Y-m-d", strtotime('+1 days'));
    }

    public function updated()
    {
        if ($this->input) {
            $this->searchInput();
        }
        if ($this->output) {
            $this->searchOutput();
        }
    }

    public function render()
    {
        $this->authorize('historico.liberacao.criar', Auth::user()->can('historico.liberacao.criar'));
        
        return view('livewire.archive.archive-view');
    }

    public function activeInput()
    {
        $this->input = true;
        $this->output = false;
        $this->searchInput();
    }

    public function searchInput()
    {
        $this->exams = '';
        $this->exams = Input::whereBetween('created_at', [$this->start, $this->end])
        ->Where('employee', 'LIKE', "%{$this->busca}%")
        ->orderBy('id', 'DESC')
        ->take(20)
        ->get();
    }

    public function activeOutput()
    {
        $this->output = true;
        $this->input = false;
        $this->searchOutput();
    }

    public function searchOutput()
    {
        $this->exams = '';
        $this->exams = Output::whereBetween('created_at', [$this->start, $this->end])
        ->whereHas('input', function($query) {
            $query->where('employee', 'LIKE', "%{$this->busca}%");
        })
        ->orderBy('id', 'DESC')
        ->take(20)
        ->get();
    }

    public function clear()
    {
        $this->busca = '';
    }
}
