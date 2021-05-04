<?php

namespace App\Repositories\Post;

use App\Repositories\IRepository;

interface IPostRepository extends IRepository
{
    public function getMyPosts(string $author);
}
