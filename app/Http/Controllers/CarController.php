<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function getDashboard()
    {
        return view('dashboard', [
            'car' => $this->carList(),
            'date' => $this->dateList(),
            'avgSumAllTime' => $this->avgSumAllTime(),
            'avgSumToday' => $this->getSumToday()
        ]);
    }

    public function carList()
    {
        return Car::getNotSoldCars();
    }

    public function dateList()
    {
        return Car::getSoldDate();
    }

    public function avgSumAllTime()
    {
        return empty(Car::getCountSoldCars()) ? '0' : Car::getAvgSumAllTime()
            ->sum('sum(price)') / Car::getCountSoldCars();
    }

    public function getSumToday()
    {
        return empty(Car::getSoldCarsToday()) ? '0' :
            Car::getSoldCarsToday()->sum('sum(price)');
    }

}
