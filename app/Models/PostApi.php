<?php 
namespace App\Models;

use App\Models\Post;
use App\Exceptions\TravelNotFoundException;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


/**
 * Implements the basic CRUD and `list` actions for `Travel` entity
 * 
 */
class PostApi
{

    /**
     * Creates a travel
     * 
     * @param array $data Travel's data
     * 
     * @return bool
     */
    // public function create(array $data){
    //     try{
    //         $newTravel = Travel::create($data);

    //         // Save the images in the storage and gets the filenames
    //         list($imgHoldAfterDischarge, $imgHoldBeforeDischarge) = $this->saveTravelImages(
    //             $newTravel->id,
    //             [
    //                 'after' => $request->file('image_hold_after_discharge'),
    //                 'before' => $request->file('image_hold_before_discharge')
    //             ]
    //         );

    //         // Updates the travel with the saved filenames into the storage.
    //         $newTravel->image_hold_before_discharge = $imgHoldBeforeDischarge;
    //         $newTravel->image_hold_after_discharge = $imgHoldAfterDischarge;
    //         $newTravel->save();
    //         return true;
    //     }catch(\Exception $e){
    //         // Something was wrong
    //         // @todo - Avoid using generic \Exception class, use specific exception class instead.
    //         return false;
    //     }
    // }

    /**
     * Gets the details of a travel
     * 
     * @param int $id Travel's ID
     * 
     * @throws TravelNotFoundException
     * 
     * @return Travel
     */
    // public function read(int $id){
    //     try{
    //         return Travel::findOrFail($id)->toArray();
    //     }catch(\Exception $e){
    //         throw new TravelNotFoundException("Travel not found");
    //     }
    // }

    /**
     * Lists all post
     * 
     * @param bool $paginate    Flag to indicate if the results should be paginated or not
     * @param int  $rowsPerPage Number of records per page
     * 
     * @return Post[]
     */
    public static function list(bool $paginate = true, int $rowsPerPage = 100){
        return (($paginate === true)?Post::paginate($rowsPerPage):Post::all());
    }

    /**
     * Save travel's images into the storage
     * 
     * @todo Run a tests for this. Wasn't tested yet.
     * 
     * @param int                                     $travelId Travel's ID.
     * @param array<int, Illuminate\Http\UplodedFile> $images   Images uploaded related to the travel.
     * 
     * @return array<int, string> An array with the filename of each image stored.
     */
    // public function saveTravelImages(int $travelId, array $images){
    //     $filenames = [];
    //     foreach($images as $key => $image){
    //         $fileName = srpintf( "%s.%s", Str::random(40), $image->clientExtension());
            
    //         $filenames[$key] = $image->store("images/travels/$travelId/$fileName");
    //     }
    //     return $filenames;
    // }

     /**
     * Gets the details of a travel
     * 
     * @param int $id Travel's ID
     * 
     * @throws PostNotFoundException
     * 
     * @return Post
     */
    public function read(int $id){
        try{
            return Travel::findOrFail($id)->toArray();
        }catch(\Exception $e){
            throw new TravelNotFoundException("Travel not found");
        }
    }

}