<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use View;

class AjaxController extends Controller
{
    
    public function index()
    {
        return view('homepage'); 
    }

    public function gotosecond()
    {
        return view('secondpage');
    }

    public function result(Request $request){
        $this->validate($request,[
          'numcol'=>'required',
          'yieldpercol'=>'required',
          'totalprod'=>'required',
          'stocks'=>'required',
          'priceperlb'=>'required',
          'year'=>'required'
        ]);
        $item= array();
        $tempPredict1= substr($request->predictDataTemp,2);
        $tempPredict2= substr($tempPredict1,0,-2);
        /*array_push($item,array('Calories'=>$request->mCalories,'Cholesterol'=>$request->mCholesterol,'Fat'=>$request->mFat,'Protein'=>$request->mProtein,'Sugars'=>$request->mSugars,'Predict'=>$tempPredict2));
        $temp=json_encode($item);
        $temp_Decode=json_decode($temp);
    */
      $data = array(
        "numcol" => $request->numcol,
        "yieldpercol" => $request->yieldpercol,
        "totalprod" => $request->totalprod,
        "stocks" =>$request->stocks,
        "priceperlb" => $request->priceperlb,
        "year" => $request->year,
        "Prediction" => $tempPredict2
      );
        return view('result',['temp'=>$data]);
      }


}


