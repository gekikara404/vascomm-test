<?php

namespace App\Http\Controllers;

use App\Repositories\Banner\BannerInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public $banner;

    public function __construct(BannerInterface $bannerInterface)
    {
        $this->banner = $bannerInterface;    
    }

    public function index()
    {
        $banners = $this->banner->listBanner();
        return view('pages.banners.index',compact('banners'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'image' => 'required|mimes:jpg,png,jpeg|max:4028'
        ]);
        if ($validate->fails()) {
            return redirect()->route('banners.index');
        }
        $input = $request->all();
        $file = $request->file('image');
        $fileName = storeImages('public/images/banner/',$file);
        $input['image'] = $fileName;
        $this->banner->createBanner($input);
        return redirect()->route('banners.index');
    }

    public function delete($id)
    {
        $this->banner->deleteBanner($id);
        return response()->json([
            'success'   => true,
        ]);
    }
}
