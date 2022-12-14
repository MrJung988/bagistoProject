<?php

namespace Webkul\Shop\Http\Controllers;

use ACME\HelloWorld\Models\HelloWorld;
use Webkul\Shop\Http\Controllers\Controller;
use Webkul\Core\Repositories\SliderRepository;
use Webkul\Product\Repositories\SearchRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Core\Repositories\SliderRepository  $sliderRepository
     * @param  \Webkul\Product\Repositories\SearchRepository  $searchRepository
     * @return void
     */
    public function __construct(
        protected SliderRepository $sliderRepository,
        protected SearchRepository $searchRepository
    )
    {
        parent::__construct();
    }

    /**
     * Loads the home page for the storefront.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $oneImageBanner = HelloWorld::where('banner_type', 'one')->get();
        $twoImageBanner = HelloWorld::where('banner_type', 'two')->get();
        $threeImageBanner = HelloWorld::where('banner_type', 'three')->get();
        $fourImageBanner = HelloWorld::where('banner_type', 'four')->get();
        
        $sliderData = $this->sliderRepository->getActiveSliders();

        return view($this->_config['view'], compact('sliderData', 'oneImageBanner', 'twoImageBanner', 'threeImageBanner', 'fourImageBanner'));
    }

    /**
     * Loads the home page for the storefront if something wrong.
     *
     * @return \Exception
     */
    public function notFound()
    {
        abort(404);
    }

    /**
     * Upload image for product search with machine learning.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload()
    {
        return $this->searchRepository->uploadSearchImage(request()->all());
    }
}
