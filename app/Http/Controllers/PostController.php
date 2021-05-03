<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Post\IPostRepository;
use Illuminate\Http\JsonResponse;
use App\Services\Responses\IResponseService;
use App\Http\Requests\Post\PostRequest;
use App\Models\Post;
use App\Enums\SuccessMessages;

class PostController extends Controller
{
    private IPostRepository $postRepository;
    private IResponseService $responseService;
    
    public function __construct(IPostRepository $postRepository,
                                IResponseService $responseService)
    {
        $this->postRepository = $postRepository;
        $this->responseService = $responseService;
    }

    /**
     * Display a listing of the resource.
     *
     *@return JsonResponse
     */
    public function index(): JsonResponse
    {
        $records = $this->postRepository->getAll();

        return $this->responseService->successResponse($records->toArray(), SuccessMessages::success);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostRequest $request
     * @return JsonResponse
     */
    public function store(PostRequest $request): JsonResponse
    {
        $details = $request->validated();
        $details["author"] = strtolower($request->user()->name);
        $createRecord = $this->postRepository->create($details);

        return $this->responseService->successResponse($createRecord->toArray(), SuccessMessages::postCreated);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post): JsonResponse
    {
        return $this->responseService->successResponse($post->toArray(), SuccessMessages::success);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post): JsonResponse
    {
        $details = $request->validated();
        $updateRecord = $this->postRepository->update($post, $details);

        return $this->responseService->successResponse($post->toArray(), SuccessMessages::postUpdated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post): JsonResponse
    {
        $deleteRecord = $this->postRepository->delete($post);

        return $this->responseService->successResponse(null, SuccessMessages::recordDeleted);
    }
}
