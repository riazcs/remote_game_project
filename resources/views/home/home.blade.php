<!DOCTYPE html>
<html lang="en">

<head>
    <title>Remote Game</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .row.content {
            height: 450px
        }

        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        .rounded {
            border-radius: 0.75rem !important;
        }

        @media screen and (max-width: 767px) {

            .row.content {
                height: auto;
            }
        }
    </style>
</head>

<body style="background:#008c90">
    <div class="container-fluid text-center">
        <div class="row content" style="margin-top: 10px;">
            @foreach($contents as $content)
            <a class="catalog-item game-item mt-1" href="{{ route('signle_game.show',$content->slug)}}">
                <img src="{{$content->image}}" class="rounded" alt="Two Punk Racing" style="width:110px; height:110px">
                <!-- <span>{{$content->title}}</span> -->
            </a>
            @endforeach
        </div>
        {{ $contents->links('home.pagination') }}
    </div>

    <!-- <footer class="container-fluid text-center">
        <p>Footer Text</p>
    </footer> -->

</body>

</html>