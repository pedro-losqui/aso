<?php

namespace App\Http\Livewire\Aso;

use Livewire\Component;
use App\Models\Aso;

class ArchiveView extends Component
{
    public $start, $end;

    public $busca, $asoj, $asof, $aso = [];

    public function mount()
    {
        $this->start = date("Y-m-d", strtotime('-6 days'));
        $this->end   = date("Y-m-d", strtotime('+1 days'));
    }

    public function updated()
    {
        if ($this->asoj) {
            $this->searchAsoJ();
        }
        if ($this->asof) {
            $this->searchAsoF();
        }
    }

    public function render()
    {
        return view('livewire.aso.archive-view');
    }

    public function activeAsoJ()
    {
        $this->asoj = true;
        $this->asof = false;
        $this->searchAsoJ();
    }

    public function searchAsoJ()
    {
        $this->aso = '';
        $this->aso = Aso::whereNotNull('company_id')
        ->whereHas('employee', function($query) {
            $query->where('name', 'LIKE', "%{$this->busca}%");
        })
        ->whereBetween('created_at', [$this->start, $this->end])
        ->orderBy('id', 'DESC')
        ->take(20)
        ->get();
    }

    public function activeAsoF()
    {
        $this->asof = true;
        $this->asoj = false;
        $this->searchAsoF();
    }

    public function searchAsoF()
    {
        $this->aso = '';
        $this->aso = Aso::whereNotNull('people_id')
        ->whereHas('employee', function($query) {
            $query->where('name', 'LIKE', "%{$this->busca}%");
        })
        ->whereBetween('created_at', [$this->start, $this->end])
        ->orderBy('id', 'DESC')
        ->take(20)
        ->get();
    }

    public function editJ($id)
    {
        $this->emit('editJ', $id);
    }

    public function editF($id)
    {
        $this->emit('editF', $id);
    }

    public function clear()
    {
        $this->busca = '';
    }
}
