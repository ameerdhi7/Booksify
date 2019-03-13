<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Book
 *
 * @property int $id
 * @property string $poster
 * @property string $title
 * @property float $price
 * @property string $author
 * @property int|null $edition_number
 * @property int|null $edition_year
 * @property int|null $isbn
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Category[] $categories
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereEditionNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereEditionYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereIsbn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book wherePoster($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Book whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Book extends Model
{
    protected $fillable=["poster","title","author","price","isbn","category_id","edition_number","edition_year"];
    public  function categories(){
     return $this->belongsToMany(Category::class);
    }
    public function orders(){

        return  $this->belongsToMany(order::class);

    }
    public  function carts(){
        return $this->belongsToMany(Cart::class);
    }
}
