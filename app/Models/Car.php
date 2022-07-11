<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Car extends Model
{
    use HasFactory;

    public static function getNotSoldCars()
    {
        return DB::table('showroom')
            ->join('vehicle', 'vehicle.id', '=', 'showroom.car_id')
            ->where('sold', '=', 'false')
            ->get();
    }

    public static function getSoldDate()
    {
        return DB::table('showroom')
            ->get()
            ->where('date_of_sell')
            ->groupBy('date_of_sell');
    }

    public static function getAvgSumAllTime()
    {
        return DB::table('showroom')
            ->selectRaw('sum(price)')
            ->get();
    }

    public static function getCountSoldCars()
    {
        return count(DB::table('showroom')
            ->get()
            ->where('sold', '=', 'true'));
    }

    public static function getSoldCarsToday()
    {
        return DB::table('showroom')
            ->selectRaw('sum(price)')
            ->where([
                ['date_of_sell', '=', date('Y-m-d')],
                ['sold', '=', 'true'],
            ])
            ->get();
    }
}
