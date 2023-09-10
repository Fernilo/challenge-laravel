<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\PostNotFoundException;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

class PostApiController extends Controller
{
    /**
     * Creates a new post
     * 
     * @param Request $request A request to create a new post
     * 
     * @return json
     */
    public function create(StorePostRequest $request){
        try{
            $post = Post::create($request->all());

            // Updates the post with the saved filenames into the storage.
            $post->imagen = $this->savePostImages($post->id,$request);
            $post->save();
            return response()->json(
                ["message" => "Success! The post was registered."],
                201
            );
        }catch(Exception $e){
            return response()->json(
                ["message" => $e->getMessage()],
                404
            );
        }
    }

    private function savePostImages(int $postId, Request $image)
    {
        $fileName = sprintf( "%s.%s", Str::random(40), $image->file('imagen')->clientExtension());
           
        $image->file('imagen')->storeAs($fileName ,"images/posts/$postId/");
        
        return $fileName;
    }

    /**
     * Deletes a post
     * 
     * @param int  $id         post ID
     * @param bool $hardDelete Flag to indicate if must be hard deleted or not
     * 
     * @return bool
     */
    public function delete(int $id)
    {
        try{
            $post = Post::findOrFail($id);
            $post->delete();
            return response()->json(
                ['message' => 'Success! The post was deleted.'],
                200
            );
        }catch(Exception $e){
            return response()->json(
                ["message" => $e->getMessage()],
                404
            );
        }catch(ModelNotFoundException $e) {
            return response()->json(
                ["message" => "Sorry! We couldn't find the post you're looking for."],
                404
            );
        }
    }


     /**
     * Gets the details of a post
     * 
     * @param Request $request The request object
     * @param int     $id      post's ID
     * 
     * @return json JSON response with post's data
     */

    public function read(int $id){
        try{
            $post = Post::findOrFail($id)->toArray();
            return response()->json(
                $post,
                200
            );
        }catch(ModelNotFoundException $e){
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
    public function update(StorePostRequest $request , int $id){
        try{
            
            $post = Post::findOrFail($id);
            $post->update($request->all());

            if($request->file('imagen')) {
                $post->imagen = $this->savePostImages($post->id,$request);
                $post->save();
            }

            return response()->json(
                ["message" => "Success! The post was updated."],
                201
            );
        }catch(Exception $e){
            return response()->json(
                ["message" => $e->getMessage()],
                404
            );
        }
    }


    /**
     * Lists all posts
     * 
     * @return json
     */
    public function list($paginate = true , $rowsPerPage = 5)
    {
        try{
            $posts = (($paginate === true)?Post::paginate($rowsPerPage):Post::all());

            if(!$posts->count()){
                throw new PostNotFoundException("Sorry! There are no posts registered yet.");
            }

            return response()->json(
                $posts,
                200
            );
        }catch(Exception $e){
            return response()->json(
                ["message" => $e->getMessage()],
                404
            );
        }
    }

    
}
