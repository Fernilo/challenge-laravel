<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    /**
     * Creates a new post
     * 
     * @param Request $request A request to create a new post
     * 
     * @return json
     */
    public function create(PostlApiRequest $request){
        try{
            $data = $request->validated();
            Post::create($data);
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
     * Deletes a travel
     * 
     * @param int  $id         Travel ID
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
        }catch(TravelNotFoundException $e){
            return response()->json(
                ["message" => "Sorry! We couldn't find the travel you're looking for."],
                404
            );
        }
    }

    /**
     * Updates a travel
     * 
     * @param int $id Travel ID
     * 
     * @return bool
     */
    public function update(){
        // @todo Complete me!!
        return false;
    }


    /**
     * Lists all travels
     * 
     * @param Request $request Request object
     * 
     * @return json
     */
    public function list(Request $request)
    {
        try{
            $travels = TravelApi::list(true, 100, $request->page);
            if($travels === false){
                throw new TravelNotFoundException("Sorry! There are no travels registered yet.");
            }
            return response()->json(
                $travels,
                200
            );
        }catch(TravelNotFoundException $e){
            return response()->json(
                ["message" => $e->getMessage()],
                404
            );
        }
    }

    
}
