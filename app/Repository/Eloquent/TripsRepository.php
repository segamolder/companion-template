<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:18
 */

namespace App\Repository\Eloquent;


use App\Models\Trips;
use App\Repository\Contracts\TripsRepositoryContract;
use DateTime;

class TripsRepository extends BaseRepository implements TripsRepositoryContract
{
    /**
     * TripsRepository constructor.
     * @param Trips $trips
     */
    public function __construct(Trips $trips)
    {
        $this->model = $trips;
    }

    public function GetAllPaginatedTrips($perPage)
    {
        return $this->model->paginate($perPage)->all();
    }

    public function GetSearchPaginatedTrips($perPage, array $search)
    {
        $searchCollection = collect($this->all());

        if(isset($search['date'])) {
            $ddt = DateTime::createFromFormat('Y-m-d H:i:s', $search['date']);
            $ddt->setTime(0,0,0);
            $searchCollection = $this->model->whereDay('departure_time', $ddt)->get();
            unset($search['date']);
        }
        foreach ($search as $key => $item) {
            switch ($key) {
                case 'from':
                    $searchCollection = $searchCollection->reject(function($element) use ($item) {
                        return mb_strpos($element->where_from, $item) === false;
                    });
                    break;
                case 'to':
                    $searchCollection = $searchCollection->reject(function($element) use ($item) {
                        return mb_strpos($element->where_to, $item) === false;
                    });
                    break;
                case 'price':
                    $searchCollection = $searchCollection->where('price', ">=", $item[0])->where('price', "<=", $item[1])->all();
                    break;
                default: new \Exception("Ошибка при поиске поездок.");
            }
        }
        return $searchCollection;
    }

    public function GetCurrentUserTrip($userId)
    {
        $nowDateTime = new DateTime("now", new \DateTimeZone("Europe/Moscow"));
        return $this->model->where('driver_id', $userId)->where('departure_time', ">=", $nowDateTime)->get();
    }

}
