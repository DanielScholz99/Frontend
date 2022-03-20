<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php



$id = $_GET['id'];
$curl = curl_init();

$url = 'https://localhost/studpro/public/api/datum/' . $id;

$data = array('email' => 'test@test.de','passwort' => '12345678');
$header = array('Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InRlc3RAdGVzdC5kZSJ9.cw-CjwC7Xmh5RAKG-b9f8Jds8qok7QsH0Kr3w4ssv_I',
    'Cookie: ci_session=bv6gn8dq9526urrf5282j0shp8jktjos');

curl_setopt($curl,CURLOPT_URL,$url);
//curl_setopt($curl,CURLOPT_POST,$url);
//curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

$response = curl_exec($curl);

if($e = curl_error($curl)){
    echo $e;
}else{
    $decoded = json_decode($response);
    //print_r($decoded);
}
curl_close($curl);

//var_dump($decoded);
//echo sizeof($decoded);

$stack = array();

foreach ($decoded as $item) {
    //var_dump( $item);
    $array = json_decode(json_encode($item), true);
    array_push($stack, $array);
    echo $array['datumvon'];
    echo $array['datumbis'];
    echo "<br>";
}

foreach ($stack as $item) {
    var_dump($item);
    echo "<br>";
}?>






    <div class="container">
        <div class="calendar-section">

            <div class="card bg-white mt-4">
                <legend class="card-header  bg-white">
                    <div class="d-flex justify-content-between">
                        <div class="h5">
                        </div></div></legend>
                <div class="card-body">
                    <div class="row">
                        <div class="col-2" style="text-align: right">
                            <button type="submit" name="btnAbbrechen" id="btnAbbrechen" class="btn btn-primary mb-2 mr-2 "><i class="far fa-window-close"></i>  Zurück zur Liste</button>
                        </div>

                        <div class="col-lg-5 col-md-4 col-sm-3"></div>
                        <button type="button" id="todayButtonYear" class="btn btn-success mb-2 mr-2 col-md-1 col-sm-2" style="display: none"><i class="fas fa-calendar-day"></i> Heute</button>
                        <button type="button" id="todayButton" class="btn btn-success mb-2 mr-2 col-md-1 col-sm-2"><i class="fas fa-calendar-day"></i> Heute</button>
                        <!--<div class="btn-group btn-group-toggle mb-2 mr-2 col-md-2 col-sm-3" data-toggle="buttons" aria-label="Basic radio toggle button group">
                            <label class="btn btn-primary" id="monatButton" onclick="monatSwitch();">
                                <input type="radio" name="options" id="option1"> Monatsansicht
                            </label>
                            <label class="btn btn-outline-primary" id="jahrButton" onclick="jahrSwitch();">
                                <input type="radio" name="options" id="option2"> Jahresansicht
                            </label>
                        </div>-->
                        <div class="btn-group mb-2 mr-2 col-md-2 col-sm-3" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="btnradio1" id="monatButton" onclick="monatSwitch();">Monatsansicht</label>

                            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btnradio2" id="jahrButton" onclick="jahrSwitch();">Jahresansicht</label>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div  id="calendar_year" style="display: none; margin-bottom: 2em">
                                <div class="row">
                                    <button type="button" class="switch-month switch-left col-1" id="prevYear">
                                        <i class="fa fa-caret-left fa-2x" aria-hidden="true" style="vertical-align: middle;"></i>
                                    </button>
                                    <div class="col-10 h2" style="text-align: center" id="year">
                                    </div>
                                    <button type="button" class="switch-month switch-right col-1" id="nextYear">
                                        <i class="fa fa-caret-right fa-2x" aria-hidden="true" style="vertical-align: middle;"></i>
                                    </button>
                                </div>
                                <div class="row">

                                    <div class="calendar calendar-first col-md-4 col-lg-3 col-sm-6" id="calendar_year_1">
                                        <div class="calendar_header calendar_header_year" onclick="showMonth(0);">
                                            <h2 class="calendar_header_year_ueberschrift"></h2>
                                        </div>
                                        <div class="calendar_weekdays"></div>
                                        <div class="calendar_content"></div>
                                    </div>

                                    <div class="calendar calendar-first col-md-4 col-lg-3 col-sm-6"  id="calendar_year_2">
                                        <div class="calendar_header calendar_header_year" onclick="showMonth(1);">
                                            <h2 class="calendar_header_year_ueberschrift"></h2>
                                        </div>
                                        <div>
                                            <div class="calendar_weekdays"></div>
                                            <div class="calendar_content"></div>
                                        </div>
                                    </div>
                                    <div class="calendar calendar-first col-md-4 col-lg-3 col-sm-6"  id="calendar_year_3">
                                        <div class="calendar_header calendar_header_year" onclick="showMonth(2);">
                                            <h2 class="calendar_header_year_ueberschrift"></h2>
                                        </div>
                                        <div>
                                            <div class="calendar_weekdays"></div>
                                            <div class="calendar_content"></div>
                                        </div>
                                    </div>
                                    <div class="calendar calendar-first col-md-4 col-lg-3 col-sm-6"  id="calendar_year_4">
                                        <div class="calendar_header calendar_header_year" onclick="showMonth(3);">
                                            <h2 class="calendar_header_year_ueberschrift"></h2>
                                        </div>
                                        <div>
                                            <div class="calendar_weekdays"></div>
                                            <div class="calendar_content"></div>
                                        </div>
                                    </div>
                                    <div class="calendar calendar-first col-md-4 col-lg-3 col-sm-6" id="calendar_year_5">
                                        <div class="calendar_header calendar_header_year" onclick="showMonth(4);">
                                            <h2 class="calendar_header_year_ueberschrift"></h2>
                                        </div>
                                        <div>
                                            <div class="calendar_weekdays"></div>
                                            <div class="calendar_content"></div>
                                        </div>
                                    </div>
                                    <div class="calendar calendar-first col-md-4 col-lg-3 col-sm-6" id="calendar_year_6">
                                        <div class="calendar_header calendar_header_year" onclick="showMonth(5);">
                                            <h2 class="calendar_header_year_ueberschrift"></h2>
                                        </div>
                                        <div>
                                            <div class="calendar_weekdays"></div>
                                            <div class="calendar_content"></div>
                                        </div>
                                    </div>
                                    <div class="calendar calendar-first col-md-4 col-lg-3 col-sm-6" id="calendar_year_7">
                                        <div class="calendar_header calendar_header_year" onclick="showMonth(6);">
                                            <h2 class="calendar_header_year_ueberschrift"></h2>
                                        </div>
                                        <div>
                                            <div class="calendar_weekdays"></div>
                                            <div class="calendar_content"></div>
                                        </div>
                                    </div>
                                    <div class="calendar calendar-first col-md-4 col-lg-3 col-sm-6" id="calendar_year_8">
                                        <div class="calendar_header calendar_header_year" onclick="showMonth(7);">
                                            <h2 class="calendar_header_year_ueberschrift"></h2>
                                        </div>
                                        <div>
                                            <div class="calendar_weekdays"></div>
                                            <div class="calendar_content"></div>
                                        </div>
                                    </div>
                                    <div class="calendar calendar-first col-md-4 col-lg-3 col-sm-6" id="calendar_year_9">
                                        <div class="calendar_header calendar_header_year" onclick="showMonth(8);">
                                            <h2 class="calendar_header_year_ueberschrift"></h2>
                                        </div>
                                        <div>
                                            <div class="calendar_weekdays"></div>
                                            <div class="calendar_content"></div>
                                        </div>
                                    </div>
                                    <div class="calendar calendar-first col-md-4 col-lg-3 col-sm-6" id="calendar_year_10">
                                        <div class="calendar_header calendar_header_year" onclick="showMonth(9);">
                                            <h2 class="calendar_header_year_ueberschrift"></h2>
                                        </div>
                                        <div>
                                            <div class="calendar_weekdays"></div>
                                            <div class="calendar_content"></div>
                                        </div>
                                    </div>
                                    <div class="calendar calendar-first col-md-4 col-lg-3 col-sm-6" id="calendar_year_11">
                                        <div class="calendar_header calendar_header_year" onclick="showMonth(10);">
                                            <h2 class="calendar_header_year_ueberschrift"></h2>
                                        </div>
                                        <div>
                                            <div class="calendar_weekdays"></div>
                                            <div class="calendar_content"></div>
                                        </div>
                                    </div>
                                    <div class="calendar calendar-first col-md-4 col-lg-3 col-sm-6" id="calendar_year_12">
                                        <div class="calendar_header calendar_header_year" onclick="showMonth(11);">
                                            <h2 class="calendar_header_year_ueberschrift"></h2>
                                        </div>
                                        <div>
                                            <div class="calendar_weekdays"></div>
                                            <div class="calendar_content"></div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="calendar calendar-first" id="calendar_first" style="margin-bottom: 2em;">

                                <div class="calendar_header">
                                    <button type="button" class="switch-month switch-left">
                                        <i class="fa fa-caret-left fa-2x" aria-hidden="true" style="vertical-align: middle;"></i>
                                    </button>
                                    <h2></h2>
                                    <button type="button" class="switch-month switch-right">
                                        <i class="fa fa-caret-right fa-2x" aria-hidden="true" style="vertical-align: middle;"></i>
                                    </button>
                                </div>
                                <div class="calendar_weekdays"></div>
                                <div class="calendar_content"></div>
                            </div>

                        </div>

                    </div> <!-- End Row -->

                </div>

                <div class="row">
                    <label class="col-5" style="text-align: right; font-size: 1.25em">Versandzeit festlegen (ohne Sonntag):</label>
                    <div class="input-group mb-3 col-3">
                        <div class="input-group-prepend">
                            <button type="button" class="input-group-text btn btn-primary" id="minusButton">-</button>
                        </div>
                        <input type="number" class="form-control" value="0" id="versandZeit" min="0" disabled>
                        <div class="input-group-append">
                            <button type="button" class="input-group-text btn btn-primary" id="plusButton">+</button>
                        </div>
                    </div>
                    <div class="col-3">
                        <button type="button" onclick="setVersandNull();" class ="btn btn-secondary">Auf 0 Tage setzen</button>
                    </div>
                </div>

            </div>
        </div>

    </div>





<style>

    .calendar {
        /*float: left;*/
        margin: auto;
        margin-top: 1em;
        min-width: 320px;
        font-family: 'Lato', sans-serif;
        font-weight: 400;
    }


    .calendar, .calendar_weekdays,
    .calendar_content {
        max-width: 785px;
    }

    .calendar_weekdays div {
        color: #aaa;
        font-weight: lighter;
        display:inline-block;
        vertical-align:top;
    }
    .calendar_content, .calendar_weekdays, .calendar_header {
        position: relative;
    }
    .calendar_content:after, .calendar_weekdays:after, .calendar_header:after {
        content: ' ';
        display: table;
        clear: both;
    }
    .calendar_weekdays div, .calendar_content div {
        width: 14.28571%;
        height: 68px;
        line-height: 69px;
        overflow: hidden;
        text-align: center;
        background-color: transparent;
    }

    .calendar_content .today {
        color: #232f3e;
        background-color: #dae1ea;
    }
    .calendar_content div {
        float: left;
        margin-left: -1px;
        margin-top: -1px;
        border: 1px solid #d5d5d5;
    }

    .calendar_content div.today{
        font-weight: bold;
        font-size: 20px;
        color: #232f3e;
    }

    .calendar_header {
        width: 100%;
        text-align: center;
    }

    .calendar_header h2 {
        float:left;
        width:70%;
        margin-top: 10px;
        padding: 0 10px;
        font-family: 'Lato', sans-serif;
        font-weight: 300;
        font-size: 1.5em;
        color: #232f3e;
        line-height: 1.7;
    }

    .calendar_header_year h2{
        float:left;
        width: 100%;
        margin-top: 10px;
        padding: 0 10px;
        font-family: 'Lato', sans-serif;
        font-weight: 300;
        font-size: 1.5em;
        color: #232f3e;
        line-height: 1.7;
    }

    .switch-month {
        background-color: white;
        color: #232f3e;
        padding: 0;
        outline: none;
        border: none;
        line-height: 52px;
        height: 55px;
        float: left;
        width:15%;
        transition: color .2s;
        border-radius: 10%;
    }

    .switch-month:hover {
        color: #007bff;
        background: #d3d3d357;
    }
    .switch-month:active {
        background-color: rgba(113, 113, 125, .4);
    }

    div.tagBelegt{
        background-color: #ff000070;
        border-color: darkred;
    }

    div.pastBelegt{
        background-color: lightyellow;
    }

    .calendar_content div.past-date {
        cursor: initial;
        color: #d5d5d5;
    }

    .calendar-year{
        max-width: 1000px;
    }

    .calendar_header_year_ueberschrift:hover{
        cursor: pointer;
        color: #007bff;
    }


</style>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
    /*datumList(0);
    b();
    c(month, year, 0);*/
    $(document).ready(function() {
        datumList(0);
        b();
        c(month, year, 0);
    });

    //Aus Übergabedaten das von und bis herauslesen

    var bookdatelist = [];

    function datumList(versand) {
        var js_array = <?php echo json_encode($stack);?>;
        var startDatum = [];
        var endDatum   = [];
        var bdl = [];
        for (let j = 0; j < js_array.length; j++) {
            var tmpStart = new Date(js_array[j]['datumvon'].substring(0, 4), js_array[j]['datumvon'].substring(5, 7) - 1, js_array[j]['datumvon'].substring(8, 10));

            for (let k = 0; k < versand; k++) {
                tmpStart.setDate(tmpStart.getDate() - 1);
                if (tmpStart.getDay() === 0) {
                    k--;
                }
            }
            startDatum.push(tmpStart);
            var tmpEnde = new Date((js_array[j]['datumbis'].substring(0, 4)), js_array[j]['datumbis'].substring(5, 7) - 1, js_array[j]['datumbis'].substring(8, 10));
            for (let k = 0; k < versand; k++) {
                tmpEnde.setDate(tmpEnde.getDate() + 1);
                if (tmpEnde.getDay() === 0) {
                    k--;
                }
            }
            endDatum.push(tmpEnde);

        }
        for (let j = 0; j < startDatum.length; j++) {
            while (startDatum[j] <= endDatum[j]) {
                bdl.push(new Date(startDatum[j]));
                startDatum[j].setDate(startDatum[j].getDate() + 1);
            }
        }
        bookdatelist = bdl

        checkBooking(month, year, bookdatelist);
    }

    function makeMonthArray(passed_month, passed_year) { // creates Array specifying dates and weekdays
        var e=[];
        for(var r=1;r<getDaysInMonth(passed_year, passed_month)+1;r++) {
            e.push({day: r,
                // Later refactor -- weekday needed only for first week
                weekday: daysArray[getWeekdayNum(passed_year,passed_month,r)-1]
            });
        }
        if (e[0].weekday == undefined){
            e[0].weekday= daysArray[6];
        }
        return e;
    }
    function makeWeek(week) {
        week.empty();
        for(var e=0;e<7;e++) {
            week.append("<div>"+daysArray[e].substring(0,2)+"</div>");
        }
    }

    function getDaysInMonth(currentYear,currentMon) {
        return(new Date(currentYear,currentMon+1,0)).getDate();
    }
    function getWeekdayNum(e,t,n) {
        return(new Date(e,t,n)).getDay();
    }
    function checkToday(e) {
        var todayDate = today.getFullYear()+'/'+(today.getMonth()+1)+'/'+today.getDate();
        var checkingDate = e.getFullYear()+'/'+(e.getMonth()+1)+'/'+e.getDate();
        return todayDate==checkingDate;

    }
    function getAdjacentMonth(curr_month, curr_year, direction) {
        var theNextMonth;
        var theNextYear;
        if (direction == "next") {
            theNextMonth = (curr_month + 1) % 12;
            theNextYear = (curr_month == 11) ? curr_year + 1 : curr_year;
        } else {
            theNextMonth = (curr_month == 0) ? 11 : curr_month - 1;
            theNextYear = (curr_month == 0) ? curr_year - 1 : curr_year;
        }
        return [theNextMonth, theNextYear];
    }
    function b() {
        today = new Date;
        year = today.getFullYear();
        month = today.getMonth();
        checkBooking(month, year, bookdatelist);
        var nextDates = getAdjacentMonth(month, year, "next");
        nextMonth = nextDates[0];
        nextYear = nextDates[1];
    }

    function checkBooking(curr_month, curr_year, allBooked){
        booked = [];
        var thisMonthBooked = [];
        for (let r = 0; r < allBooked.length; r++) {
            if (allBooked[r].getMonth() == curr_month && allBooked[r].getFullYear() == curr_year) {
                thisMonthBooked.push(allBooked[r]);
            }
        }
        for(var r=1;r<getDaysInMonth(curr_year, curr_month)+1;r++) {
            booked.push(false);
        }

        for (let r = 0; r < thisMonthBooked.length; r++) {
            booked[(thisMonthBooked[r].getDate())-1] = true;
        }
    }

    var e=480;

    var booked = [];

    var today;
    var year,
        month,
        nextMonth,
        nextYear;

    var monatsAnsicht = true;

    var r = [];
    var i = ["Januar","Februar","März","April","Mai",
        "Juni","Juli","August","September","Oktober",
        "November","Dezember"];
    var daysArray = ["Montag","Dienstag",
        "Mittwoch","Donnerstag","Freitag","Samstag", "Sonntag"];
    var o = ["#16a085","#1abc9c","#c0392b","#27ae60",
        "#FF6860","#f39c12","#f1c40f","#e67e22",
        "#2ecc71","#e74c3c","#d35400","#2c3e50"];

    var cal1=$("#calendar_first");
    var calHeader1=cal1.find(".calendar_header");
    var weekline1=cal1.find(".calendar_weekdays");
    var datesBody1=cal1.find(".calendar_content");

    var cal2=$("#calendar_year_1");
    var calHeader2=cal2.find(".calendar_header");
    var weekline2=cal2.find(".calendar_weekdays");
    var datesBody2=cal2.find(".calendar_content");
    var cal3=$("#calendar_year_2");
    var calHeader3=cal3.find(".calendar_header");
    var weekline3=cal3.find(".calendar_weekdays");
    var datesBody3=cal3.find(".calendar_content");
    var cal4=$("#calendar_year_3");
    var calHeader4=cal4.find(".calendar_header");
    var weekline4=cal4.find(".calendar_weekdays");
    var datesBody4=cal4.find(".calendar_content");
    var cal5=$("#calendar_year_4");
    var calHeader5=cal5.find(".calendar_header");
    var weekline5=cal5.find(".calendar_weekdays");
    var datesBody5=cal5.find(".calendar_content");
    var cal6=$("#calendar_year_5");
    var calHeader6=cal6.find(".calendar_header");
    var weekline6=cal6.find(".calendar_weekdays");
    var datesBody6=cal6.find(".calendar_content");
    var cal7=$("#calendar_year_6");
    var calHeader7=cal7.find(".calendar_header");
    var weekline7=cal7.find(".calendar_weekdays");
    var datesBody7=cal7.find(".calendar_content");
    var cal8=$("#calendar_year_7");
    var calHeader8=cal8.find(".calendar_header");
    var weekline8=cal8.find(".calendar_weekdays");
    var datesBody8=cal8.find(".calendar_content");
    var cal9=$("#calendar_year_8");
    var calHeader9=cal9.find(".calendar_header");
    var weekline9=cal9.find(".calendar_weekdays");
    var datesBody9=cal9.find(".calendar_content");
    var cal10=$("#calendar_year_9");
    var calHeader10=cal10.find(".calendar_header");
    var weekline10=cal10.find(".calendar_weekdays");
    var datesBody10=cal10.find(".calendar_content");
    var cal11=$("#calendar_year_10");
    var calHeader11=cal11.find(".calendar_header");
    var weekline11=cal11.find(".calendar_weekdays");
    var datesBody11=cal11.find(".calendar_content");
    var cal12=$("#calendar_year_11");
    var calHeader12=cal12.find(".calendar_header");
    var weekline12=cal12.find(".calendar_weekdays");
    var datesBody12=cal12.find(".calendar_content");
    var cal13=$("#calendar_year_12");
    var calHeader13=cal13.find(".calendar_header");
    var weekline13=cal13.find(".calendar_weekdays");
    var datesBody13=cal13.find(".calendar_content");

    var bothCals = $(".calendar");

    var switchButton = bothCals.find(".calendar_header").find('.switch-month');



    var calendars = {
        "cal1": {
            "calHeader": calHeader1,
            "weekline": weekline1,
            "datesBody": datesBody1 },
        "cal2": {
            "calHeader": calHeader2,
            "weekline": weekline2,
            "datesBody": datesBody2	},
        "cal3": {
            "calHeader": calHeader3,
            "weekline": weekline3,
            "datesBody": datesBody3	},
        "cal4": {
            "calHeader": calHeader4,
            "weekline": weekline4,
            "datesBody": datesBody4	},
        "cal5": {
            "calHeader": calHeader5,
            "weekline": weekline5,
            "datesBody": datesBody5	},
        "cal6": {
            "calHeader": calHeader6,
            "weekline": weekline6,
            "datesBody": datesBody6	},
        "cal7": {
            "calHeader": calHeader7,
            "weekline": weekline7,
            "datesBody": datesBody7	},
        "cal8": {
            "calHeader": calHeader8,
            "weekline": weekline8,
            "datesBody": datesBody8	},
        "cal9": {
            "calHeader": calHeader9,
            "weekline": weekline9,
            "datesBody": datesBody9	},
        "cal10": {
            "calHeader": calHeader10,
            "weekline": weekline10,
            "datesBody": datesBody10	},
        "cal11": {
            "calHeader": calHeader11,
            "weekline": weekline11,
            "datesBody": datesBody11	},
        "cal12": {
            "calHeader": calHeader12,
            "weekline": weekline12,
            "datesBody": datesBody12	},
        "cal13": {
            "calHeader": calHeader13,
            "weekline": weekline13,
            "datesBody": datesBody13	}
    }

    switchButton.on("click",function() {
        var clicked=$(this);
        var generateCalendars = function(e) {
            var nextDatesFirst = getAdjacentMonth(month, year, e);
            month = nextDatesFirst[0];
            year = nextDatesFirst[1];
            checkBooking(month, year, bookdatelist);
            c(month, year, 0);
        };
        if(clicked.attr("class").indexOf("left")!=-1) {
            generateCalendars("previous");
        } else { generateCalendars("next"); }
    });


    document.getElementById("todayButton").onclick = function() {
        b();
        c(month, year, 0);
    };
    document.getElementById("todayButtonYear").onclick = function() {
        b();
        jahrSwitch();
    };

    function c(passed_month, passed_year, calNum) {
        var calendar;
        switch (calNum){
            case 0:
                calendar = calendars.cal1;
                break;
            case 1:
                calendar = calendars.cal2;
                break;
            case 2:
                calendar = calendars.cal3;
                break;
            case 3:
                calendar = calendars.cal4;
                break;
            case 4:
                calendar = calendars.cal5;
                break;
            case 5:
                calendar = calendars.cal6;
                break;
            case 6:
                calendar = calendars.cal7;
                break;
            case 7:
                calendar = calendars.cal8;
                break;
            case 8:
                calendar = calendars.cal9;
                break;
            case 9:
                calendar = calendars.cal10;
                break;
            case 10:
                calendar = calendars.cal11;
                break;
            case 11:
                calendar = calendars.cal12;
                break;
            case 12:
                calendar = calendars.cal13;
                break;
        }
        makeWeek(calendar.weekline);
        calendar.datesBody.empty();
        var calMonthArray = makeMonthArray(passed_month, passed_year);
        var r = 0;
        var u = false;
        while(!u) {
            if(daysArray[r] == calMonthArray[0].weekday) { u = true }
            else {
                calendar.datesBody.append('<div class="blank" style="border: none;"></div>');
                r++;
            }
        }
        for(var cell=0;cell<42-r;cell++) { // 42 date-cells in calendar
            if(cell >= calMonthArray.length) {
                calendar.datesBody.append('<div class="blank" style="border: none;"></div>');
            } else {
                var shownDate = calMonthArray[cell].day;
                // Later refactiroing -- iter_date not needed after "today" is found
                var iter_date = new Date(passed_year,passed_month,shownDate);
                if (
                    (
                        ( shownDate != today.getDate() && passed_month == today.getMonth())
                        || passed_month != today.getMonth() || passed_year != today.getFullYear()
                    )
                    && iter_date < today) {
                    if (booked[cell] == true) {
                        var m = '<div class="past-date pastBelegt">';
                    }
                    else {
                        var m = '<div class="past-date">';
                    }
                } else {
                    var m;
                    if (checkToday(iter_date)) {
                        if (booked[cell] == true){
                            m = '<div class="today" style="background-color: #ff79077d">';
                        }else{
                            m = '<div class="today">';
                        }

                    } else {
                        if (booked[cell] == true){
                            m = '<div class="tagBelegt">';
                        }
                        else{
                            m = "<div>";
                        }

                    }
                }
                calendar.datesBody.append(m + shownDate + "</div>");
            }
        }
        calendar.calHeader.find("h2").text(i[passed_month]+" "+ ((calNum == 0) ? passed_year : ""));

    }




    function monatSwitch (){
        document.getElementById("jahrButton").classList.replace('btn-primary', 'btn-outline-primary');
        document.getElementById("monatButton").classList.replace('btn-outline-primary', 'btn-primary');
        document.getElementById("calendar_first").style.display = "block"
        document.getElementById("calendar_year").style.display = "none"
        document.getElementById("todayButton").style.display = "block"
        document.getElementById("todayButtonYear").style.display = "none"
        datumList(document.getElementById("versandZeit").value);
        monatsAnsicht = true;
        c(month, year, 0);
    }

    function jahrSwitch (){
        document.getElementById("monatButton").classList.replace('btn-primary', 'btn-outline-primary');
        document.getElementById("jahrButton").classList.replace('btn-outline-primary', 'btn-primary');
        document.getElementById("calendar_first").style.display = "none"
        document.getElementById("calendar_year").style.display = "block"
        document.getElementById("todayButton").style.display = "none"
        document.getElementById("todayButtonYear").style.display = "block"
        document.getElementById("year").innerText = year;
        monatsAnsicht = false;
        for (let i = 1; i <= 12; i++) {
            checkBooking(i-1, year, bookdatelist);
            c(i-1, year, i);
        }
    }

    document.getElementById("nextYear").onclick = function (){
        year ++;
        document.getElementById("year").innerText = year;
        jahrSwitch();
    }

    document.getElementById("prevYear").onclick = function (){
        year --;
        document.getElementById("year").innerText = year;
        jahrSwitch();
    }

    function showMonth (monat){
        month = monat;
        datumList(document.getElementById("versandZeit").value);
        document.getElementById("monatButton").click();
    }


    document.getElementById("plusButton").onclick = function(){
        var elm = document.getElementById("versandZeit");
        elm.value++;
        if (monatsAnsicht){
            datumList(elm.value);
            c(month, year, 0);
        }
        else {
            datumList(elm.value);
            jahrSwitch();
        }
    }

    document.getElementById("minusButton").onclick = function(){
        var elm = document.getElementById("versandZeit");
        elm.value--;
        if (elm.value <0){
            elm.value = 0;
        }
        if (monatsAnsicht){
            datumList(elm.value);
            c(month, year, 0);
        }
        else {
            datumList(elm.value);
            jahrSwitch();
        }
    }

    function setVersandNull(){
        var elm = document.getElementById("versandZeit").value = 0;
        if (monatsAnsicht){
            datumList(elm.value);
            c(month, year, 0);
        }
        else {
            datumList(elm.value);
            jahrSwitch();
        }
    }


</script>