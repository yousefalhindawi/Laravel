<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container col-4 mt-5">
    <form method="get" action="">
      <h1>Calculator</h1>
      <label for="firstNumber">First Number</label>
      <input name="n1" value="" class="form-control" id="firstNumber" aria-describedby="firstNumber" placeholder="Enter firstNumber">
      <label for="secoundNumber">Secound Number</label>
      <input name="n2" value="" class="form-control" id="secoundNumber" aria-describedby="secoundNumber" placeholder="Enter secoundNumber"><br><br>
  <input type="submit" name="sub" value="+" class="btn btn-primary">
  <input type="submit" name="sub" value="-" class="btn btn-primary">
  <input type="submit" name="sub" value="x" class="btn btn-primary">
  <input type="submit" name="sub" value="/" class="btn btn-primary"><br><br>
  <label for="result">Result</label>
  <input type='text' value="@if (isset($ans)) {{ $ans }} @endif" class="form-control" id="result" aria-describedby="result">
  </form>
  </div>

</body>
</html>