<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class Post extends Model
{
    use HasFactory;

    // public function scopeFilter($query, array $filters){
    //     if($filters['searchPost'] ?? false){
    //         $query->where('title' , 'like', '%'.request('searchPost').'%')->orWhere('description' , 'like', '%'.request('searchPost').'%');
    //     }
    // }

    public function tags(){
        //insert into table `post_tag` (post_id,tag_id) values (1,2),(1,3),(1,4)
        return $this->belongsToMany(Tag::class,'post_tag', 'post_id', 'tag_id')->withTimestamps();
    }
}

/*->withDefaults([
    'tag_id'=> '5'
]);*/

/*
one to one relationship:
-parent model:
    name of function singular
    hasOne(model, 'foreign key', 'local_key');
-child model:
    name of function singular
    belongsTo(model, 'foreign key', 'owner_key')
    */

    /*
    one to many relationship:
    -parent model:
        name of function plural
        hasMany(model, 'foreign key', 'local_key');
    -child model:
        name of function singular
        belongsTo(model, 'foreign key', 'owner_key');
*/

/*
may to many relationship:
name of function plural
belongsToMany('model name to be used in relationship','junction table','foreign key of parent model id', 'foreign key of associated table')
*/
