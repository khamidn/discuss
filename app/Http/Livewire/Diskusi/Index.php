<?php

namespace App\Http\Livewire\Diskusi;

use Livewire\Component;
use App\Models\{ Topic, Discussion };

class Index extends Component
{
    public $topic;

    public function render()
    {
        $discussions = Discussion::query()->whereNull('parent_id');


        if ($this->topic !=null ) {
            $discussions->where('topic_id', $this->topic);
        }

        return view('livewire.diskusi.index', [
            'topics' => Topic::with('discussions')->get(),
            'discussions' => $discussions->get(),
        ])
        	->extends('layouts.app')
        	->section('content');
    }

    public function selectTopic($topicId)
    {
        $this->topic = $topicId;
        // $this->resetPage();
    }
}
