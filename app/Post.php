<?php

namespace App;

use Auth;
use App\Categoty;
use App\Tag;
use App\Comments;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

 

class Post extends Model
{
    use Sluggable;


    protected $fillable = ['title','content','date','description','file','image','picture'];

    const IS_DRAFT = 0;
    const IS_PUBLIC = 1;
    

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function tags()
    {
    	return $this->belongsToMany(
    		Tag::class,
    		'post_tags',
    		'post_id',
    		'tag_id'
    	);
    }
    public function auther()
    {
    	return $this->belongsTo(User::class,'user_id');
    }
    public function comments()
    {
    	return $this->hasMany(Comments::class);
    }

     public function sluggable()
    {
    	return[
           'slug' => [
           	'source' => 'title'
           ]
    	];
    }
    public static function add($fields)
    {
    	$post = new static;
    	$post->fill($fields);
    	$post->user_id = Auth::user()->id;
    	$post->save();

    	return $post;
    }
     public function edit($fields)
    {
      $this->fill($fields);
      $this->save();
    }

     public function remove()
    {
    	$this->removeImage();
    	$this->removeFile();
    	$this->delete();
    }
    public function removeImage()
    {
      if($this->image !=null)
      {
	      Storage::delete('uploads/' . $this->image);  
      }
    }
    public function removeFile()
    {
      if($this->file !=null)
      {
      Storage::delete('uploads/' . $this->file);  
      }
    }

    public function uploadImage($image)
    {
    	if($image == null) { return; }

        $this->removeImage();
    	$filename = str_random(10) . '.' . $image->extension();
    	$image->storeAs('uploads', $filename);
    	$this->image = $filename;
    	$this->save();
    }
    public function uploadPicture($picture)
    {
        if($picture == null) { return; }

        $this->removeImage();
        $filename = str_random(10) . '.' . $picture->extension();
        $picture->storeAs('uploads/single', $filename);
        $this->picture = $filename;
        $this->save();
    }

    public function getImage()
    {
    	if($this->image == null)
    	{
    		return '/img/no-image.png';
    	}
    	return '/uploads/' . $this->image;
    }
    public function getPicture()
    {
        if($this->picture == null)
        {
            return '/img/no-image.png';
        }
        return '/uploads/single/' . $this->picture;
    }
    public function uploadFile($file)
    {
    	if($file == null) { return; }

    	$this->removeFile();
    	$filename = str_random(10) . '.' . $file->extension();
    	$file->storeAs('uploads', $filename);
    	$this->file = $filename;
    	$this->save();
	    }
	    public function getFile()
    {
    	if($this->file == null)
    	{
    		return '/img/no-file.png';
    	}
    	return '/uploads/' . $this->file;
    }
    public function setCategory($id)
    {
    	if($id == null) { return;}
        $this->category_id = $id;
    	$this->save();
    }
    public function setTags($ids)
    {
    	if($ids == null){ return;}
    	$this->tags()->sync($ids);
    	$this->save();
    }
    public function setDraft()
    {
    	$this->status = Post::IS_DRAFT;
    	$this->save();
    }
    public function setPublic()
    {
    	$this->status = Post::IS_PUBLIC;
    	$this->save();
    }
    public function toggleStatus($value)
    {
    	if($value == null) 
    	{
          return $this->setDraft();
    	}
    	return $this->setPublic();
    }  
     public function setFeatured()
    {
    	$this->is_featured = 1;
    	$this->save();
    }
    public function setStandart()
    {
    	$this->is_featured = 0;
    	$this->save();
    }
    public function toggleFeatured($value)
    {
    	if($value == null) 
    	{
          return $this->setStandart();
    	}
    	return $this->setFeatured();
    }
    public function getTagsTitles()
    {
      return (!$this->tags->isEmpty())
             ? implode(', ', $this->tags->pluck('title')->all())
             : 'No Tags'; 
    }
     public function getCategoryTitle()
    {
      return ($this->category != null)
            ?  $this->category->name
            :  'No Category';
    }
    public function setDateAttribute($value)
    {
       $date = Carbon::createFromFormat('d/m/y', $value)->format('Y-m-d');
       
       $this->attributes['date'] = $date; 
    }

    public function getDateAttribute($value)
    {  
      $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');
       
       return $date;       
    }
    public function getCategoryID()
    {
      return $this->category !=null ? $this->category->id : null;
    }
    public function getDate()
    {
      return Carbon::createFromFormat('d/m/y',$this->date)->format('F d, Y');
    }
    public function choose()
    {
       return self::where('id','>', 2)->get();
    }
    public function hasPrevious()
    {
        return self::where('id','<', $this->id)->max('id');
    }
    public function getPrevious()
    {
        $postID = $this->hasPrevious();
        return self::find($postID);
    }
    public function hasNext()
    {
        return self::where('id','>', $this->id)->min('id');
    }
    public function getNext()
    {
        $postID = $this->hasNext();
        return self::find($postID);
    }
    
}
