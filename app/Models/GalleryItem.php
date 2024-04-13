<?php

namespace App\Models;

use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class GalleryItem extends Model
{
    use HasFactory;
    use CommonFunctions;
    protected $table = "gallery_items";

    const TABLE_NAME = "gallery_items";

    const ID = 'id';
    const LOCAL_IMAGE = 'local_image';
    const IMAGE_LINK = 'image_link';
    const ALTERNATE_TEXT = 'alternate_text';
    const LOCAL_VIDEO = 'local_video';
    const VIDEO_LINK = 'video_link';
    const TITLE = 'title';
    const DESCRIPTION = 'description';
    const POSITION = 'position';
    const VIEW_STATUS = 'view_status';
    const FILTER_CATEGORY = "filter_category";
    const STATUS = 'status';
    const CREATED_BY = 'created_by';
    const CREATED_AT = 'created_at';
    const UPDATED_BY = 'updated_by';
    const UPDATED_AT = 'updated_at';
    const VIEW_STATUS_VISIBLE = "visible";

    const IMAGE_UPLOAD_PATH = "/upload/gallery/images/";
    const VIDEO_UPLOAD_PATH = "/upload/gallery/videos/";
    public function addGalleryItem(Request $request)
    {
        try{
            $insert = [
                self::IMAGE_LINK=>$request->input(self::IMAGE_LINK),
                self::VIDEO_LINK=>$request->input(self::VIDEO_LINK),
                self::ALTERNATE_TEXT=>$request->input(self::ALTERNATE_TEXT),
                self::TITLE=>$request->input(self::TITLE),
                self::DESCRIPTION=>$request->input(self::DESCRIPTION),
                self::POSITION=>$request->input(self::POSITION),
                self::VIEW_STATUS=>$request->input(self::VIEW_STATUS),
                self::FILTER_CATEGORY=>$request->input(self::FILTER_CATEGORY),
                self::STATUS=>1,
                self::CREATED_BY=>Auth::user()->id,
            ];
            $maxId = GalleryItem::max(self::ID);
            if(empty($maxId)){
                $maxId = 1;
            }else{
                $maxId++;
            }
            if($request->file(self::LOCAL_IMAGE)){
                foreach($request->file(self::LOCAL_IMAGE) as $galleryItem){
                    
                    $fileName = $galleryItem->getClientOriginalName();
                    $fileName = "Img_$maxId".preg_replace('/[^A-Za-z0-9.\-]/', '', $fileName);
                    $galleryItem->move(public_path().self::IMAGE_UPLOAD_PATH, $fileName);
                    $insert[self::LOCAL_IMAGE] = self::IMAGE_UPLOAD_PATH.$fileName;
                    GalleryItem::insert($insert);
                    $maxId++;
                }
            }
            if($request->file(self::LOCAL_VIDEO)){
                $insert[self::LOCAL_IMAGE] = null;
                $video = $request->file(self::LOCAL_VIDEO);
                $fileName = $video->getClientOriginalName();
                $fileName = "Video_$maxId".preg_replace('/[^A-Za-z0-9.\-]/', '', $fileName);
                $video->move(public_path().self::VIDEO_UPLOAD_PATH, $fileName);
                $insert[self::LOCAL_VIDEO] = self::VIDEO_UPLOAD_PATH.$fileName;
                GalleryItem::insert($insert);
            }
            if($request->input(self::VIDEO_LINK)){
                $insert[self::VIDEO_LINK] = $request->input(self::VIDEO_LINK);
                GalleryItem::insert($insert);
            }
            Cache::forget("galleryImages");
            return ["status"=>true,"message"=>"Gallery Item saved.","data"=>"null"];

        }catch(Exception $exception){
            $this->reportException($exception);
            return ["status"=>false,"message"=>"Something went wrong.","data"=>"null"];
        }
    }

    public function updateGalleryItem(Request $request){
        try{
            $check = self::where([
                [self::ID,$request->input(self::ID)],
                [self::STATUS,1]])->first();
            if($check){
                $update = [
                    self::IMAGE_LINK=>$request->input(self::IMAGE_LINK),
                    self::VIDEO_LINK=>$request->input(self::VIDEO_LINK),
                    self::ALTERNATE_TEXT=>$request->input(self::ALTERNATE_TEXT),
                    self::TITLE=>$request->input(self::TITLE),
                    self::DESCRIPTION=>$request->input(self::DESCRIPTION),
                    self::POSITION=>$request->input(self::POSITION),
                    self::VIEW_STATUS=>$request->input(self::VIEW_STATUS),
                    self::FILTER_CATEGORY=>$request->input(self::FILTER_CATEGORY),
                    self::STATUS=>1,
                    self::UPDATED_BY=>Auth::user()->id,
                ];
                GalleryItem::where(self::ID,$check->{self::ID})->update($update);
                $maxId = GalleryItem::max(self::ID);
                if(empty($maxId)){
                    $maxId = 1;
                }else{
                    $maxId++;
                }
                if($request->file(self::LOCAL_IMAGE)){
                    
                    $i = 0 ;
                    foreach($request->file(self::LOCAL_IMAGE) as $galleryItem){
                        
                        $fileName = $galleryItem->getClientOriginalName();
                        $fileName = "Img_$maxId".preg_replace('/[^A-Za-z0-9.\-]/', '', $fileName);
                        $galleryItem->move(public_path().self::IMAGE_UPLOAD_PATH, $fileName);
                        $update[self::LOCAL_IMAGE] = self::IMAGE_UPLOAD_PATH.$fileName;
                        if($i==0){
                            GalleryItem::where(self::ID,$check->{self::ID})->update($update);
                            if($check->{self::LOCAL_IMAGE}){
                                File::delete(app_path($check->{self::LOCAL_IMAGE}));
                            }
                            
                        }else{
                            unset($update[self::UPDATED_BY]);
                            $update[self::CREATED_BY] = Auth::user()->id;
                            
                            GalleryItem::insert($update);
                        }
                        
                        $maxId++;
                        $i++;
                    }
                }
                

                if($request->file(self::LOCAL_VIDEO)){
                    $insert[self::LOCAL_IMAGE] = null;
                    $video = $request->file(self::LOCAL_VIDEO);
                    $fileName = $video->getClientOriginalName();
                    $fileName = "Video_$maxId".preg_replace('/[^A-Za-z0-9.\-]/', '', $fileName);
                    $video->move(public_path().self::VIDEO_UPLOAD_PATH, $fileName);
                    $update[self::LOCAL_VIDEO] = self::VIDEO_UPLOAD_PATH.$fileName;
                    if($check->{self::LOCAL_VIDEO}){
                        File::delete(app_path($check->{self::LOCAL_VIDEO}));
                    }
                    $update[self::UPDATED_BY] = Auth::user()->id;
                    GalleryItem::where(self::ID,$check->{self::ID})->update($update);
                }
                $return = ["status"=>true,"message"=>"Updated.","data"=>"null"];  
            }else{
                $return = ["status"=>false,"message"=>"Not found.","data"=>"null"];
            }    
            return $return;
        }catch(Exception $exception){
            $this->reportException($exception);
            return ["status"=>false,"message"=>"Something went wrong.","data"=>"null"];
        }
    }
    
    /**
     * getAllGalleryImages
     *
     * @return void
     */
    public function getAllGalleryImages(){
        return self::where([
            [self::STATUS,1],
            [self::VIEW_STATUS,self::VIEW_STATUS_VISIBLE]
        ])->select(self::LOCAL_IMAGE,
        self::IMAGE_LINK,self::ALTERNATE_TEXT,self::TITLE,self::DESCRIPTION)
        ->whereNULL(self::VIDEO_LINK)
        ->whereNULL(self::LOCAL_VIDEO)->orderBy(self::POSITION,'asc')->get();
    }
    
    /**
     * deleteGalleryItem
     *
     * @param  mixed $requestData
     * @return void
     */
    public function deleteGalleryItem($requestData){
        
        try {
            $check = self::where([
                [self::ID, $requestData[self::ID]],
                [self::STATUS,1],
            ])->first();
            if($check){
                $check->{self::STATUS} = 0;
                $check->{self::UPDATED_BY} = Auth::id();
                $check->save();
                $return = ["status" => true, "message" => "Deleted", "data" => null];
            } else {
                $return = ["status" => false, "message" => "Record not found", "data" => null];
            }
        } catch (Exception $exception) {
            $return = ["status" => false, "message" => $exception->getMessage(), "data" => null];
        }
        return $return;
    }
    
    /**
     * getAllGalleryVideos
     *
     * @return void
     */
    public function getAllGalleryVideos(){
        return self::where([
            [self::STATUS,1],
            [self::VIEW_STATUS,self::VIEW_STATUS_VISIBLE]
        ])->select(self::LOCAL_VIDEO,
        self::VIDEO_LINK,self::ALTERNATE_TEXT,self::TITLE,self::DESCRIPTION)
        ->whereNULL(self::IMAGE_LINK)
        ->whereNULL(self::LOCAL_IMAGE)->orderBy(self::POSITION,'asc')->get();
    }
}
