<?php

namespace App\Http\Controllers;

use App\Hasil;
use App\Koleris;
use App\Plegmatis;
use App\Sanguinis;
use App\Melankolis;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function step1()
    {
    	$question = Koleris::all();
    	return view("layouts.question", ["question" => $question, "step" => 1]);
    }

    public function saveStep1(Request $req)
    {	
    	$answerData = [];
    	
    	for ($i = 0; $i < Koleris::all()->count(); $i++) { 
    		$answer = $req[$i+1];
    		array_push($answerData, $answer);
    	}

    	session()->put("koleris", $answerData);
    	return redirect('/step2');
    }

    public function step2()
    {
    	$question = Melankolis::all();
    	return view("layouts.question", ["question" => $question, "step" => 2]);
    }

    public function saveStep2(Request $req)
    {	
    	$answerData = [];
    	
    	for ($i = 0; $i < Melankolis::all()->count(); $i++) { 
    		$answer = $req[$i+1];
    		array_push($answerData, $answer);
    	}

    	session()->put("melankolis", $answerData);
    	return redirect('/step3');
    }

    public function step3()
    {
    	$question = Plegmatis::all();
    	return view("layouts.question", ["question" => $question, "step" => 3]);
    }

    public function saveStep3(Request $req)
    {	
    	$answerData = [];
    	
    	for ($i = 0; $i < Plegmatis::all()->count(); $i++) { 
    		$answer = $req[$i+1];
    		array_push($answerData, $answer);
    	}

    	session()->put("plegmatis", $answerData);
    	return redirect('/step4');
    }

    public function step4()
    {
    	$question = Sanguinis::all();
    	return view("layouts.question", ["question" => $question, "step" => 4]);
    }

    public function saveStep4(Request $req)
    {	
    	$answerData = [];
    	
    	for ($i = 0; $i < Sanguinis::all()->count(); $i++) { 
    		$answer = $req[$i+1];
    		array_push($answerData, $answer);
    	}

    	session()->put("sanguinis", $answerData);

    	return redirect('/hasil');
    	// return response()->json([
    	// 	"koleris" => session()->get("koleris"),
    	// 	"melankolis" => session()->get("melankolis"),
    	// 	"plegmatis" => session()->get("plegmatis"),
    	// 	"sanguinis" => session()->get("sanguinis"),
    	// ]);
    }

    public function calcResult()
    {
    	$koleris = 0;
    	foreach (session()->get("koleris") as $key => $value) {
    		if ($value === "YA") {
    			$koleris += 1;
    		}
    	}

    	$melankolis = 0;
    	foreach (session()->get("melankolis") as $key => $value) {
    		if ($value === "YA") {
    			$melankolis += 1;
    		}
    	}

    	$plegmatis = 0;
    	foreach (session()->get("plegmatis") as $key => $value) {
    		if ($value === "YA") {
    			$plegmatis += 1;
    		}
    	}

    	$sanguinis = 0;
    	foreach (session()->get("sanguinis") as $key => $value) {
    		if ($value === "YA") {
    			$sanguinis += 1;
    		}
    	}

    	$max = max($koleris, $melankolis, $plegmatis, $sanguinis);
    	$result = [];

    	if ($max == $koleris) {
    		$result = Hasil::whereJenis("Koleris")->first();
    	}else if ($max == $melankolis) {
    		$result = Hasil::whereJenis("Melankolis")->first();
    	}else if ($max == $plegmatis) {
    		$result = Hasil::whereJenis("Plegmatis")->first();
    	}else if ($max == $sanguinis) {
    		$result = Hasil::whereJenis("Sanguinis")->first();
    	}

    	return view("layouts.result", ["result" => $result]);
    }
}
