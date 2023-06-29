<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{
    public function before(User $user, $ability)
    {
        if ($user->isAdmin()) { //Admin peut modifier ou supp. ce qu'il souhaite
            return true;
        }
    }
    public function update(User $user, Comment $comment): bool
    {
        return $user->id == $comment->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Comment $comment): bool
    {
        return $user->id == $comment->user_id || $user->id == $comment->post->user_id; // seul l'User peut supp son commentaire.

    }
}
