<?php

namespace App\Http\Controllers;

use App\Models\Award;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    /**
     * Get Award's image url
     *
     * @param integer $awardId
     * 
     * @return String
     * 
     */
    // public static function getMediaUrlForAward($awardId)
    // {
    //     $awardModel = new Award();
    //     $award = $awardModel->find($awardId);

    //     return $award ? $award->full_name : null;
    // }
}