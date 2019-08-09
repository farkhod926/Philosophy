<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName','lastName', 'email', 'password','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function role()
    {
      return $this->belongsTo(Role::class);
    }
    public function post()
    {
        return $this->hasMany(Post::class);
    }
    public function Comments()
       {
           return $this->hasMany(Comment::class);
       }   
       public static function add($fields)
       {
           $user = new static;
           $user->fill($fields);
           $user->password = bcrypt($field['password']);
           $user->save();
       }
       public function edit($fields)
       {
        $this->fill($fields);
        $this->password = bcrypt($field['password']);
        $this->save();
       }
       public function remove()
       {
           Storage::delete('uploads/' . $this->image);
           $this->delete();
       }

    public function uploadAvater($image)
    {
        if($image == null) { return; }
        Storage::delete('uploads/' . $this->avatar);
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->avatar = $filename;
        $this->save();
    }
    public function getAvatar()
    {
        if($this->avatar == null)
        {
            return '/img/no-user-image.png';
        }
        return '/uploads/' . $this->avatar;
    }
    public function makeAdmin()
    {
        $this->is_admin = 1;
         $this->save();
    }
    public function makeNormal()
    {
        $this->is_admin = 0;
         $this->save();
    }
    public function toggleAdmin($value)
    {
        if($value == null)
        {
            return $this->makeNormal();
        }
        return $this->makeAdmin();
    }
    
}
