<?php
class Post extends Eloquent
{


  public function user()
  {
    return $this->belongsTo('User');
  }

  protected $table = 'posts';
  public static $rules = array(
    'title' => 'required|max:64' ,
    'body' => 'required|max:10000|min:350'
  );
}
 ?>
