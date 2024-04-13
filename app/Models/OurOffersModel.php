<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurOffersModel extends Model
{
    use HasFactory;
    protected $table = "our_offers";

    const ID = "id";
    const OFFER_NAME = "offer_name";
    const OFFER_IMAGE = "offer_image";
    const STATUS = "status";
    const CREATED_BY = "created_by";
    const UPDATED_BY = "updated_by";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
}
