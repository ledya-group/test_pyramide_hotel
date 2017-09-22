<?php
namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class Client extends Presenter {

    public function fullName()
    {
        return "{$this->profile->first_name} {$this->profile->last_name} {$this->profile->middle_name}";
    }
}