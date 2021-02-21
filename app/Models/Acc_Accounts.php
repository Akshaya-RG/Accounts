<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acc_Accounts extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'organisationName',
        'date',
        'billNumber',
        'billDate',
        '5%Amount',
        '12%Amount',
        '18%Amount',
        '5%Tax',
        '12%Tax',
        '18%Tax',
        'interstate_local',
        'filled_notfilled',
        'createdBy',
        'updatedBy',
        'isDeleted'

    ];


}
