<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = ["title", "phone_number", "city", "region", "books_id", "user_id"];
    protected $casts = ['books_id' => 'array',];

    public function books()
    {

        return $this->belongsToMany(Book::class);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
