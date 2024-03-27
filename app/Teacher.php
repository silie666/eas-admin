<?php

namespace App;

use Encore\Admin\Auth\Database\Administrator;


class Teacher extends Administrator
{

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $roleModel = config('admin.database.roles_model');
            $model->roles()->attach($roleModel->whereSlug('teacher')->value('id'));
        });
    }
}