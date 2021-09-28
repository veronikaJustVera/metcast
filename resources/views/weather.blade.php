<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Metcast</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('css/weather.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        <a href="/weather">Back to Main Page</a>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-4 col-sm-12 col-xs-12">
                    <div class="card p-4">
                        <div class="d-flex">
                            <h2 class="flex-grow-3">{{$weater_data->name}}</h2>
                        </div>
                        <div class="d-flex">
                            <div class="d-flex flex-column temp">
                                <h1 class="mb-0 font-weight-bold" id="heading"> {{$weater_data->main->temp_celsius}}° C </h1>
                                <span class="small grey">{{$weater_data->weather[0]->main}}</span>
                                <img src="http://openweathermap.org/img/wn/{{$weater_data->weather[0]->icon}}@2x.png" width="100px">
                            </div>
                            <div class="temp-details flex-grow-1">
                                <p class="my-1"> <i class="fa fa-wind mr-2" aria-hidden="true"></i> <span> {{$weater_data->wind->speed}} m/sec </span> </p>
                                <p class="my-1"> <i class="fa fa-tint mr-2" aria-hidden="true"></i> <span> {{$weater_data->main->humidity}}% </span> </p>
                            </div><br>
                            <div class="compass">
                                <div class="direction">
                                  <p>{{$weater_data->wind_deg}}</p>
                                </div>
                                <div class="arrow {{$weater_data->wind_deg}}"></div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
