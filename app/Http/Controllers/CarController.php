<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function getDashboard()
    {
        return view('dashboard', [
            'carList' => $this->carList(),
            'avgSumAllTime' => $this->avgSumAllTime(),
            'avgSumToday' => $this->getSumToday(),
            'sellsPerDay' => $this->getSellForDay(),
            'avgLastYear' => $this->getAvgLastYear()
        ]);
    }

    public function carList()
    {
        return Car::getNotSoldCars();
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

    public function getSellForDay()
    {
        return Car::getSellsPerDay();
    }

    public function getAvgLastYear()
    {
        return Car::getSoldLastYear() / Car::getYearSold();
    }

}
