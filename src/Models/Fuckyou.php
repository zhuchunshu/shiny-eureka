<?php

namespace App\Plugins\Fuckyou\src\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Fuckyou extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'fuckyou';
    
}
