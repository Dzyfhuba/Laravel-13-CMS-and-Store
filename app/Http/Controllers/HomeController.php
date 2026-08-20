<?php

namespace App\Http\Controllers;

use App\Models\Blog;
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
        $services = Service::latest()->take(4)->get();
        $projects = Project::latest()->take(4)->get();
        $blogs = Blog::latest()->take(3)->get();

        for ($i = 0; $i < 4; $i++) {
            if ($i < 3) {
                $products[$i]->thumbnail = Storage::temporaryUrl($products[$i]->thumbnail, now()->addCentury());
                $blogs[$i]->thumbnail = Storage::temporaryUrl($blogs[$i]->thumbnail, now()->addCentury());
            }
            $projects[$i]->thumbnail = Storage::temporaryUrl($projects[$i]->thumbnail, now()->addCentury());
            $services[$i]->thumbnail = Storage::temporaryUrl($services[$i]->thumbnail, now()->addCentury());
        }

        return inertia('Welcome', [
            'products' => $products,
            'services' => $services,
            'projects' => $projects,
            'blogs' => $blogs
        ]);
    }
}
