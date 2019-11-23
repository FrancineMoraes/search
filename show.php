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
        <h3>Search</h3>
        <h3>Ver funcionário</h3>
        <img class="ml-45 mt-20" src="user.png" alt="Foto do usuário">
        <br>
        <h3 id="name" class="center mt-20"></h3>

        <div class="list" style="margin-top: 40px !important;">
        </div>
    </div>

    <div class="footer">
        <div class="left">
            <p id="phone"></p>
            <p id="email"></p>
        </div>
        <div class="right">
            <p id="text"></p>
            <p id="locale"></p>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "https://employees-crud.herokuapp.com/api/employee/show/"+"<?php print_r($_GET['data']);?>",
                contentType: 'application/json',
                method: 'get',
                success: function (result) {
                    $('#name').append(result.name);
                    $('#phone').append(result.phone);
                    $('#email').append(result.email);
                    $('#locale').append(""+result.address.city+"/"+result.address.state);

                    for(let i = 0; i < result.experiences.length; i++) {
                        $('.list').append(`<li>${result.experiences[i].description} - Começou em ${result.experiences[i].started} - até ${result.experiences[i].finished === null ? 'hoje' : result.experiences[i].finished}</li>`)
                    }
                }
            });
        });
    </script>
    <style>
        @media (min-width: 1200px) {
            img {
                width: 10% !important;
                height:  !important;
                float: left;
                margin-right: 10px;
            }

            p {
                margin-top: 10px;
            }
        }
        @media (max-width: 767px) {
            img {
                width: 35%;
                height: 100px;
                float: left;
                margin-right: 10px;
                margin-left: 35% !important;
            }
        }

    </style>
</body>
</html>