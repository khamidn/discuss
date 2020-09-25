<?php

namespace App\Http\Livewire\Diskusi;

use Livewire\Component;
use App\Models\Discussion;

class Search extends Component
{

    public $search;
    public $discussions;

    protected $updatesQueryString = ['search'];

    public function mount()
    {
        $this->search = request('search');
    }

    public function render()
    {
        if(!empty($this->search)) {
            $this->discussions = Discussion::where('content', 'like', '%'.$this->search.'%')
                                        ->whereNull('parent_id')
                                        ->with('user')
                                        ->with('topic')
                                        ->take(3)
                                        ->get();
        }
        
        return view('livewire.diskusi.search');
    }
}
