<?php

namespace App\Repositories;

use App\Models\DailyReservationRecord;
use App\Models\Reservations as Reservation;
use Illuminate\Support\Facades\DB;

class Reservations {

    public function getReservations(){
        DB::statement("SET SQL_MODE=''");
        return DailyReservationRecord::select('reservations.*', 'mb.name as made_by_user', 'lub.name  as update_by_user', 'boats.name as boat_name')
        ->whereBetween('reserved_date', [request('date_start'), request('date_end')])
        ->leftJoin('reservations', 'reservations.id', 'daily_reservation_records.reservation_id')
        ->leftJoin('users As mb', 'reservations.made_by', 'mb.id')
        ->leftJoin('users As lub', 'reservations.last_updated_by', 'lub.id')
        ->leftJoin('boats', 'reservations.boat_id', 'boats.id')
        ->orderBy('start_date')
        ->groupBy('reservation_id')
        ->get();
    }

    public function getOwnReservations(){
        return DailyReservationRecord::where('made_by', auth()->user()->id)
        ->select('reservations.*', 'mb.name as made_by_user', 'lub.name  as update_by_user', 'boats.name as boat_name')
        ->whereBetween('reserved_date', [request('date_start'), request('date_end')])
        ->leftJoin('reservations', 'reservations.id', 'daily_reservation_records.reservation_id')
        ->leftJoin('users As mb', 'reservations.made_by', 'mb.id')
        ->leftJoin('users As lub', 'reservations.last_updated_by', 'lub.id')
        ->leftJoin('boats', 'reservations.boat_id', 'boats.id')
        ->orderBy('start_date')
        ->groupBy('reservation_id')
        ->get();
    }

    public function getReserves(){
        return Reservation::select('reservations.*', 'users.name as user', 'boats.name as boat_name')
        ->whereBetween('start_date', [request('date_start'), request('date_end')])
        ->orWhereBetween('end_date', [request('date_start'), request('date_end')])
        ->leftJoin('users', 'reservations.made_by', 'users.id')
        ->leftJoin('boats', 'reservations.boat_id', 'boats.id')
        ->get();
    }

    public function getReservationsAjax(){
        return Reservation::select('reservations.start_date','reservations.end_date',  'users.name as user', 'boats.name as boat_name')
        ->whereBetween('start_date', [request('date_start'), request('date_end')])
        ->orWhereBetween('end_date', [request('date_start'), request('date_end')])
        ->join('users', 'reservations.made_by', 'users.id')
        ->join('boats', 'reservations.boat_id', 'boats.id')
        ->get();
    }

}