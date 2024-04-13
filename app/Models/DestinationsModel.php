<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationsModel extends Model
{
    use HasFactory;
    protected $table = "destination_master";

    const ID = "id";
    const DESTINATION_NAME = "destination_name";
    const DESTINATION_IMAGE = "destination_image";
    const DESTINATION_DETAILS = "destination_details";
    const SORTING_NUMBER = "sorting_number";
    const STATUS = "status";
    const CREATED_BY = "created_by";
    const UPDATED_BY = "updated_by";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
    const STATUS_ALIAS = "destination_master.status";
    const ID_ALIAS = "destination_master.id";
}
