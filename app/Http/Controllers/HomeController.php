<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\hr\Publication;

class HomeController extends Controller
{
    private $publication;

    public function __construct(Publication $publication)
    {
        $this->publication = $publication;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $publication = $this->publication->get();
        return view('publication')->with('publication',$publication);
    }
}
