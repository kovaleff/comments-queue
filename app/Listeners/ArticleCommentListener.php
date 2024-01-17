<?php

namespace App\Listeners;

use App\Events\ArticleComment;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class ArticleCommentListener implements ShouldQueue
{
    public $connection = 'database';

    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(ArticleComment $comment): void
    {
        $article = $comment->article;
        //check for spam ...
        $comment = new Comment([
            'title' => $comment->comment['title'],
            'comment' => $comment->comment['comment']
        ]);
        $article->comments()->save($comment);
    }
}
