<?php
// file_get_contents(response.json) gets the content returned by the URL into a STRING
$fileResponse = file_get_contents('./response.json');

// json_decode() takes input as a string and converts to PHP variables
$responseDecode = json_decode($fileResponse);

//Php DB connection
$conn = mysqli_connect("localhost","root","","newspage");

$author="";
$title = "";
$description = "";
$url = "";
$img = "";
$date = "";
$content = "";

$query = "SELECT * FROM newsdata";
$result = mysqli_query($conn, $query);

//function returns the number of rows.
$check = mysqli_num_rows($result);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project - NewsAPI</title>

    <!-- Bootstrap Lux CSS -->
    <link rel="stylesheet" href="./bootstrap.css">
</head>
<body>
    <div class="container">
        <h4> <marquee behavior="" direction="right"> Breaking News</marquee> </h4>
        <h3 class="mt-4">News Articles</h3>
        <div class="mt-4 row">
            <?php 
                if($check > 0){
                    foreach($result as $obj){
            ?>
            <div class="col-lg-4 col-md-3 col-sm-12">
                <div class="card bg-secondary mb-3" style="height: 40rem;">
                <img class="mt-3 card-img-top" src="<?php echo $obj["urlToImage"] ?>" alt="News-Image">
                <div class="card-header"><?php echo $obj["title"] ?></div>
                    <div class="card-body">
                        <h4 class="card-title">Author: <?php echo $obj["author"] ?></h4>
                        <p class="card-text"><?php echo $obj["descri"] ?></p>                        
                        <p><a class="badge rounded-pill bg-info" href="<?php echo $obj["link"] ?>" target="_blank">Read more</a></p>                        
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><?php echo $obj["publishedAt"] ?></small>
                    </div>
                </div>
            </div>
            <?php }} ?>
        </div>                    
    </div>
</body>
</html> 