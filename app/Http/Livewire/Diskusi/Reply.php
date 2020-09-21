<?php

namespace App\Http\Livewire\Diskusi;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Discussion;

class Reply extends Component
{
    public $parentId;
    public $topicId;
    public $content;

    public function render()
    {
        $discussion = Discussion::findOrFail($this->parentId);

        return view('livewire.diskusi.reply', [
            'discussion' => $discussion
        ]);
    }

    public function replyDiscussion($parentId, $topicId)
    {

        $this->validate([
            'content' => 'required|max:500',
        ]);
        
        $data = array(
            'parent_id' => $parentId,
            'topic_id' => $topicId,
            'content' => $this->content,
            'user_id' => Auth::id(),
        );


        Discussion::create($data);

        $this->content = "";

        session()->flash('message', 'Selamat, anda berhasil menambahkan diskusi baru');
    }
}
