<?php

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://api.covid19api.com/summary');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
curl_close($curl);
$result = json_decode($result, true);
$global = $result['Global'];
$temp_All = $global;
$temp_persent = $temp_All["TotalRecovered"]/$temp_All["TotalConfirmed"]*100;
$persent_temp = $temp_All["TotalDeaths"]/$temp_All["TotalConfirmed"]*100;
$countries = $result["Countries"];
foreach($countries as $key => $value);
$auto_increment = 1;
$temp_data = count($countries);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
            integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw=="
            crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Dashbord</title>
    <style>
        .scroll{
            height: 500px;
            width: 280px;
            overflow: scroll;
        }
        body{
            background-color: #A9A9A9;
        }
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
  <a class="navbar-brand text-light" href="#">ZenWeb.COM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Affected Countries
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <div class="scroll">
                    <?php foreach($countries as $key => $value): ?>
                        <?php echo $auto_increment++."."; ?>
                        <?php echo $value["Country"]."<br>" ?>
                    <?php endforeach ?>
                </div>
            </div>
        </li>
    </ul>
  </div>
</nav>

<!-- Firts Content -->
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card-group mt-2">
                <div class="card bg-secondary border-light">
                    <div class="card-body">
                    <p style="font-size: 25px;" class="card-title display-4 text-light">Total Confirmade</p>
                        <p class="card-text display-4 text-light" style="font-size: 15px;"><?php echo number_format($temp_All["TotalConfirmed"]); ?> Infected</p>
                    <p class="card-text display-4 text-light" style="font-size: 15px;"><small>Last updated : <?php echo $value["Date"]; ?></small></p>
                    </div>
                </div>
                <div class="card bg-danger border-light">
                    <div class="card-body">
                    <p style="font-size: 25px;" class="card-title display-4 text-light">Total Deaths</p>
                    <p class="card-text display-4 text-light" style="font-size: 15px;"><?php echo number_format($temp_All["TotalDeaths"]); ?> Dieds</p>
                    <p class="card-text display-4 text-light" style="font-size: 15px;"><small>Last updated : <?php echo $value["Date"]; ?></small></p>
                    </div>
                </div> 
                <div class="card">
                    <div class="card-body bg-success border-light">
                    <p style="font-size: 25px;" class="card-title display-4 text-light">Total Recovered</p>
                    <p class="card-text display-4 text-light" style="font-size: 15px;"><?php echo number_format($temp_All["TotalRecovered"]); ?> Get Well</p>
                    <p class="card-text display-4 text-light" style="font-size: 15px;"><small>Last updated : <?php echo $value["Date"] ?></small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Second Content -->

<div class="container-fluid mt-2 bg-secondary">
    <div class="row">
        <div class="col-12">
            <center><h4 class="mt-4 mb-4 text-light">Covid-19 Virus Development Monitoring Dashboard</h4></center>
        </div>
    </div>
</div>

<!-- Core Content -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-3 mt-3">
            <div class="card text-center bg-transparent">
                <div class="card-header">
                    <h4 class="display-4 text-light" style="font-size: 20px;"><b>Affected Countries</b></h4> 
                </div>
                <div class="card-body">
                    <h4 class="text-light"><?php echo $temp_data;?> Country</h4>
                </div>
                <div class="card-footer">
                    <small class="text-light">Last Update : </small>
                    <small class="text-light"><?php echo $value["Date"]; ?></small>
                </div>
            </div>
            <div class="container mt-4 mb-3">
                <div class="row">
                    <div class="col">
                        <a class="carousel-control-prev" href="#slide" role="button" data-slide="prev">
                            <span aria-hidden="true" style="color: black;">Back Slide</span>
                        </a>
                        <a class="carousel-control-next" href="#slide" role="button" data-slide="next">
                            <span aria-hidden="true" style="color: black;">Next Slide</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-9 col-12 mt-3">
            <div id="slide" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <h5>Recovered</h5>
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="carousel-item">
                        <h5>Deaths</h5>
                        <canvas id="mySecondChart"></canvas>
                    </div>
                    <div class="carousel-item">
                        <h5>Confirmed</h5>
                        <canvas id="myThridChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var ctx = document.getElementById('myChart').getContext('2d')
    var cty = document.getElementById('mySecondChart').getContext('2d');
    var ctz = document.getElementById('myThridChart').getContext('2d');

    var covid = $.ajax({
        url: "https://api.covid19api.com/summary",
        cache : false
    })
    .done(function (canvas) {
        function getContries(canvas) {
            var show_country=[];

            canvas.Countries.forEach(function(el) {
                show_country.push(el.Country);
            })
            return show_country;
        }
        function getHealth(canvas) {
            var recovered=[];

            canvas.Countries.forEach(function(el) {
                recovered.push(el.TotalRecovered)
            })
            return recovered;
        } 
        function getDeath(canvas) {
            var death=[];

            canvas.Countries.forEach(function(el) {
                death.push(el.TotalDeaths)
            })
            return death;
        }
        function getConirm(canvas) {
            var confirm=[];

            canvas.Countries.forEach(function(el) {
                confirm.push(el.TotalConfirmed)
            })
            return confirm;
        }
        var colors=[];
        function color_random(canvas){
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r +","+ g +","+ b +")";
        }
        for(var i in canvas.Countries) {
            colors.push(color_random(canvas));
        }
        var myChart = new Chart(ctx,{
            type: 'bar',
            data: {
                labels: getContries(canvas),
                datasets : [{
                    label: 'Recovered',
                    data: getHealth(canvas),
                    borderWidth: 1,
                    backgroundColor: colors,
                }],
            },
            options: {
                legend: {
                    display: false
                }
            }
        })
        var mySecondChart = new Chart(cty,{
            type: 'bar',
            data: {
                labels: getContries(canvas),
                datasets : [{
                    label: 'Death',
                    data: getDeath(canvas),
                    borderWidth: 1,
                    backgroundColor: colors,
                }],
            },
            options: {
                legend: {
                    display: false
                }
            }
        })
        var myThridChart = new Chart(ctz,{
            type: 'bar',
            data: {
                labels: getContries(canvas),
                datasets : [{
                    label: 'Confirmed',
                    data: getConirm(canvas),
                    borderWidth: 1,
                    backgroundColor: colors,
                }],
            },
            options: {
                legend: {
                    display: false
                }
            }
        })
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>