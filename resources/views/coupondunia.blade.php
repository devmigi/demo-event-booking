@extends('layouts.front2')

@section('content')
<div class="container">

    <h1 class="page-header font-weight-light text-center">Upload Your Input File</h1>

    <div class="card">
        <div class="card-body bg-light text-center">
            <br>
            <form method="post" enctype="multipart/form-data">

                {!! csrf_field() !!}

                <input type="file" class="form-control" name="file" id="file" placeholder="" required>
                <div class="invalid-feedback">
                    Please select a valid file
                </div>
                @if ($errors->has('file'))
                    <span class="help-block">
                        <strong>{{ $errors->first('file') }}</strong>
                    </span>
                @endif
                <br>
                <button type="submit" class="btn btn-primary">Calculate</button>

            </form>
        </div>

    </div>

    @if($totalHike)
        <br><br>
        <div class="card">
            <div class="card-body">
                <h4>Total Hike = Rs. {{ $totalHike }}</h4>
            </div>
        </div>
    @endif

    <br><br>
    <div class="card">
        <div class="card-body">
            <h4>Code</h4>
            <div>
                <pre>
/**
* Show the application dashboard for Calculator.
*
* @return \Illuminate\Http\Response
*/
public function couponduniaCalculate(Request $request)
{
    request()->validate([
    'file' => 'required',
    ]);

    // get file from input
    $file = $request->file('file');

    // store each line into array
    $ratings = file($file, FILE_IGNORE_NEW_LINES);

    if(!$ratings){
    return "Invalid Input!";
    }


    //        $ratings = [ 2, 4, 2, 6, 1, 7, 8, 9, 2, 1 ];
    //        $ratings = [ 1,2,2];

    $totalHike =  $this->hikeCalculator($ratings);


    return view('coupondunia', ['totalHike' => $totalHike]);
}


// calculate hike
private function hikeCalculator($ratings) {
    // if there's only one employee
    if (count($ratings)==1) {
    return 1;
    }

    // calculate height from start to end
    $hikes = $this->hikeFromStart($ratings);

    // calculate hike from end to start
    $hikes = $this->hikeFromEnd($ratings, $hikes);

    return array_sum($hikes);
}


// calculate hike from end to start
private function hikeFromStart($ratings) {
    $hikes = [];
    $hikes[0] = 1;

    for ($i = 1; $i < count($ratings); $i++) {
        if ($ratings[$i] > $ratings[$i - 1]) {
            $hikes[$i] = $hikes[$i - 1] + 1;
        } else {
            $hikes[$i] = 1;
        }
    }
    return $hikes;
}


// calculate hike from end to start
private function hikeFromEnd($ratings, $hikes) {
    for ($i = count($ratings) - 2; $i >= 0; $i--) {
        if ($ratings[$i] > $ratings[$i + 1]) {
            $hikes[$i] = max($hikes[$i], $hikes[$i + 1] + 1);
        }
    }

    return $hikes;
}

                </pre>
            </div>
        </div>
    </div>

    <br><br>


</div>
@endsection


@section('page-script')

@endsection