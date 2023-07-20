<?php
    function gadoGadoCurl($suffix) {
        $curl = curl_init();
        try {
            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://localhost:5000/". $suffix,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ));
        } catch(Exception $e) {
            echo $e;    
        }
        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response, true);
    }

    $students = gadoGadoCurl("student");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <!-- The Idea -> solving problems
        developer are often need a place where they able to do algorithms but sometimes its boring.
        lets make it not boring and competitiveable
        
    The Idea -> dictionary
        Garden : Home for each user
        Watering : Each user can waters other user garden
        Garden Plant : Each garden have their own plant
        Plants : Each user can buy plants
        Shop : Place where users buy plants
        Events : There is event every month like growtopia
        Gacha : There is gacha every event
     -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 shadow-sm">
                <div class="container p-4">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Fizz Buzz
                            </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <!-- create two option button to show table values and code editor -->
                                <!-- use laravel livewire to make it live -->
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="#">Code</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Result</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">API</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link disabled">Disabled</a>
                                    </li>
                                </ul>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Full Name</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Gender</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach($students as $student) { ?>
                                            <tr>
                                                <th scope="row"><?= $i++ ?></th>
                                                <td><?= $student['fullName'] ?></td>
                                                <td><?= $student['phoneNumber'] ?></td>
                                                <td><?= $student['gender'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col shadow-sm p-4">
                <div class="container">
                    <p>Users Information :</p>
                    <p>username: aclaputra</p>
                    <p>class: dreamer</p>
                    <p>level: 67</p>
                    <p>description : I share things about python related.</p>

                </div>
                <!-- use javascript modal -->
                <div class="btn-group container" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-primary">Manage</button>
                    <!-- <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-primary">Remove</button> -->
                </div>

                <!-- search through our problem -->
                <div class="container py-4">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                    </form>
                </div>

                <div class="btn-group container" role="group" aria-label="Basic example">
                    <!-- html5 canvas garden watering game, plants earned by shop and events -->
                    <button type="button" class="btn btn-primary">Garden</button>
                    <button type="button" class="btn btn-primary">Shop</button>
                    <button type="button" class="btn btn-primary">Explore</button>
                    <!-- <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-primary">Remove</button> -->
                </div>
            </div>
            <div class="col shadow-sm p-4">
                <div class="container text-center">
                    <p>ads & event container</p>
                    <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1234567890123456" crossorigin="anonymous"></script> -->
                    <!-- Homepage Leaderboard -->
                    <!-- <ins class="adsbygoogle"
                    style="display:inline-block;width:728px;height:90px"
                    data-ad-client="ca-pub-1234567890123456"
                    data-ad-slot="1234567890"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script> -->
                    <!-- example of google ads -->
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        another ads
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>