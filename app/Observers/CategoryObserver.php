<?php

namespace App\Observers;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
class CategoryObserver
{
   public function created(Category $category){
    Category::where('rank', '>=', $category['rank'])
    ->where('id', '!=', $category['id'])
    ->where('parent_id', '=', $category['parent_id'])
    ->increment('rank', 1);

   // Log::channel('data_check')->info($category->name);
   }

   public function saved(Category $category){


   // Log::channel('data_check')->info($category->rank.":".$category['parent_id']);
        if($category->isDirty('parent_id')){//parenid changed 
      
            Category::where('rank', '>=', $category['rank'])
            ->where('id', '!=', $category['id'])
            ->where('parent_id', '=', $category['parent_id'])
            ->increment('rank', 1);

            Category::where('rank', '>=', $category['rank'])
            ->where('id', '!=', $category['id'])
            ->where('parent_id', '=', $category->getOriginal('parent_id'))
            ->decrement('rank', 1);

        } else{
        if($category->isDirty('rank')){ /// rank is changed

         //   Log::channel('data_check')->info($category->getOriginal('rank')." new:".$category['rank']);
            $old_rank = $category->getOriginal('rank');
            if($category['rank'] > $old_rank){
                Category ::where('id', '!=', $category['id'])
                    ->where('parent_id','=',$category['parent_id'])
                    ->where('rank','>',$old_rank)
                    ->where('type','=',$category['type'])
                    ->where('rank','<=',$category['rank'])
                    ->decrement('rank',1);
            }else{
                Category::where('id', '!=', $category['id'])
                ->where('parent_id','=',$category['parent_id'])
                    ->where('type','=',$category['type'])
                    ->where('rank','>=',$category['rank'])
                    ->where('rank','<',$old_rank)
                    ->increment('rank',1);

                    
            } 
        }
        }

        if($category->isDirty('slug')){
            if(!empty($category->getOriginal('id'))){
                rename('files/categories/'.$category->getOriginal('slug'),'files/categories/'.$category['slug']);
            }
              Log::channel('data_check')->info($category->getOriginal('id').">>".$category['id']);
        }
   }

   public function deleting(Category $category){
    Log::channel('data_check')->info($category->rank.":".$category['parent_id']);
    Category::where('rank', '>=', $category['rank'])
    ->where('type','=',$category['type'])
    ->where('id', '!=', $category['id'])
    ->where('parent_id', '=', $category['parent_id'])
    ->decrement('rank', 1);
   }
}
