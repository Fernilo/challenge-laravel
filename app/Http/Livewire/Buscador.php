<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use PDO;
use Livewire\WithPagination;

class Buscador extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';//Este elemento es accesible desde esta clase y las heredaras

    public $search;

    public function render()
    {
        $posts = Post::where('titulo', 'LIKE' ,'%' .$this->search.'%')->latest('id')->paginate();
        return view('livewire.buscador',compact('posts'));
    }
}
