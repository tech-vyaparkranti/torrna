<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsModel extends Model
{
    use HasFactory;

    protected $table = "contact_us";

    const ID = "id";
    const FIRST_NAME = "first_name";
    const LAST_NAME = "last_name";
    const EMAIL = "email";
    const COUNTRY_CODE = "country_code";
    const PHONE_NUMBER = "phone_number";
    const MESSAGE = "message";
    const IP_ADDRESS = "ip_address";
    const USER_AGENT = "user_agent";
    const STATUS = "status";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
}
