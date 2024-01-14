<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time;


class User extends Entity
{
    protected $dates = ['created_at' => null, 'updated_at' => null, 'deleted_at' => null,];
    protected $attributes = [
        'id' => null,
        'username' => null,
        'email' => null,
        'password' => null,
        'first_name' => null,
        'last_name' => null,
    ];

    public function setPassword(string $pass)
    {
        $this->attributes['password'] = password_hash($pass, PASSWORD_BCRYPT);
        return $this;
    }

    public function setCreatedAt(string $dateString)
    {
        $this->attributes['created_at'] = new Time($dateString, 'Africa/Lagos');
        return $this;
    }

    public function getCreatedAt(string $format = 'Y-m-d H:i:s')
    {
        // convert to CodeIgniter\I18n\Time Object
        $this->attributes['created_at'] = $this->mutateDate($this->attributes['created_at']);

        $timezone = $this->timezone ?? app_timezone();

        $this->attributes['created_at']->setTimezone($timezone);

        return $this->attributes['created_at']->format($format);

    }
}
