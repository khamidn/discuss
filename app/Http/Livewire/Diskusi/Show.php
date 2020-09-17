<?php

namespace App\Http\Livewire\Diskusi;

use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.diskusi.show')
        			->extends('layouts.app')
        			->section('content');
    }
}
