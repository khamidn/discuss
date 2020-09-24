<?php

namespace App\Http\Livewire\Diskusi;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\{ Topic, Discussion };

class Index extends Component
{
    use WithFileUploads;

    public $topic;
    public $content;
    public $fields = 0;
    public $images;

    public $photo = [];

    public function mount()
    {
        $this->images = [];
        
    }
    public function handleAddField()
    {
        $this->fields+=1;
    }

    public function handleDetachField()
    {
        $this->fields-=1;
    }



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
    }

    public function newDiscussion($topicId)
    {

        $this->validate([
            'photo' => 'image|max:1024',
        ]);
        // $this->validate([
        //     'content' => 'required|max:500',
        // ]);
        // foreach($this->gambars as $key => $gambar) {
        //     $this->gambars[$key]=$gambar->store('images');
        // }

        


        $data = array(
            'topic_id' => $topicId,
            'content' => $this->content,
            'user_id' => Auth::id(),
        );

        // Discussion::create($data);

        // $this->content = "";

        // session()->flash('message', 'Selamat, anda berhasil menambahkan diskusi baru');
        
    }

    
}
