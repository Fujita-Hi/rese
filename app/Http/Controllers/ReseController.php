<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Restaurant;
use App\Models\Favorite;
use App\Models\Rese;
use Carbon\Carbon;
class ReseController extends Controller
{
    public function home(){
        $restaurants = Restaurant::all();
        $user_id = Auth::user()->id;
        $favorites = Favorite::where('user_id', $user_id)->pluck('restaurant_id');
        $genres = Restaurant::distinct()->pluck('genre');
        return view('home', ['restaurants' => $restaurants, 'favorites' => $favorites, 'genres' => $genres]);
    }

    public function search(Request $request){
        $restaurants = Restaurant::AreaSearch($request->area)->GenreSearch($request->genre)->KeywordSearch($request->text)->get();
        $user_id = Auth::user()->id;
        $favorites = Favorite::where('user_id', $user_id)->pluck('restaurant_id');
        $genres = Restaurant::distinct()->pluck('genre');
        return view('home', ['restaurants' => $restaurants, 'favorites' => $favorites, 'genres' => $genres]);
    }

    public function mypage(){
        $user_id = Auth::user()->id;
        $favorites = Favorite::where('user_id', $user_id)->pluck('restaurant_id');
        $restaurants = Restaurant::whereIn('id',$favorites)->get();
        $evaluations =Reservation::whereDate('date', '<', Carbon::today())->where('user_id', $user_id)->get();
        $reservations =Reservation::whereDate('date', '>=', Carbon::today())->where('user_id', $user_id)->get();
        return view('mypage', ['restaurants' => $restaurants, 'reservations' => $reservations, 'evaluations' => $evaluations]);
    }

    public function detail(Request $request){
        $restaurant = Restaurant::findOrFail($request->id);
        if ($restaurant) {
            return view('detail', ['restaurant' => $restaurant]);
        } else {
            return redirect('/');
        }
    }

    public function favorite_create(Request $request){
        $user_id = Auth::user()->id;
        $favorite = [
            'user_id' => $user_id,
            'restaurant_id' => $request->restaurant_id
        ];
        Favorite::create($favorite);
        return redirect()->back();
    }

    public function favorite_delete(Request $request){
        $user_id = Auth::user()->id;
        Favorite::where('user_id', $user_id)->where('restaurant_id', $request->restaurant_id)->delete();
        return redirect()->back();
    }

    public function reservation_create(Request $request){
        $user_id = Auth::user()->id;
        $reservation = [
            'user_id' => $user_id,
            'restaurant_id' => $request->restaurant_id,
            'name' => $request->name,
            'date' => $request->date,
            'time' => $request->time,
            'nop' => $request->nop,
        ];
        Reservation::create($reservation);
        return view('done');
    }

    public function reservation_delete(Request $request){
        Reservation::where('id', $request->id)->delete();
        return redirect()->back();
    }
    
    public function done(Request $request){
        return view('done');
    }

    public function owneredit(){
        $users = \App\Models\User::all();
        return view('owneredit', ['users' => $users]);
    }
    
    public function ownerdashboard(){
        $restaurants = Restaurant::all();
        return view('ownerdashboard',['restaurants' => $restaurants]);
    }
    
    public function restaurant_create(Request $request){
        $param = [
        'name' => $request->name,
        'area' => $request->area,
        'genre' => $request->genre,
        'summary' => $request->summary,
        'url' => $request->url
        ];
        Restaurant::create($param);
        return redirect()->back();
    }

    public function restaurant_edit(Request $request){
        $param = [
        'name' => $request->name,
        'area' => $request->area,
        'genre' => $request->genre,
        'summary' => $request->summary,
        'url' => $request->url
        ];
        Restaurant::where('id', $request->id)->update($param);
        return redirect()->back();
    }

    public function restaurant_delete(Request $request){
        Restaurant::where('id', $request->id)->delete();
        return redirect()->back();
    }

    public function roleedit(Request $request){
        \App\Models\User::where('id', $request->user_id)->update(['role' => $request->role]);
        $user = \App\Models\User::where('id', $request->user_id)->get();
        return redirect()->back();
    }

    public function showImage($filename){
        $path = 'img/' .$filename;
        $file = Storage::disk('s3')->get($path);
        return response($file, 200)->header('Content-Type', 'image/jpeg');
    }

    public function upload(Request $request)
    {
        $upload_file = $request->file('upload_file');
        if(!empty($upload_file)) {

        // アップロード先S3フォルダ名 
        $dir = 'img';
        $s3_upload = Storage::disk('s3')->putFileAs('/'.$dir, $upload_file, $request->file_name);
        }

        return redirect()->back();
    }

    public function generateQRCode($reservationNumber)
    {
        return QrCode::size(300)->generate('A basic example of QR code!');
    }
}
