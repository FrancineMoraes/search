<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen"/>
    <title>Search Employee</title>
</head>
<body>
    <div class="container">
        <h3 class="center mt-10">Lista de funcionários</h3>
        <?php
            $datas = json_decode($_GET['data']);
            for($i = 0; $i < count($datas); $i++){
                $head = $datas[$i]->name." - ".$datas[$i]->area;
                $birthday = "  ".date("d/m/Y", strtotime($datas[$i]->bith_date));
            ?>
            <a href="show.php?data=<?php print_r($datas[$i]->id);?>">
                <div class="container-user mt-20">
                    <div class="col-4"><img src="user.png" alt="Foto do usuário"></div>
                    <div class="text col-8">
                        <p><?php echo($head); echo($birthday);?></p>
                    </div>
                </div>
            </a>
        <?php }?>
    </div>
</body>
</html>