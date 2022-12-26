<?php

namespace Api\Auth\Model;

use Api\Lib\Date;
use Auth;
use Api\Database\Model;

class Email extends Model
{
    const TB = 'auth_email_verification';

    public function __construct()
    {
        parent::__construct(Auth::db(), self::TB);
    }

    public static function new_code($id, string $token): int
    {
        $db = Auth::db();
        $db->table(self::TB)
            ->where(['user_id' => $id])
            ->delete();
        return $db->table(self::TB)
            ->data([
                [
                    'user_id' => $id,
                    'token' => $token,
                    'updated_at' => Date::parse('now', 'datetime')
                ]
            ])
            ->insert()
            ->lastInsertId();
    }
}