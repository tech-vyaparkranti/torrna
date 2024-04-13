<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurServicesModel extends Model
{
    use HasFactory;

    protected $table = "our_services";

    const ID = "id";
    const SERVICE_NAME = "service_name";
    const SERVICE_DETAILS = "service_details";
    const SERVICE_ICON = "service_icon";
    const POSITION = "position";
    const STATUS = "status";
    const CREATED_BY = "created_by";
    const UPDATED_BY = "updated_by";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
}
