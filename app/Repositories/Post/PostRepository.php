<?php

namespace App\Repositories\Post;

use App\Models\Post;
use App\Repositories\Repository;

class PostRepository extends Repository implements IPostRepository
{
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    public function getMyPosts(int $id)
    {
        return $this->model->where('user_id', '=', $id)->get();
    }

}
