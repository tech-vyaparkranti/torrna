<?php
namespace App\Traits;

use App\Mail\ContactUsEMail;
use App\Models\ContactUsModel;
use App\Models\GalleryItem;
use Carbon\Carbon;
use Exception;
use Intervention\Image\Facades\Image;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

trait CommonFunctions{

    public function reportException(Exception $exception){
        Log::alert(json_encode([
            "message"=>$exception->getMessage(),
            "File"=>$exception->getFile(),
            "Code"=>$exception->getCode(),
            "Trace as string"=>$exception->getTraceAsString()
        ]));
    }

    public function uploadLocalFile(FormRequest $fileObject,$key_name,$upload_path,$file_name = "",int $height = null,int $width = null):array{
        try{
            $uploadFile = $fileObject->file($key_name);
             
            $fileName = $uploadFile->getClientOriginalName();

            $fileNameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME);
            $fileExtension = $uploadFile->extension();
            $timeString = strtotime($this->timeNow());
            $fileName = "file_$timeString".$file_name.preg_replace('/[^A-Za-z0-9.\-]/', '', $fileName);
            $fileUploaded = $uploadFile->move(public_path().$upload_path, $fileName);
            $data = $upload_path.$fileName;
            if($height && $width){
                $newName = $upload_path.$fileNameWithoutExtension."img_$timeString"."_cropped.$fileExtension";
                $resizeImage = Image::make(public_path().$upload_path.$fileName);
                 
                $resizeImage->resize($width,$height,function($constraint){
                    $constraint->aspectRatio();
                })->crop($width,$height)->save(public_path().$newName,100,$fileExtension);
                if(file_exists(public_path().$newName)){
                    $data = $newName;
                }
            }
            if($fileUploaded){
                $return = ["status"=>true,"message"=>"Success","data"=>$data];
            }else{
                $return = ["status"=>false,"message"=>"failed","data"=>$fileUploaded];
            }
        }catch(Exception $exception){
            $this->reportException($exception);
            $return = ["status"=>false,"message"=>$exception->getMessage(),"data"=>$exception->getMessage()];
        } 
        return $return;
    }

    public function timeNow(){
        return Carbon::now();
    }
    public function returnMessage($message,$status=false,$data = []){
        return ["status"=>$status,"message"=>$message,"data"=>$data];
    }

    public function getCachedGalleryItems(){
        return Cache::rememberForever('galleryImages', function () {
            return GalleryItem::where([
                [GalleryItem::STATUS,1],
                [GalleryItem::VIEW_STATUS,GalleryItem::VIEW_STATUS_VISIBLE]
            ])->select(GalleryItem::LOCAL_IMAGE,
            GalleryItem::IMAGE_LINK,GalleryItem::ALTERNATE_TEXT,GalleryItem::TITLE,GalleryItem::DESCRIPTION,
            GalleryItem::FILTER_CATEGORY)
            ->whereNULL(GalleryItem::VIDEO_LINK)
            ->whereNULL(GalleryItem::LOCAL_VIDEO)->orderBy(GalleryItem::POSITION,'asc')->get();
        });
    }

    public function sendContactUsEmail(ContactUsModel $contactUsModel){
        try{
            Mail::to("travel@torna.in")
            ->cc(["tornaholidays@gmail.com"])->send(new ContactUsEMail,
            $contactUsModel->toArray());
        }catch(Exception $exception){
            report($exception);
        }
    }
    public function getIp(){
        foreach (array('REMOTE_ADDR','HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return the server IP if the client IP is not found using this method.
    }
}