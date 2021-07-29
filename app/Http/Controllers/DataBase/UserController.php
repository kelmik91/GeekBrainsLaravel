<?php


namespace App\Http\Controllers\DataBase;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {
        $sql = "select * from users";
        $result = DB::select($sql);
        var_dump($result);
        echo "Complete";
    }
}
