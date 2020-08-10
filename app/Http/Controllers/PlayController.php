<?php

namespace App\Http\Controllers;

use App\Ball;
use App\Box;
use App\Setting;
use App\Input;
use App\Color;
use App\Distro;
use Faker\Generator as Faker;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class PlayController extends Controller
{
  /**
     * Create a new controller instance.
     * @return void
     */

    private $arrBall=array();
    private $arrBox=array();
    private $arrColor=array();

    public function play()
    {
        // get current settings for n and color limit per box
        $settings = Setting::where('name','N')->get();
        $n = $settings->first()->content;
        $colorLimit = Setting::where('name','colorLimit')->get();
        $l = $colorLimit->first()->content;

        // get random working color set
        $colors = Color::all();
        $this->colorSet = $colors->random($n)->unique();
        $this->arrColor = $this->colorSet->toArray();

        // create ball objects
        $this->generateBallsAndBoxes($n,$this->arrColor);
        $boxes = collect($this->arrBox);
        $balls = collect($this->arrBall);

        //distribute balls to boxes with current settings
        $distribution = $this->distribute($n, $l, $balls, $boxes);

        return view('play', compact('balls','boxes','settings','distribution'));
    }

    public function generateBallsAndBoxes($n,$arrColor)
    {

      //ensuring that each color is acoounted for at least once
      for($i=0;$i<$n;$i++)
      {
        $c = $arrColor[$i]['color'];

        //generating first n Balls
        $ball = new Ball(['ball_id'=>$i,'color'=>$c]);
        array_push($this->arrBall,$ball);

        //generating n Boxes
        $box = new Box(['box_id'=>$i,'colorsInBox'=>[],'ballsInBox'=>[]]);
        array_push($this->arrBox,$box);
      }


      for($i=$n;$i<pow($n,2);$i++)
      {
        //Generating remaining Balls
        $rc = array_rand($arrColor,1);
        $c = $arrColor[$rc]['color'];
        $ball = new Ball(['ball_id'=>$i,'color'=>$c]);
        array_push($this->arrBall,$ball);
      }

    }

    public function distribute($n, $l, $ballsArray, $boxesArray)
    {
      $balls = collect($ballsArray);
      $boxes = collect($boxesArray);
      $distribution = collect();

      //Distribution steps counter
      $s=0;

      do{ //while there are still balls to be distributed

        // count already distributed balls;
        $distributedBalls = Distro::where('id','<>','')->count();
              $s++;

          // Attempting to place each boll ...
          foreach($balls as $ball){
              // .. in each box
            foreach($boxes as $box){
              // get all balls in current box
              $d = Distro::where('box_id',$box->box_id)->get();
              // check if there is room in box for another ball
              if($d->count()<$n){
                $ballsInBox = Distro::where('box_id',$box->box_id)->get();
                if(count($ballsInBox)<$n){
                  // check which unique colors are already in th box if any
                  $colorsInBox = Distro::select('color')->where('box_id',$box->box_id)->get();
                  $nrColorsInBox = Distro::where('box_id',$box->box_id)->distinct()->count('color');
                    // enforce color limit constraint
                    if($nrColorsInBox<$l || $colorsInBox->contains('color',$ball->color)){
                      // check if color is already in the boxes
                      if($colorsInBox->contains('color',$ball->color)){
                        // there is room in the box and colors are less than 2 or ball
                        //Placing ball in box
                        Distro::insert([
                          'ball_id'=>$ball->ball_id,
                          'box_id'=>$box->box_id,
                          'color'=>$ball->color
                        ]);
                        // eliminating placed ball from working set of balls
                        $balls->forget($ball->ball_id);
                        // updating number of already place balls
                        $distributedBalls = Distro::all()->count();
                        break; // go to next ball

                    //Color not in box and no more than allowed number of different colors in box
                    }else if(!$colorsInBox->contains('color',$ball->color)){
                        Distro::insert([
                          'ball_id'=>$ball->ball_id,
                          'box_id'=>$box->box_id,
                          'color'=>$ball->color
                        ]);
                        //Placing ball in box
                        $balls->forget($ball->ball_id);
                        // eliminating placed ball from working set of balls
                        break; // go to next ball
                    }
                  } // go to next box
                }// go to next box
              }
            }
          }
          // counting overall balls already distributed
          $distributedBalls = Distro::all()->count();
          // Stop distributing infinetly
          if($s>500){break;}
      // all balls have been distributed
      }while($distributedBalls<($n*$n));

      if($s>500){
        // delete balls from working table
        Distro::truncate();return;
      }else{
        $dist = array();
        // get current distribution
        $distribution = Distro::all();
        // delete balls from working table
        Distro::truncate();
        // Save current distribution for history
        Input::insert([
          'number'=>$n,
          'set'=>$distribution->toJson()
        ]);
        return $distribution;
      }

    }

    /**
     * Update settings in play view
     * @return \Illuminate\Http\Response
     */
    public function updatePlay(Request $request, Setting $setting)
    {

      $id = $setting->id;
      $data = $request->validate([
        'content' => 'numeric|max:10'
      ]);

      Setting::whereId($id)->update($data);
      return redirect('/playgame')->with('success','Setting saved');

    }
    /**
     * Collectrion utility
     * @return \Illuminate\Http\Response
     */
     function collect($value = null)
     {
         return new Collection($value);
     }


}
