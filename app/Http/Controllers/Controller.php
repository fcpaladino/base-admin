<?php

namespace App\Http\Controllers;

use App\Libs\DataOperation\DataOperation;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

/**
 * Class Controller
 * @package App\Http\Controllers
 */
abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

	public $gridView;

    /**
     * @var DataOperation
     */
    public $wbd;

    /**
     * @param DataOperation $wbd
     */
    public function __construct(DataOperation $wbd)
    {
        $this->wbd      = $wbd;
        $this->gridView = $this->wbd->gridView;
    }
}
