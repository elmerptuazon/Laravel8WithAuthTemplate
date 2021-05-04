<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Comment\ICommentRepository;
use App\Repositories\Post\IPostRepository;
use Illuminate\Http\JsonResponse;
use App\Services\Responses\IResponseService;
use App\Http\Requests\Comment\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Enums\SuccessMessages;

class CommentController extends Controller
{

    private ICommentRepository $commentRepository;
    private IPostRepository $postRepository;
    private IResponseService $responseService;
    
    public function __construct(ICommentRepository $commentRepository,
                                IResponseService $responseService,
                                IPostRepository $postRepository)
    {
        $this->commentRepository = $commentRepository;
        $this->responseService = $responseService;
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $records = Post::find($post->id);

        return $this->responseService->successResponse($records->comments->toArray(), SuccessMessages::success);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request, Post $post)
    {
        $details = $request->validated();
        $details["post_id"] = $post->id;
        $details["author"] = strtolower($request->user()->name);
        $createRecord = $this->commentRepository->create($details);

        return $this->responseService->successResponse($createRecord->toArray(), SuccessMessages::commentCreated);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return $this->responseService->successResponse($comment->toArray(), SuccessMessages::success);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        $details = $request->validated();
        $updateRecord = $this->postRepository->update($comment, $details);

        return $this->responseService->successResponse($comment->toArray(), SuccessMessages::postUpdated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Comment $comment)
    {
        
        // $this->postRepository->delete($post);
        $this->commentRepository->delete($comment);

        return $this->responseService->successResponse(null, SuccessMessages::recordDeleted);
    }
}
