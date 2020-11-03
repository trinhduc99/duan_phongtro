<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $guarded = [];

    public static  $POST_STATUS = [
        'approved' => 'Approved',
        'pending' => 'Pending',
        'denied' => 'Denied'
    ];

    public static $USER_TYPE = [
        'male' => 'Male',
        'female' => 'Female',
        'none' => 'None'
    ];
    public function scopeSearchPost ($query, $arrSearch)
    {
        for ($i = 0; $i < count($arrSearch); $i++) {
            $element = $arrSearch[$i];
            if (!empty($element['value'])) {
                $query = $query->where($element['column'], $element['value']);
            }
        }
        return $query;
    }

    public function scopeSearchByCategory ($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }
}
