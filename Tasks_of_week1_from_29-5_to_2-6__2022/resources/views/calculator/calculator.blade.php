@extends('cars.common_file.layout')

@section('content')

    <div class="container col-4 mt-5">
    <form method="get" action="">
      <h1>Calculator</h1>
      <label for="firstNumber">First Number</label>
      <input name="n1" value="" class="form-control" id="firstNumber" aria-describedby="firstNumber" placeholder="Enter first number">
      <label class="mt-3" for="secoundNumber">Secound Number</label>
      <input name="n2" value="" class="form-control" id="secoundNumber" aria-describedby="secoundNumber" placeholder="Enter secound number"><br><br>
  <input type="submit" name="sub" value="+" class="btn btn-primary">
  <input type="submit" name="sub" value="-" class="btn btn-primary">
  <input type="submit" name="sub" value="x" class="btn btn-primary">
  <input type="submit" name="sub" value="/" class="btn btn-primary"><br><br>
  <label for="result">Result</label>
  <input type='text' value="@if (isset($ans)) {{ $ans }} @endif" class="form-control" id="result" aria-describedby="result">
  </form>
  </div>

@endsection
