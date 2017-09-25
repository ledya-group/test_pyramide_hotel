<?php
namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class Reservation extends Presenter {
    public function toPay()
    {
        return $this->total_price - $this->paid;
    }

    public function creationDate()
    {
        return $this->created_at->format('d/m/Y');
    }

    public function dateIn()
    {
        return $this->checkin->format('d/m/Y');
    }

    public function dateOut()
    {
        return $this->checkout->format('d/m/Y');
    }

    public function days()
    {
        $days = $this->checkout->diffInDays($this->checkin);

        return $days;
    }
}