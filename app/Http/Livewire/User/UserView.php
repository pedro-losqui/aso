<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserView extends Component
{
    use AuthorizesRequests;
    
    public $busca = '', $reset = false;

    public $user_id, $name, $login, $password, $password_confirm, $avatar, $post, $profile, $profiles = [];

    protected $rules = [
        'name'              => 'required|string',
        'login'             => 'required|string',
        'password'          => 'required|string',
        'password_confirm'  => 'required|same:password',
        'post'              => 'required|string'
    ];

    public function render()
    {
        $this->authorize('usuario.ver', Auth::user()->can('usuario.ver'));

        return view('livewire.user.user-view', [
            'users' => User::where('name', 'LIKE', "%{$this->busca}%")
            ->orWhere('post', 'LIKE', "%{$this->busca}%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function store()
    {
        $this->authorize('usuario.criar', Auth::user()->can('usuario.criar'));

        $this->firstUppercase();
        $this->lowercase();
        $user = User::create([
            'name'      => $this->name,
            'login'     => $this->login,
            'password'  => Hash::make($this->password),
            'post'      => $this->post,
        ]);

        session()->flash('success', 'Usuário '. $user->name . ' registrado com sucesso ;)');
        $this->emit('userStore');
        $this->default();
    }

    public function edit($id)
    {
        $this->authorize('usuario.editar', Auth::user()->can('usuario.editar'));

        $user = User::find($id);
        $this->user_id     = $user->id;
        $this->name        = $user->name;
        $this->login       = $user->login;
        $this->post        = $user->post;
        $this->profiles    = Role::all();
    }

    public function update()
    {
        $this->firstUppercase();
        $this->lowercase();
        $data = $this->validate([
            'name'              => 'required|string',
            'login'             => 'required|string',
            'post'              => 'required|string',
        ]);

        $user = User::find($this->user_id);
        $user->update($data);
        $user->assignRole($this->profile);

        if ($this->password) {
            
            $this->validate([
                'password'          => 'required|string',
                'password_confirm'  => 'required|same:password',
            ]);

            $user->password = Hash::make($this->password);
            $user->assignRole($this->profile);
            $user->update();
        }

        session()->flash('update', 'Usuário '. $user->name . ' foi atualizado com sucesso ;)');
        $this->emit('userUpdate');
        $this->default();
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        session()->flash('delete', 'usuário '. $user->name . ' foi exluido com sucesso ;)');
        $this->emit('userDelete');
    }

    public function firstUppercase()
    {
        $this->name = ucwords(strtolower($this->name));
        $this->post = ucwords(strtolower($this->post));
    }

    public function lowercase()
    {
        $this->login = strtolower($this->login);
    }

    public function default()
    {
        $this->name             = '';
        $this->login            = '';
        $this->password         = '';
        $this->password_confirm = '';
        $this->post             = '';
    }

    public function clear()
    {
        $this->busca = '';
    }
}
