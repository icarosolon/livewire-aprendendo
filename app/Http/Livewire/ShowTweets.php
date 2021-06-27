<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tweet;
use Livewire\WithPagination; //paginando sem recarregar pagina

class ShowTweets extends Component
{
    use WithPagination; //paginando sem recarregar pagina

    public $content = '';
    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];

    public function render()
    {
        $tweets = Tweet::with('user')->paginate(2);
        return view('livewire.show-tweets', compact('tweets'));
    }

    public function create()
    {
        $this->validate();
        Tweet::create([
            'content' => $this->content,
            'user_id' => auth()->user()->id,
        ]);
        $this->content = '';
    }
}
