<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\PostNotFoundException;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Models\PostApi;
use App\Http\Requests\PostApiRequest;


class PostApiController extends Controller
{
    /**
     * Creates a new post
     * 
     * @param Request $request A request to create a new post
     * 
     * @return json
     */
    public function create(PostApiRequest $request){
        try{
            $data = $request->validated();
            PostApi::create($data);
            return response()->json(
                ["message" => "Success! The post was registered."],
                201
            );
        }catch(\HttpRequestException $e){
            return response()->json(
                ["message" => "Sorry! The post couldn't be registered."],
                400
            );
        }
    }

    /**
     * Deletes a post
     * 
     * @param int  $id         post ID
     * @param bool $hardDelete Flag to indicate if must be hard deleted or not
     * 
     * @return bool
     */
    public function delete(int $id, bool $hardDelete = false)
    {
        // @todo Complete me!!
        return false;
    }


     /**
     * Gets the details of a post
     * 
     * @param Request $request The request object
     * @param int     $id      post's ID
     * 
     * @return json JSON response with post's data
     */

    public function read(Request $request, int $id){
        try{
            $Post = PostApi::read($id);
            return response()->json(
                $Post,
                200
            );
        }catch(PostNotFoundException $e){
            return response()->json(
                ["message" => "Sorry! We couldn't find the post you're looking for."],
                404
            );
        }
    }

    /**
     * Updates a post
     * 
     * @param int $id post ID
     * 
     * @return bool
     */
    public function update(){
        // @todo Complete me!!
        return false;
    }


    /**
     * Lists all posts
     * 
     * @param Request $request Request object
     * 
     * @return json
     */
    public function list(Request $request)
    {
        try{
            $posts = PostApi::list(true, 5, $request->page);
        
            if($posts === false){
                throw new PostNotFoundException("Sorry! There are no posts registered yet.");
            }
            return response()->json(
                $posts,
                200
            );
        }catch(PostNotFoundException $e){
            return response()->json(
                ["message" => $e->getMessage()],
                404
            );
        }
    }

    
}
