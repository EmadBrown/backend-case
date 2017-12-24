<?php

namespace App\Services;

use App\Models\News;
use Image;
use Mews\Purifier\Facades\Purifier;

class CmsServices {
    
    
    /**
     * 
     * @param type $param
     */
    public function getData() 
    {
        $news = News::orderBy('created_at'  ,  'desc')->paginate(10);
        return $news;
    }
    /**
     * 
     * @return array
     */
    public function countArticle() 
    {
        // Count How many Articles Then pass it to cms 
        $countArticle = News::all()->count();
        return $countArticle;
    }
    
    /**
     * 
     * @param type $data
     * @return  array
     */
    public function save($data , $fileName)
    {
         $article = new News();
   
          //  store the data in the News table
          $article->title = ucfirst(trans(Purifier::clean($data['title'])));
          $article->author = ucfirst (trans(Purifier::clean($data['author'])));
          $article->description = ucfirst(trans(Purifier::clean($data['description'])));
          $article->image_url = $fileName;
          
         return  $article->save();
    }
    
    /**
     * 
     * @param type $data
     */
    public function update($data , $id , $fileName)
    {
         $article =  News::findOrFail($id);
   
          //  store the data in the News table
          $article->title = ucfirst(trans(Purifier::clean($data['title'])));
          $article->author = ucfirst (trans(Purifier::clean($data['author'])));
          $article->description = ucfirst(trans(Purifier::clean($data['description'])));
          $article->image_url = $fileName;
          
         return  $article->update();
    }
    
    /**
     * 
     * @param type $data
     */
    public function uploadImage($data) 
    {
        // upload image
          if($data->hasFile('image_url')){
              $image = $data->file('image_url');
              $fileName = time() . '.' . $image->getClientOriginalExtension();
              $location = public_path('images/news/' . $fileName );
              Image::make($image)->resize(800 , 400)->save($location);
              return $fileName;
          }
          
   
    }
    
    /**
     * 
     * @param type $id
     * @return array
     */
    public function find($id) 
    {
        $article = News::find($id);
        return $article;
    }
    
}
