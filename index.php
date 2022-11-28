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

if (isset($_GET['parking']) && !empty($_GET['parking'])) {
    // var_dump($_GET);
    $filterHotels = [];
    foreach ($hotels as $item) {
        if ($item['parking'] && $_GET['parking'] == 'parking') {
            $filterHotels[] = $item;
        } else if (!$item['parking'] && $_GET['parking'] == 'noParking') {
            $filterHotels[] = $item;
        } else if ($_GET['parking'] == 'select') {
            $filterHotels[] = $item;
        }
        $hotels = $filterHotels;
    }

}
// if fatto in un altro modo
if (isset($_GET['vote']) && !empty($_GET['vote'])) {
    $hotels = array_filter($hotels, fn($value) => $value['vote'] >= $_GET['vote']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
    <title>PHP HOTEL</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center py-5">HOTELS</h1>

        <form action="index.php" method="GET" name="formHotel" class="row g-3 d-flex justify-content-center py-3">
            <div class="col-auto">
                <select name="parking" id="parking" class="form-select">
                    <option value="select">Select</option>
                    <option value="parking">Parking</option>
                    <option value="noParking">No parking</option>
                </select>
            </div>
            <div class="col-auto">
                <select name="vote" class="form-select">
                    <option value="" selected>Value</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <table class="table table-info table-hover">
            <thead>
                <tr class="text-center text-uppercase">
                    <th scope="col">name</th>
                    <th scope="col">description</th>
                    <th scope="col">parking</th>
                    <th scope="col">vote</th>
                    <th scope="col">distance from center</th>
                </tr>
            </thead>

            <?php foreach ($hotels as $item) {
                $parcheggio = $item['parking'] ? 'Yes' : 'No';
            ?>

            <tbody class="text-center table-group-divider">
                <tr>
                    <td>
                        <?php echo $item['name'] ?>
                    </td>
                    <td>
                        <?php echo $item['description'] ?>
                    </td>
                    <td class=" text-uppercase ">
                        <?php echo $parcheggio ?>
                    </td>
                    <td>
                        <?php echo $item['vote'] ?>
                    </td>
                    <td>
                        <?php echo $item['distance_to_center'] ?> Km
                    </td>
                </tr>
            </tbody>

            <?php }
            ?>
        </table>
    </div>

</body>

</html>