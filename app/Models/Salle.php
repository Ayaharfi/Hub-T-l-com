<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;

    protected $fillable = ['id','nom_salle','verification_code', 'ip', 'codec', 'location', 'category'];
    public $incrementing = false; // 👈 dit à Laravel : cette table n'utilise pas auto_increment

}
