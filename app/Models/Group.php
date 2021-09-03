<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    /*
    * Getting arry for select options
    */

    public static function selectGroup()
    {
        $arry = [];
        $groups = Group::all();
        foreach($groups as $group) {
            $arry[$groups->id] = $groups->title;
        }

        return $arry;
    }
}
