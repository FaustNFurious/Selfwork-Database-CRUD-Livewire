<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;


class SearchPosts extends Component
{

    public $search = '';


    public function render()
    {

        if (!$this->search) {
            $posts = Post::all();
        }
        elseif (!Post::where('title', 'like', '%' . $this->search . '%')->exists()) {
                $posts = Post::all();
                session()->flash('alert', 'Nessun risultato trovato per la ricerca: ' . $this->search);
        }
        else {
            $posts = Post::where('title', 'like', '%' . $this->search . '%')->get();     
        }
        
        return view('livewire.search-posts', compact('posts'));

    }
}
