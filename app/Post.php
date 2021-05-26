<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Post extends Model
{
    use SoftDeletes;


    protected $fillable = ['title', 'slug', 'excerpt', 'body', 'published_at', 'category_id', 'view_count', 'image'];
    protected $dates = ['published_at'];

	public function author(){
		return $this->belongsTo(User::class);
	}

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function commentsNumber($label = 'comment'){
        $commentsNumber = $this->comments->count();
        return $commentsNumber . " " . Str::plural($label, $commentsNumber);
    }

    public function setPublishedAttribute($value){
        $this->attribute['published_at'] = $value ?: NULL;
    }
    
    public function getImageUrlAttribute($value){

    	$imageUrl = "";

    	if ( ! is_null($this->image)) {

    		$imagePath = public_path() . "/img" . $this->image;
    		if (file_exists($imagePath)) $imageUrl = asset("img/" . $this->image);	
    	}

    	return $imageUrl;
    }
 

    public function getDateAttribute($value){
    	return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }

    public function scopeLatestFirst($query){
    	return $query->orderBy('created_at', 'DESC');
    }

    public function scopePopular($query){
        return $query->orderBy('view_count', 'DESC');
    }

    public function scopePublished($query){
        return $query->where("published_at", "<=", Carbon::now());
    }

     public function scopeScheduled($query){
        return $query->where("published_at", ">", Carbon::now());
    }

     public function scopeDraft($query){
        return $query->whereNull("published_at");
    }

    public function getBodyHtmlAttribute($value){
        return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
    }

    public function getExcerptHtmlAttribute($value){
        return $this->excerpt ? Markdown::convertToHtml(e($this->excerpt)) : NULL;
    }

    public function dateFormatted($showTimes =  false){
        $format = "d/m/Y";
        if ($showTimes) $format = $format . "H:i:s";
        return  $this->created_at->format($format);
    }

    public function publicationLable(){
        if ( ! $this->published_at) {
            return '<span class="lable label-warning">Draft</span>';
        }
        // elseif ($this->published_at->isFuture()) {
        //    return '<span class="lable label-info">Schedule</span>';
        // }
        elseif ($this->published_at && $this->published_at->isFuture()) {
           return '<span class="lable label-info">Schedule</span>';
        }
        else {
            return '<span class="lable label-success">Published</span>';
        }
    }
}
