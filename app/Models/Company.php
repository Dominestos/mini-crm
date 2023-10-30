<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'website',
        'logo',
        'note',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'company_id', 'id');
    }

}
