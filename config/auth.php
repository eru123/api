<?php

return [
    /**
     * Secret Key
     */
    'secret' => e('JWT_SECRET', 'default_secret_key'),
    /**
     * JWT Refresh Key
     */
    'refresh' => e('JWT_REFRESH', 'default_refresh_key'),
    /**
     * JWT Hash Algorithm
     */
    'alg' => 'HS256',
    /**
     * Password Hash Method - Arguments in `password_hash` function
     */
    'hash_method' => [
        PASSWORD_BCRYPT,
        ['cost' => 12]
    ],
    /**
     * JWT Default Expirations - depends on login type
     */
    'token_expire_at' => [
        'short' => 'now + 30mins',
        'long' => 'now + 7days',
        'remember' => 'now + 30days'
    ],
    /**
     * Email verification token expiration
     */
    'email_verification_expire_at' => 'now + 24mins',
];
