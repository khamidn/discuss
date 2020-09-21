<?php

namespace App\Http\Livewire\Diskusi;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\{ Topic, Discussion };

class Index extends Component
{
    public $topic;
    public $content;

    public function render()
    {
        $discussions = Discussion::query()->whereNull('parent_id');


        if ($this->topic !=null ) {
            $discussions->where('topic_id', $this->topic);
        }

        return view('livewire.diskusi.index', [
            'topics' => Topic::with('discussions')->get(),
            'discussions' => $discussions
                            ->latest()                
                            ->with('user')
                            ->with('topic')
                            ->get(),
            ])->extends('layouts.app')
        	    ->section('content');
    }

    public function selectTopic($topicId)
    {
        $this->topic = $topicId;
        // $this->resetPage();
    }

    public function newDiscussion($topicId)
    {
        $this->validate([
            'content' => 'required|max:500',
        ]);
        
        $data = array(
            'topic_id' => $topicId,
            'content' => $this->content,
            'user_id' => Auth::id(),
        );

        Discussion::create($data);
        $this->content = "";
        session()->flash('message', 'Selamat, anda berhasil menambahkan diskusi baru');
        
    }
}
