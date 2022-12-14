<?php

namespace SkiddPH\Plugin\Auth\Model;

use SkiddPh\Plugin\Auth\Auth;
use SkiddPH\Plugin\Database\Model;

class Users extends Model
{
    const TB = 'auth_users';
    public function __construct()
    {
        parent::__construct(Auth::db(), self::TB);
    }

    public static function user($user_id, $field = "id")
    {
        $user = Auth::db()->table(self::TB)
            ->where([
                $field => $user_id
            ])
            ->readOne()
            ->arr();
        return empty($user) ? null : $user;
    }

    public static function users($user_ids, $field = "id")
    {
        $users = Auth::db()->table(self::TB)
            ->where([
                $field => is_array($user_ids) ? [
                    'IN' => $user_ids
                ] : $user_ids
            ])
            ->readMany()
            ->arr();
        return empty($users) ? [] : $users;
    }

    public static function set($user, $data)
    {
        return Auth::db()->table(self::TB)
            ->where(is_array($user) ? $user : ['id' => $user])
            ->data([$data])
            ->update()
            ->rowCount() > 0;
    }
}