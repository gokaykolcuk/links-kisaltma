<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Click;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Stevebauman\Location\Facades\Location;

class LinkController extends Controller
{
    public function index(){
        $links = Link::latest()->get();
        return view('links.link',compact('links'));
    }

    public function create(){
        $categories = Category::all();
        return view('links.create',compact('categories'));
    }
    
    public function store(Request $request){
        $request->validate([
            'original_url' => 'required|url',
            'title' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id'
        ]);

        $link = new Link([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'original_url' => $request->original_url,
            'short_url' => Str::random(6),
            'is_active' => true,
            'category_id' => $request->category_id // Kullanıcı kategori seçmediyse bu null olacak
        ]);
        
        $link->save();

        $notification = array(
            'message' => 'Category Created Successfully',
             'alert-type' =>'success'
         );
        return redirect()->route('link.index')->with($notification);
    }

    public function edit($id){
        $categories = Category::all();
        $links = Link::findOrFail($id);
        return view('links.edit',compact('links','categories'));
    }
    public function show($id){
        $categories = Category::all();
        $links = Link::findOrFail($id);
        
        return view('links.show',compact('links','categories'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'nullable|string',
            'original_url' => 'required|url',
            'category_id' => 'nullable|exists:categories,id'
        ]);

         
        Link::findOrFail($id)->update([
            'title' => $request->title,
            'original_url' => $request->original_url,
            'short_url' => Str::random(6),
            'category_id' => $request->category_id  
        ]);

        $notification = array(
            'message' => 'Category Created Successfully',
             'alert-type' =>'success'
         );

        return redirect()->route('link.index')->with($notification);

    }

    public function delete($id)
    {
        Link::findOrFail($id)->delete();
        
        return redirect()->route('link.index')->with([
            'message' => 'Link deleted successfully!',
            'alert-type' => 'success'
        ]);
    }

    public function shortenLink($short_link) : RedirectResponse
    {
        
        $link = Link::where('short_url', $short_link)->first();

        if (!$link || !$link->is_active) {
            return view('errors.404');
        }

        $ip = request()->ip();  
        if ($ip == '127.0.0.1' || $ip == '::1') {
            $ip = request()->ip();
        }

        try {
            $currentUserInfo = Location::get($ip);
            if (!$currentUserInfo) {
                throw new \Exception("Konum bilgisi çekilemedi");
            }
            
            Click::create([
                'link_id' => $link->id,
                'ip_address' => $ip,
                'country' => $currentUserInfo->countryName ?? null,
                'city' => $currentUserInfo->cityName ?? null,
                'postal_code' => $currentUserInfo->postalCode ?? null,
                'latitude' => $currentUserInfo->latitude ?? null,
                'longitude' => $currentUserInfo->longitude ?? null
            ]);
        } catch (\Exception $e) {
            Log::error("IP lokasyon çekme hatası: " . $e->getMessage());
           
            Click::create([
                'link_id' => $link->id,
                'ip_address' => $ip
            ]);
        }
        $link->increment('click_count');
        return redirect($link->original_url);  
    }

    public function inactiveLink($id){
        Link::findOrFail($id)->update([
            'is_active' => 0
        ]);
        $notification = array(
            'message' => 'Link Successfully Inactive',
             'alert-type' =>'success'
         );
        return redirect()->route('link.index')->with($notification);
    }
    public function activeLink($id){
        Link::findOrFail($id)->update([
            'is_active' => 1
        ]);

        $notification = array(
            'message' => 'Link Successfully Active',
             'alert-type' =>'success'
         );
        return redirect()->route('link.index')->with($notification);
    }
}
