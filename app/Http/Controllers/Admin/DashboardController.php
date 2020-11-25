<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\Reservation;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index(){
        
        $category = Category::count();
        $item = Item::count();
        $reservation = Reservation::where('status', false)->get();
        $reservations = Reservation::count();
        $reservationds = Reservation::all();
        $contact = Contact::count();
        $contacts = Contact::all();
        return view('admin.dashboard',compact('category','item','reservation','reservations','contact','reservationds','contacts'));
    }
}
