<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\HomePage;
use App\Models\Product;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use Storage;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(3)->get();
        $services = Service::take(4)->get();
        $projects = Project::latest()->take(4)->get();
        $blogs = Blog::latest()->take(3)->get();

        $home = HomePage::getGroupValue();

        for ($i = 0; $i < 4; $i++) {
            if ($i < 3) {
                $products[$i]->thumbnail = Storage::url($products[$i]->thumbnail);
                $blogs[$i]->thumbnail = Storage::url($blogs[$i]->thumbnail);
            }
            $projects[$i]->thumbnail = Storage::url($projects[$i]->thumbnail);
            $services[$i]->thumbnail = Storage::url($services[$i]->thumbnail);
            $services[$i]->icon = Storage::url($services[$i]->icon);
        }

        return inertia('Welcome', [
            'products' => $products,
            'services' => $services,
            'projects' => $projects,
            'blogs' => $blogs,
            'home' => $home,
        ]);
    }
}
