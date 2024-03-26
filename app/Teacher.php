<?php

namespace App;

use Encore\Admin\Auth\Database\Administrator;
use SMartins\PassportMultiauth\HasMultiAuthApiTokens;


class Teacher extends Administrator
{
    use HasMultiAuthApiTokens;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $roleModel = config('admin.database.roles_model');
            $model->roles()->attach($roleModel->whereSlug('teacher')->value('id'));
        });
    }
}