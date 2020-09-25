<?php

namespace App\Http\Livewire\Diskusi;

use App\Models\Discussion;
use Livewire\{ Component, WithPagination };
use Illuminate\Pagination\Paginator;

class Search extends Component
{
    use WithPagination;
    public $search;
    protected $searchDiscussions;
    

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if(!empty($this->search)) {
            $this->searchDiscussions= Discussion::query()
                                        ->when($this->search, function($query) {
                                            return $query->where('content', 'like', '%'.$this->search.'%');
                                        })
                                        ->whereNull('parent_id')
                                        ->with('user')
                                        ->with('topic')
                                        ->paginate(3);
        }
        
        return view('livewire.diskusi.search', [
            'searchDiscussions' => $this->searchDiscussions
        ]);
    }
}
