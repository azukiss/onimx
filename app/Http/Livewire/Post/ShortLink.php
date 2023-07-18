<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;

class ShortLink extends Component
{
    public $link;
    public $counter = 5;


    public function render()
    {
        return view('livewire.post.short-link');
    }
}
