<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Metcast</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="main-wrapper">
            <h1>METCAST</h1>
            <span class="small">Please enter a CITY or ZIPCODE for the current weather information</span>
            @if (\Session::has('error'))
                <div class="alert alert-danger" role="alert" id="alert-danger" onclick="document.getElementById('alert-danger').style.display='none';">
                    {!! \Session::get('error') !!}
                </div>
            @endif
            <form action="/weather/parse" method="post">
                @csrf
                <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" placeholder="Enter city name" name="city">
                </div>
                <div class="form-group">
                <label for="zipcode">Zipcode</label>
                <input type="text" class="form-control" id="zipcode" placeholder="Enter zipcode" name="zipcode">
                <small class="form-text text-muted">Visit <a href="https://www.zipdatamaps.com/" target="_blank">site</a> to get postcode you need</small>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button type="submit" class="btn btn-primary">Show metcast</button>
          </form>
        </div>
    </body>
</html>
