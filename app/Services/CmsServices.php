<?php

namespace App\Services;

use App\Models\News;


class CmsServices {
    
    public function countArticle() 
    {
        // Count How many Articles Then pass it to cms 
        $countArticle = News::all()->count();
        return $countArticle;
    }
    
}
