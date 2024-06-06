<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\UrlGenerator;

class RouteWrapperController extends Controller
{  
    private $urlGenerator;

    public function __construct(UrlGenerator $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function generateUrl($routeName, $parameters = [])
    {
        return $this->urlGenerator->route($routeName, $parameters);
    }
}
