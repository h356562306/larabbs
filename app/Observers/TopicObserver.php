<?php

namespace App\Observers;

use App\Models\Topic;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function creating(Topic $topic)
    {
        //
    }

    public function updating(Topic $topic)
    {
        //
    }

    public function saveing(Topic $topic){
        $topic->body = clean($topic->body,'user_topic_body');
        $topic->excerpt = make_excerpt($topic->body);
    }
}
