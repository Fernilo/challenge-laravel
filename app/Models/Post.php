<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected static function boot() {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->titulo);
        });
    }

    /**
     * Creates a post
     * 
     * @param array $data Post's data
     * 
     * @return bool
     */

    // public function create(array $data)
    // {
    //     try {
    //         $newPost = Post::create($data);

    //         // Save the images in the storage and gets the filenames
    //         list($imgHoldAfterDischarge, $imgHoldBeforeDischarge) = $this->savePostImages(
    //             $newPost->id,
    //             [
    //                 'after' => $request->file('image_hold_after_discharge'),
    //                 'before' => $request->file('image_hold_before_discharge')
    //             ]
    //         );

    //         // Updates the Post with the saved filenames into the storage.
    //         $newPost->image_hold_before_discharge = $imgHoldBeforeDischarge;
    //         $newPost->image_hold_after_discharge = $imgHoldAfterDischarge;
    //         $newPost->save();
    //         return true;

    //     } catch (\Throwable $th) {
    //         //throw $th;

    //         return false;
    //     }
    // }

     /**
     * Save post's images into the storage
     * 
     * @todo Run a tests for this. Wasn't tested yet.
     * 
     * @param int $postId post's ID.
     * @param array<int, Illuminate\Http\UplodedFile> $images   Images uploaded related to the post.
     * 
     * @return array<int, string> An array with the filename of each image stored.
     */
    // public function savePostImages(int $postlId, array $images){
    //     $filenames = [];
    //     foreach($images as $key => $image){
    //         $fileName = srpintf( "%s.%s", Str::random(40), $image->clientExtension());
            
    //         $filenames[$key] = $image->store("images/post/$postlId/$fileName");
    //     }
    //     return $filenames;
    // }


    /**
     * Gets the details of a post
     * 
     * @param int $id Post's ID
     * 
     * @throws PostlNotFoundException
     * 
     * @return Post
     */
    // public function read(int $id){
    //     try{
    //         return Post::findOrFail($id)->toArray();
    //     }catch(\Exception $e){
    //         throw new PostNotFoundException("Post not found");
    //     }
    // }

    /**
     * Lists all posts
     * 
     * @param bool $paginate    Flag to indicate if the results should be paginated or not
     * @param int  $rowsPerPage Number of records per page
     * 
     * @return Post[]
     */
    // public function list(bool $paginate = true, int $rowsPerPage = 100)
    // {
    //     return (($paginate === true)?Post::paginate($rowsPerPage):Post::all());
    // }

}
