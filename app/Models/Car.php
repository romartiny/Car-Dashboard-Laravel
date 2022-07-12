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

    public static function getSellsPerDay()
    {
        return DB::table("showroom")->select(
            DB::raw("(count(id)) as total_price"),
            DB::raw("(DATE_FORMAT(date_of_sell, '%Y-%m-%d')) as sell_day")
        )
            ->where('sold', '=', 'true')
            ->orderBy('date_of_sell', 'DESC')
            ->groupBy(DB::raw('date_of_sell'))
            ->get();
    }

    public static function getSoldLastYear()
    {
        $lastYear = date('Y-01-01', strtotime("-1 year"));
        $lastDayOfYear = date('Y-12-31', strtotime("-1 year"));
        return count(DB::table('showroom')
            ->where('date_of_sell', '>=', "$lastYear")
            ->where('date_of_sell', '<=', "$lastDayOfYear")
            ->get()
        );
    }

    public static function getYearSold()
    {
        return count(DB::table('showroom')

            ->where([
                ['sold', '=', 'true'],
                ['date_of_sell', '>=', date('Y-01-01', strtotime('-1 year'))],
                ['date_of_sell', '<=', date('Y-12-31', strtotime('-1 year'))],
            ])
            ->groupBy(DB::raw('date_of_sell'))
            ->get()
        );
    }
}
