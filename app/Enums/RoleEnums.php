<?php
namespace App\Enums;

enum RoleEnums: int {
    case RegularUser = 0;
    case Premium = 1;
    case Admin = 2;
}
