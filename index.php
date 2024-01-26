<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];
    $filtered_hotel = $hotels;
    if(isset($_GET['parking']) && $_GET['parking'] != ''){
        $tempHotel = [];
        $parking = $_GET['parking'];

        foreach($filtered_hotel as $hotel){
            if($hotel['parking'] == $parking){
                $tempHotel[] = $hotel;
            }
        }

        $filtered_hotel = $tempHotel;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php include __DIR__.'/header.php'; ?>

<div class="container">
    <form class="row g-3  align-items-end ">
        <div class="col-5">
            <label for="parking" class="form-label">Parcheggio</label>
            <select class="form-select" id="parking" name="parking">
                <option value="">Tutti</option>
                <option value="1">Si</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="col-2">
            <button class="btn btn-primary" type="submit">Invia</button>
        </div>
    </form>
   
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">NOME HOTEL</th>
      <th scope="col">DESCRIZIONE</th>
      <th scope="col">PARCHEGGIO</th>
      <th scope="col">VOTO</th>
      <th scope="col">DISTANZA DAL CENTRO</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($filtered_hotel as $hotel ){ ?>
    <tr>
      <td><?php echo $hotel['name'] ?></td>
      <td><?php echo $hotel['description'] ?></td>
      <td><?php echo $hotel['parking'] ? 'si' : 'no' ?></td>
      <td><?php echo $hotel['vote'] ?></td>
      <td><?php echo $hotel['distance_to_center'].' km' ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php include __DIR__.'/footer.php'; ?>
</body>
</html>