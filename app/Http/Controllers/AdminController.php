<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use App\Models\NavMenu;
use App\Models\User;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
class AdminController extends Controller
{
    use CommonFunctions;
    public function adminLogin(){
        $page_title = "Login";
        return view("Admin.login",compact("page_title"));
    }

    public function dashboard(){
        try{
            return view("Dashboard.dashboard_home");

        }catch(Exception $exception){
            $this->reportException($exception);
        }
    }
    public function siteNav(Request $request){
        try{
            $all_parent = (new NavMenu())->getParentNavMenu();
            return view("Dashboard.Pages.site_navigation",compact("all_parent"));

        }catch(Exception $exception){
            $this->reportException($exception);
        }
    }
    
    public function Login()
    {
        try{
            return view("Admin.adminLogin");

        }catch(Exception $exception){
            $this->reportException($exception);
        }
    }

    public function AdminLoginUser(Request $request){
        try{

            $validate = Validator::make($request->all(),[
                User::EMAIL=>"bail|required|email",
                "password"=>"bail|required"
            ]);
            if($validate->fails()){
                $return = redirect()->back()->withInput()->with("error",$validate->getMessageBag()->first());
            }else{
                $findUser = User::where([
                        [User::EMAIL,$request->input(User::EMAIL)]
                    ])->first();
                if(empty($findUser)){
                    $return = redirect()->back()->withInput()->with("error","Invalid details");
                }else if(Auth::attempt(['email' => $request->input(User::EMAIL), 'password' => $request->input(User::PASSWORD)])){
                    $request->session()->regenerate();                    
                    $return = redirect("new-dashboard");
                }else{
                    $return = redirect()->back()->withInput()->with("error","Invalid details");
                }    
            }
             
            return $return;
        }catch(Exception $exception){
            $this->reportException($exception);
        }
    }    
    /**
     * addEditNavigation
     *
     * @param  mixed $request
     * @return void
     */
    public function addEditNavigation(Request $request){
        try{
            $validate = Validator::make($request->all(),[
                NavMenu::TITLE=>"bail|string|required_if:action,insert,update",
                NavMenu::URL=>"bail|required_if:action,insert,update|string",
                NavMenu::URL_TARGET=>"bail|nullable|string|in:_blank,_self,_parent,_top",
                NavMenu::NAV_TYPE=>"bail|required_if:action,insert,update|string|in:mobile,top,footer",
                NavMenu::VIEW_IN_LIST=>"bail|required_if:action,insert,update|in:yes,no",
                NavMenu::POSITION=>"bail|nullable|numeric",
                "action"=>"required|in:insert,update",
                NavMenu::ID=>"required_if:action,update"
            ]);
            if($validate->fails()){
                $return = redirect()->back()->withInput()->with("error",$validate->getMessageBag()->first());
            }else{
                
                if($request->input("action")=="insert"){
                    $return = (new NavMenu())->insertNavMenu($request->all());
                }elseif($request->input("action")=="update"){
                    $return = (new NavMenu())->updateNavMenu($request->all());
                }else{
                    $return = ["status"=>false,"message"=>"Invalid action","data"=>null];
                }
                if($return["status"]){
                    $return = redirect()->back()->with("success",$return["message"]);
                }else{
                    $return = redirect()->back()->withInput()->with("error",$return["message"]);
                }                
            }
            return $return;
        }catch(Exception $exception){
            $this->reportException($exception);
        }
    }
    
    /**
     * navDataTable
     *
     * @return void
     */
    public function navDataTable(){
        $data = NavMenu::select(NavMenu::ID,
        NavMenu::URL,
        NavMenu::URL_TARGET,
        NavMenu::TITLE,
        NavMenu::NAV_TYPE,
        NavMenu::POSITION,
        NavMenu::VIEW_IN_LIST
        )->where(NavMenu::STATUS,1);

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<a data-row="'.base64_encode(json_encode($row)).'" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>'.
                           '<a href="javascript:void(0)" onclick="deleteNav(\''.$row->{NavMenu::ID}.'\')" class="edit btn btn-danger btn-sm">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }
    
    /**
     * manageGallery
     *
     * @return void
     */
    public function manageGallery(){
        try{
            return view("Dashboard.Pages.manageGallery");

        }catch(Exception $exception){
            $this->reportException($exception);
        }
    }
    
    /**
     * addGalleryItems
     *
     * @param  mixed $request
     * @return void
     */
    public function addGalleryItems(Request $request){
        try{
            $validation = [
                GalleryItem::LOCAL_IMAGE=>"bail|nullable|required_without_all:image_link,local_video,video_link|array",
                GalleryItem::LOCAL_IMAGE.".*"=>"image",
                GalleryItem::IMAGE_LINK=>"bail|nullable|url|required_without_all:local_image,local_video,video_link",
                GalleryItem::ALTERNATE_TEXT=>"bail|string",
                GalleryItem::LOCAL_VIDEO=>"bail|nullable|mimetypes:video/avi,video/x-matroska,video/mp4,video/mpeg,video/quicktime|required_without_all:image_link,local_image,video_link",
                GalleryItem::VIDEO_LINK=>"bail|nullable|url|required_without_all:image_link,local_video,video_link,local_image",
                GalleryItem::TITLE=>"bail|nullable|string",
                GalleryItem::DESCRIPTION=>"bail|nullable|string",
                GalleryItem::POSITION=>"bail|nullable|numeric",
                GalleryItem::VIEW_STATUS=>"required|in:visible,hidden",
                GalleryItem::FILTER_CATEGORY=>"required",
                "action"=>"required|in:insert,delete,update",
                GalleryItem::ID=>"required_if:action,delete,update",
                GalleryItem::FILTER_CATEGORY=>"required_if:action,insert,update"
            ];
            if($request->input("action")=="update"){
                $validation = [
                    GalleryItem::LOCAL_IMAGE=>"bail|nullable|array",
                    GalleryItem::LOCAL_IMAGE.".*"=>"image",
                    GalleryItem::IMAGE_LINK=>"bail|nullable|url",
                    GalleryItem::ALTERNATE_TEXT=>"bail|string",
                    GalleryItem::LOCAL_VIDEO=>"bail|nullable",
                    GalleryItem::VIDEO_LINK=>"bail|nullable|url",
                    GalleryItem::TITLE=>"bail|nullable|string",
                    GalleryItem::DESCRIPTION=>"bail|nullable|string",
                    GalleryItem::POSITION=>"bail|nullable|numeric",
                    GalleryItem::VIEW_STATUS=>"required|in:visible,hidden",
                    "action"=>"required|in:insert,delete,update",
                    GalleryItem::ID=>"required_if:action,delete,update"
                ];
            }else if($request->input("action")=="delete"){
                $validation = [
                    GalleryItem::ID=>"required|exists:".GalleryItem::TABLE_NAME,
                    "action"=>"required|in:insert,delete,update"
                ];
            }
            $validate = Validator::make($request->all(),$validation);
            if($validate->fails()){
                $return = ["status"=>false,"message"=>$validate->getMessageBag()->first(),"data"=>$request->all()];
            }else{                
                if($request->input("action")=="insert"){
                    $return = (new GalleryItem())->addGalleryItem($request);
                }elseif($request->input("action")=="update"){
                    $return = (new GalleryItem())->updateGalleryItem($request);
                }elseif($request->input("action")=="delete"){
                    $return = (new GalleryItem())->deleteGalleryItem($request->all());
                }else{
                    $return = ["status"=>false,"message"=>"Invalid action","data"=>null];
                }                                 
            }
            Cache::forget("galleryImages");
            return response()->json($return);
        }catch(Exception $exception){
            $return = ["status"=>false,"message"=>$exception->getMessage(),"data"=>null];
            return response()->json($return);
            $this->reportException($exception);
        }
    }
    
    /**
     * addGalleryDataTable
     *
     * @return void
     */
    public function addGalleryDataTable(){
        $data = GalleryItem::select(
            GalleryItem::ID,
            GalleryItem::LOCAL_IMAGE,
            GalleryItem::IMAGE_LINK,
            GalleryItem::ALTERNATE_TEXT,
            GalleryItem::VIDEO_LINK,
            GalleryItem::LOCAL_VIDEO,
            GalleryItem::TITLE,
            GalleryItem::DESCRIPTION,
            GalleryItem::POSITION,
            GalleryItem::FILTER_CATEGORY,
            GalleryItem::VIEW_STATUS,
        )->where(GalleryItem::STATUS,1);

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<a data-row="'.base64_encode(json_encode($row)).'" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>'.
                           '<a href="javascript:void(0)" onclick="deleteGallery(\''.$row->{GalleryItem::ID}.'\')" class="edit btn btn-danger btn-sm">Delete</a>';
    
                            return $btn;
                    })->rawColumns(['action'])
                    ->make(true);
    }
    
    /**
     * aboutUs
     *
     * @return void
     */
    public function aboutUs(){
        return view("HomePage.aboutUs");
    }

    public function deleteNavigation(Request $request){
        try{
            $validate = Validator::make($request->all(),[
                "action"=>"required|in:delete",
                NavMenu::ID=>"required_if:action,delete,update"
            ]);
            if($validate->fails()){
                $return = ["status"=>false,"message"=>$validate->getMessageBag()->first(),"data"=>null];
            }else{
                
                if($request->input("action")=="delete"){
                    $return = (new NavMenu())->deleteNavMenu($request->all());
                }else{
                    $return = ["status"=>false,"message"=>"Invalid action","data"=>null];
                }
                            
            }
            return response()->json($return);
        }catch(Exception $exception){
            $this->reportException($exception);
        }
    }
    
}
