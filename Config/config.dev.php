<?php
/**
 *
 * Created by PhpStorm.
 * Auth: liushuai
 * Date: 29/12/17
 * Time: 10:34
 * Email: ln6265431@163.com
 */

return new \Phalcon\Config([
    'environment' => 'DEVELOPMENT',
    'database' => [
        'host'        => '127.0.0.1',
        'username'    => 'root',
        'dbname'      => 'isophp',
        'password'    => 'ln6265431',
    ],
    'article' => [
        'idSalt' => '&YGFVBI&^%$',
        'minLength' => 12,
    ],
]);
