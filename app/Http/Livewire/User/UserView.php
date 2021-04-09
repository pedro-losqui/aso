<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\User;

class UserView extends Component
{
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
        return view('livewire.user.user-view', [
            'users' => User::where('name', 'LIKE', "%{$this->busca}%")
            ->orWhere('post', 'LIKE', "%{$this->busca}%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function store()
    {
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
