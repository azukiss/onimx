<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;

class ShortLink extends Component
{
    public int $count;
    public bool $finishedCount;
    public string $link;

    public function mount()
    {
        $this->count = 5;
        $this->finishedCount = false;
    }

    public function countdown()
    {
        if ($this->count <= 0)
        {
            $this->finishedCount = true;
        }
        else
        {
            $this->count = $this->count - 1;
        }
    }

    public function render()
    {
        return view('livewire.post.short-link');
    }
}
