<?php
namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class Room extends Presenter {

    public function name()
    {
        return $this->code;
    }

    public function price()
    {
        return '$' . $this->type->base_price;
    }

    public function checkin()
    {
        return $this->date->setLocale('fr')->toFormattedDateString();
    }

    public function status()
    {
        switch($this->status) {
            case "occupied":
                return [
                    'class' => 'warning',
                    'data' => "Occupé par " . $this->client->present()->fullName
                ];
                break;
            
            case "not available":
                return [
                    'class' => 'danger',
                    'data' => "Pas disponible"
                ];
                break;

            default:
                return [
                    'class' => 'info',
                    'data' => "Libre"
                ];
        }
    }
}