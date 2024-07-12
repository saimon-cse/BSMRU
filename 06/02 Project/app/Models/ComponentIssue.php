<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentIssue extends Model
{
    use HasFactory;
    protected $table = "component_issues";
    protected $primaryKey = "id";
}
