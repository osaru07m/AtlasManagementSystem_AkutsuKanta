<?php
namespace App\Calendars\Admin;

use Carbon\Carbon;
use App\Models\Calendars\ReserveSettings;

class CalendarWeekDay{
  protected $carbon;

  function __construct($date){
    $this->carbon = new Carbon($date);
  }

  function getClassName(){
    return "day-" . strtolower($this->carbon->format("D"));
  }

  function render(){
    return '<p class="day">' . $this->carbon->format("j") . '日</p>';
  }

  function everyDay(){
    return $this->carbon->format("Y-m-d");
  }

  function dayPartCounts($ymd){
    $html = [];
    $one_part = ReserveSettings::with('users')->where('setting_reserve', $ymd)->where('setting_part', '1')->first();
    $two_part = ReserveSettings::with('users')->where('setting_reserve', $ymd)->where('setting_part', '2')->first();
    $three_part = ReserveSettings::with('users')->where('setting_reserve', $ymd)->where('setting_part', '3')->first();

    $html[] = '<div class="text-left">';
    if($one_part){
      $one_part_count = $one_part->users()->count();

      $html[] = '<p class="day_part m-0 pt-1">1部</p>';
      if($one_part_count == 0){
        $html[] = '<p class="m-0 pt-1">0</p>';
      }
      else {
        $html[] = '<a href="' . route('calendar.admin.detail', ['date' => $one_part->setting_reserve, 'part' => 1]) . '" class="m-0 pt-1">' . $one_part_count . '</a>';
      }
    }
    if($two_part){
      $two_part_count = $two_part->users()->count();

      $html[] = '<p class="day_part m-0 pt-1">2部</p>';
      if($two_part_count == 0){
        $html[] = '<p class="m-0 pt-1">0</p>';
      }
      else{
        $html[] = '<a href="' . route('calendar.admin.detail', ['date' => $two_part->setting_reserve, 'part' => 2]) . '" class="m-0 pt-1">' . $two_part_count . '</a>';
      }
    }
    if($three_part){
      $three_part_count = $three_part->users()->count();

      $html[] = '<p class="day_part m-0 pt-1">3部</p>';
      if($three_part_count == 0){
        $html[] = '<p class="m-0 pt-1">0</p>';
      }
      else{
        $html[] = '<a href="' . route('calendar.admin.detail', ['date' => $three_part->setting_reserve, 'part' => 3]) . '" class="m-0 pt-1">' . $three_part_count . '</a>';
      }
    }
    $html[] = '</div>';

    return implode("", $html);
  }


  function onePartFrame($day){
    $one_part_frame = ReserveSettings::where('setting_reserve', $day)->where('setting_part', '1')->first();
    if($one_part_frame){
      $one_part_frame = ReserveSettings::where('setting_reserve', $day)->where('setting_part', '1')->first()->limit_users;
    }else{
      $one_part_frame = "20";
    }
    return $one_part_frame;
  }
  function twoPartFrame($day){
    $two_part_frame = ReserveSettings::where('setting_reserve', $day)->where('setting_part', '2')->first();
    if($two_part_frame){
      $two_part_frame = ReserveSettings::where('setting_reserve', $day)->where('setting_part', '2')->first()->limit_users;
    }else{
      $two_part_frame = "20";
    }
    return $two_part_frame;
  }
  function threePartFrame($day){
    $three_part_frame = ReserveSettings::where('setting_reserve', $day)->where('setting_part', '3')->first();
    if($three_part_frame){
      $three_part_frame = ReserveSettings::where('setting_reserve', $day)->where('setting_part', '3')->first()->limit_users;
    }else{
      $three_part_frame = "20";
    }
    return $three_part_frame;
  }

  //
  function dayNumberAdjustment(){
    $html = [];
    $html[] = '<div class="adjust-area">';
    $html[] = '<p class="d-flex m-0 p-0">1部<input class="w-25" style="height:20px;" name="1" type="text" form="reserveSetting"></p>';
    $html[] = '<p class="d-flex m-0 p-0">2部<input class="w-25" style="height:20px;" name="2" type="text" form="reserveSetting"></p>';
    $html[] = '<p class="d-flex m-0 p-0">3部<input class="w-25" style="height:20px;" name="3" type="text" form="reserveSetting"></p>';
    $html[] = '</div>';
    return implode('', $html);
  }
}
