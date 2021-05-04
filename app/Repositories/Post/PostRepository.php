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

    public function getMyPosts(string $author)
    {
        return $this->model->where('author', '=', $author)->get();
    }

}
