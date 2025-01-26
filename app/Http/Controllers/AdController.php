<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use App\Models\Category;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    public function list()
    {
        return view('list');
    }

    public function show(String $slug)
    {
        $ad = Advertise::where('slug', $slug)->first();

        if(!$ad)
        {
            return redirect()->route('home');
        }

        $ad->views++;
        $ad->save();

        $relatedAds = Advertise::where('category_id', $ad->category_id)
                               ->where('id', '<>', $ad->id)
                               ->where('state_id', $ad->state_id)
                               ->with('images')
                               ->orderBy('created_at', 'desc')
                               ->orderBy('views', 'desc')
                               ->limit(4)
                               ->get();

        return view('single-ad', compact('ad', 'relatedAds'));
    }


    public function delete(String $id)
    {
        $ad = Advertise::where('id', $id)
                ->where('user_id', Auth::user()->id)
                ->first();

        if (!$ad)
        {
            return redirect()->route('home');
        }

        // Resposabilidade de deletar cascade estar por conta do banco na migration.
        $ad->delete();
        return redirect()->back();
    }

    public function category(String $slug)
    {
        $category = Category::where('slug', $slug)->first();

        if(!$category)
        {
            return redirect()->route('home');
        }

        $filteredAds = Advertise::where('category_id', $category->id)
                                ->with('images')
                                ->orderBy('created_at', 'desc')
                                ->simplePaginate(6);

        return view('category-list', compact('filteredAds', 'category'));
    }

    public function create()
    {
        return view('dashboard.ad_create');
    }
}
