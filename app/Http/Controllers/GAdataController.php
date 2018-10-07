<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;

class GAdataController extends Controller
{
    public function getData(){

        $analyticsData1 = Analytics::fetchVisitorsAndPageViews(Period::months(6));
        $analyticsData2 = Analytics::fetchMostVisitedPages(Period::months(6));
        $analyticsData3 = Analytics::fetchTopBrowsers(Period::months(6));
        $analyticsData4 = Analytics::fetchUserTypes(Period::months(6));

        return view('admin.gadata.danhsach',['VisitorsAndPageViews'=> $analyticsData1,'MostVisitedPages'=>$analyticsData2,
            'TopBrowsers'=>$analyticsData3, 'UserTypes'=>$analyticsData4]);
    }
    public function getVisitorsAndPageViews(){
        $analyticsData1 = Analytics::fetchVisitorsAndPageViews(Period::months(6));
        return view('admin.gadata.VisitorsAndPageViews',['VisitorsAndPageViews'=> $analyticsData1]);
    }
    public function getMostVisitedPages(){
        $analyticsData2 = Analytics::fetchMostVisitedPages(Period::months(6));
        return view('admin.gadata.MostVisitedPages',['MostVisitedPages'=>$analyticsData2]);
    }
}
