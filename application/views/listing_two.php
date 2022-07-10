<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<!--Styles-->
<link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.css' rel='stylesheet' />
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/
bootstrap.min.css'>
<link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<!--Scripts-->
<script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/moment.min.js'></script>
<script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/jquery.min.js'></script>
<script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min
.js'></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    var events = <?php echo json_encode($data) ?>;
    console.log(events)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $(document).ready(function() {
        $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        defaultDate: '2018-03-12',
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: [
            {
            title: 'All Day Event',
            start: '2018-03-01',
            backgroundColor:'red'
            }
        ],
        eventClick: function(calEvent, jsEvent, view, resourceObj) {
        /*Open Sweet Alert*/
            swal({
                title: calEvent.title,//Event Title
                text: "Start From : "+moment(calEvent.start).format("MMMM Do YYYY, h:mm a"),//Event Start Date
                icon: "success",
            });
        }
        });
    });
</script>
<style>
  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }
  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }
  .hoverEffect {
    font-size: 29px;
    position: absolute;
    margin: 30px 55px;
    cursor: pointer;
}
</style>
</head>
<body>
  <div id='calendar'></div>
</body>
</html>