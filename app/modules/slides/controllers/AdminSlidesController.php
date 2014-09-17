<?php namespace App\Modules\Slides\Controllers;

use App\Modules\Slides\Models\Slide;
use Hover, BackController;

class AdminSlidesController extends BackController {

    protected $icon = 'color_swatch.png';

    public function __construct()
    {
        $this->modelName = 'Slide';

        parent::__construct();
    }

    public function index()
    {
        $this->indexPage([
            'buttons'   => ['new', 'category'],
            'tableHead' => [
                trans('app.id')             => 'id', 
                trans('app.title')          => 'title',
                trans('app.category')       => 'slidecat_id', 
            ],
            'tableRow' => function($slide)
            {
                $hover = new Hover();
                if ($slide->image) $hover->image($slide->uploadPath().$slide->image);

                return [
                    $slide->id,
                    $hover.$slide->title,
                    $slide->slidecat->title,
                ];            
            }
        ]);
    }

}