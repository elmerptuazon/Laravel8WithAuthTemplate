<?php

namespace App\Repositories\Comment;

use App\Models\Comment;
use App\Repositories\Repository;

class CommentRepository extends Repository implements ICommentRepository
{
    public function __construct(Comment $model)
    {
        parent::__construct($model);
    }

}
