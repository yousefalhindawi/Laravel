<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    // Start of function calculate
    public function calculate() {
        $ans ='';
        if(request('sub')){
    $num1=strip_tags( request('n1'));
    $num2=strip_tags( request('n2'));
    $operations=strip_tags( request('sub'));

    if($operations=="+"){
    $ans=$num1+$num2;
    return view('calculator.calculator' ,compact('ans'));
}
    else if($operations=="-"){
    $ans=$num1-$num2;
    return view('calculator.calculator' ,compact('ans'));
}
    else if($operations=="x"){
    $ans=$num1*$num2;
    return view('calculator.calculator' ,compact('ans'));
}
    else if($operations=="/"){
    $ans=$num1/$num2;
    return view('calculator.calculator' ,compact('ans'));
}

}else {
return view('calculator.calculator');
}


    }
    // End of function calculate


}

