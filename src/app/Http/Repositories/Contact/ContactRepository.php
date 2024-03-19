<?php

namespace App\Http\Repositories\Contact;

use App\Http\Repositories\BaseRepository;
use App\Models\ContactMessage;

/**
 * Class ContactRepository
 *
 * @author Mahammad Mammadov <muhammed.mammadov.89@gmail.com>
 */
class ContactRepository extends BaseRepository
{
    /**
     * ContactRepository Constructor
     *
     * @param ContactMessage $model
     */
    public function __construct(ContactMessage $model)
    {
        parent::__construct($model);
    }
}
