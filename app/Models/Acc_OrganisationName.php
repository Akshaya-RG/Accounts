<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acc_OrganisationName extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'organisationName',
        'address',
        'GST_No',
        'createdBy',
        'updatedBy',
        'isDeleted',
    ];
}
