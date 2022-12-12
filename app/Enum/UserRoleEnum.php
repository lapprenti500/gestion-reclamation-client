<?php

namespace App\Enum;

enum UserRoleEnum:String{
    case SUPER_ADMIN = 'superAdmin';
    case ADMIN = 'admin';
    case CLIENT = 'client';
}
