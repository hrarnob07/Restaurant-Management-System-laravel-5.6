<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;

class ReservationControllerAdmin extends Controller
{
   public function index()
   {
       $datas=Reservation::all();
       return view('admin.reservation',['datas'=>$datas]);
   }

   public function status($id){
    $reservation = Reservation::find($id);
    $reservation->status = true;
    $reservation->save();
    Notification::route('mail',$reservation->email )
        ->notify(new ReservationConfirmed());
    Toastr::success('Reservation successfully confirmed.','Success',["positionClass" => "toast-top-right"]);
    return redirect()->back();
}
public function destory($id){
    Reservation::find($id)->delete();
    Toastr::success('Reservation successfully deleted.','Success',["positionClass" => "toast-top-right"]);
    return redirect()->back();
}
}
