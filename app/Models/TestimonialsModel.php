<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialsModel extends Model
{
    use HasFactory;

    protected $table = "testimonials";

    const ID = "id";
    const CLIENT_NAME = "client_name";
    const CLIENT_EMAIL = "client_email";
    const CLIENT_IMAGE = "client_image";
    const ITEM_PRIORITY = "item_priority";
    const REVIEW_TEXT = "review_text";
    const APPROVAL_STATUS = "approval_status";
    const STATUS = "status";
    const CREATED_BY = "created_by";
    const UPDATED_BY = "updated_by";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    const UNDER_REVIEW = "under_review";
    const APPROVED = "approved";
    const DISCARDED = "discarded";


}
