<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class NavMenu extends Model
{
    use HasFactory;

    protected $table = "nav_menu";

    const TABLE_NAME = "nav_menu";

    const ID = "id";
    const TITLE = "title";
    const URL = "url";
    const URL_TARGET = "url_target";
    const NAV_TYPE = "nav_type";
    const POSITION = "position";
    const VIEW_IN_LIST = "view_in_list";
    const PARENT_ID = "parent_id";
    const STATUS = "status";
    const CREATED_BY = "created_by";
    const CREATED_AT = "created_at";
    const UPDATED_BY = "updated_by";
    const UPDATED_AT = "updated_at";
    const VIEW_IN_LIST_YES = "yes";
    const VIEW_IN_LIST_NO = "no";

    /**
     * insertNavMenu
     *
     * @param  mixed $requestData
     * @return array
     */
    public function insertNavMenu($requestData): array
    {
        try {
            $check = NavMenu::where([
                [self::TITLE, $requestData[self::TITLE]],
                [self::URL, $requestData[self::URL]]
            ])->first();
            if ($check) {
                $return = ["status" => false, "message" => "Duplicate entry", "data" => null];
            } else {
                $insertId = NavMenu::insertGetId([
                    self::TITLE => $requestData[self::TITLE],
                    self::URL => $requestData[self::URL],
                    self::URL_TARGET => $requestData[self::URL_TARGET],
                    self::NAV_TYPE => $requestData[self::NAV_TYPE],
                    self::POSITION => $this->checkAndGetPosition($requestData[self::POSITION] ?? ""),
                    self::VIEW_IN_LIST => $requestData[self::VIEW_IN_LIST],
                    self::STATUS => 1,
                    self::CREATED_BY=>Auth::id(),
                    self::PARENT_ID=>$this->checkParent($requestData)
                ]);
                if ($insertId) {
                    $return = ["status" => true, "message" => "Inserted", "data" => null];
                } else {
                    $return = ["status" => false, "message" => "Error in insert", "data" => null];
                }
            }
        } catch (Exception $exception) {
            $return = ["status" => false, "message" => $exception->getMessage(), "data" => null];
        }
        return $return;
    }

    /**
     * checkAndGetPosition
     *
     * @param  mixed $position
     * @return int
     */
    public function checkAndGetPosition($position): int
    {
        if (is_numeric($position)) {
            $check = NavMenu::where(self::POSITION, ">=", $position)->get();
            if (count($check)) {
                foreach ($check as $item) {
                    NavMenu::where(self::ID, $item->{self::ID})->update([
                        self::POSITION => $item->{self::POSITION} + 1
                    ]);
                }
            }
            $return = $position;
        } else {
            $max = NavMenu::max(self::POSITION);
            if (is_numeric($max)) {
                $return = $max + 1;
            } else {
                $return = 1;
            }
        }
        return $return;
    }

    /**
     * updateNavMenu
     *
     * @param  mixed $requestData
     * @return void
     */
    public function updateNavMenu($requestData)
    {
        try {
            $check = NavMenu::where([
                [self::TITLE, $requestData[self::TITLE]],
                [self::URL, $requestData[self::URL]],
                [self::ID, "!=", $requestData[self::ID]]
            ])->first();
            if ($check) {
                $return = ["status" => false, "message" => "Duplicate entry", "data" => null];
            } else {
                $update = NavMenu::where(self::ID, "=", $requestData[self::ID])->update(
                    [
                        self::TITLE => $requestData[self::TITLE],
                        self::URL => $requestData[self::URL],
                        self::URL_TARGET => $requestData[self::URL_TARGET],
                        self::NAV_TYPE => $requestData[self::NAV_TYPE],
                        self::POSITION => $this->checkAndGetPosition($requestData[self::POSITION] ?? ""),
                        self::VIEW_IN_LIST => $requestData[self::VIEW_IN_LIST],
                        self::STATUS => 1,
                        self::UPDATED_BY=>Auth::id(),
                        self::PARENT_ID=>$this->checkParent($requestData)
                    ]
                );
                if ($update) {
                    $return = ["status" => true, "message" => "Updated", "data" => null];
                } else {
                    $return = ["status" => false, "message" => "Error in update", "data" => null];
                }
            }
        } catch (Exception $exception) {
            $return = ["status" => false, "message" => $exception->getMessage(), "data" => null];
        }
        return $return;
    }
    
    /**
     * deleteNavMenu
     *
     * @param  mixed $requestData
     * @return array
     */
    public function deleteNavMenu($requestData):array
    {
        try {
            $check = NavMenu::where([
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

    public function getParentNavMenu(){
        return NavMenu::where([
            [NavMenu::STATUS,1],
            [NavMenu::VIEW_IN_LIST,NavMenu::VIEW_IN_LIST_YES]
        ])->whereNull(NavMenu::PARENT_ID)->select(NavMenu::ID,NavMenu::TITLE,NavMenu::NAV_TYPE)->get();
    }

    public function checkParent($requestData){
        $return = null;
        try{
            if(!empty($requestData[NavMenu::PARENT_ID])){
                $check = NavMenu::where([
                    [NavMenu::STATUS,1],
                    [NavMenu::ID,$requestData[NavMenu::PARENT_ID]],
                    [NavMenu::NAV_TYPE,$requestData[NavMenu::NAV_TYPE]]
                ])->whereNull(NavMenu::PARENT_ID)->first();
                if($check){
                    $return = $requestData[NavMenu::PARENT_ID];
                }
            }

        }catch(Exception $exception){

        }
        return $return;
    }
}
