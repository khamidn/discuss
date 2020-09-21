<?php

namespace App\Http\Livewire\Diskusi;

use Livewire\Component;
use App\Models\Discussion;

class Show extends Component
{
    public $discussion; 

    public function mount(Discussion $discussion)
    {
        $this->discussion = $discussion;
    }
    
    public function render()
    {
        
        return view('livewire.diskusi.show')
        			->extends('layouts.app')
        			->section('content');
    }
}
