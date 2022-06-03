<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{

    public function calculate() {

        $ans ='';
        if(request('sub')){
    $num1=request('n1');
    $num2=request('n2');
    $oprnd=request('sub');

    if($oprnd=="+"){
    $ans=$num1+$num2;
    return view('calculator.calculator' ,compact('ans'));
}
    else if($oprnd=="-"){
    $ans=$num1-$num2;
    return view('calculator.calculator' ,compact('ans'));
}
    else if($oprnd=="x"){
    $ans=$num1*$num2;
    return view('calculator.calculator' ,compact('ans'));
}
    else if($oprnd=="/"){
    $ans=$num1/$num2;
    return view('calculator.calculator' ,compact('ans'));
}
    else {
    return view('calculator.calculator');
}
}


    }
}

