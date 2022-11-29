<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail For Business Request</title>
</head>

<body>

    <section class="contact py-5 bg-light" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12"></div>
                <h4 style="text-align:center">Message from Client</h4>
                <hr>
            </div>
            <div class="col-md-12">
                <br>
               <b> Email from :</b> {{ $name }} <br>
               <b> Email : </b> {{ $email }} <br>
               <b>Phone Number: </b>{{ $phone }}<br>
               <b> Distance: </b> <br>{{ $distance }} <br>
               <b> DeliveryCity: </b> <br>{{ $deliveryCity }} <br>
               <b> Weight : </b> {{ $weight }} <br>
               <b> Subject : </b> {{ $subject }} <br>
               <b> Service Title : </b>  <br>
               <b> Message: </b> <br>{{ $usermessage }} <br>
               <br>
               <hr>
                
                <p> <b> Thank You </b></p>


            </div>
        </div>
        </div>

        </div>
    </section>









</body>

</html>