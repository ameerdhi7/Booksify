<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        <link rel="stylesheet" href="/css/helper.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css"
              href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
</head>
<body class="bg-light vector">
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-8">
            <div class="card">
                <div class="card-header text-center blue-gradient-rgba">

<h3 class="text-white"><span>{{$employee->name}}</span> <span>Attendance Report</span></h3>
                </div>
                <div class="card-body">
                    <div class="" id='calendar'></div>
                  <div class="row justify-content-center">
                      <div class="col-12">
                          <div class="card">
                              <div class="card-header text-white text-center blue-gradient-rgba">
                                  Total late in hours and min
                              </div>
                              <div class="card-body text-center">
<h3>                                  {{$totalLate}}
</h3>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
        $(document).ready(function() {
                // page is now ready, initialize the calendar...
                $('#calendar').fullCalendar({
                        // put your options and callbacks here
                        events : [
                                        @foreach($attendances as $attendance)
                                {
                                        title : 'حضور',
                                        start : '{{ $attendance->attendance_day }}',
                                },
                                @endforeach
                        ]
                })
        });
</script>
</body>
</html>
