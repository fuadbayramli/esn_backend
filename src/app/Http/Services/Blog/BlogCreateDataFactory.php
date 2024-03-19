<?php

namespace App\Http\Services\Blog;

use App\Http\Services\BaseDataFactory;
use App\Models\Status;

/**
 * Class BlogCreateDataFactory
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class BlogCreateDataFactory extends BaseDataFactory
{

    public function getData(): array
    {
        return [
            'user_id' => $this->data['user_id'],
            'title' => $this->data['title'],
            'description' => $this->data['description'],
            'status_id' => Status::VALUES['pending'],
            'cover_image' => $this->data['cover_image'],
        ];
    }
}
