<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            margin: 20px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center">
        @if(!empty($success))
        <h1 style="color:blue">
            {{$nama}}
            {{ $success }}
        </h1>
        @endif
        
        @if(!empty($successdis))
        <h1 style="color:blue">
            {{$nama}}
            {{ $successdis }}
        </h1>
        @endif
    </div>
    <div class="flex-center">
        <h1>Zipcode</h1>
        <form style="margin:20px" action="/baru" method="get">
            @csrf
            nama file output : <input type="text" name="output">
            start : <input type="text" name="start">
            jumlah : <input type="text" name="jumlah">
            <button type="submit">run</button>
        </form>
    </div>
    
    <div class="flex-center">
        <h1>District</h1>
        <form style="margin:20px" action="/dis" method="get">
            @csrf
            nama file input : <input type="text" name="output">
            nama file output : <input type="text" name="outputfix">
            <button type="submit">run</button>
        </form>
    </div>


    <!-- </div>
    <div class="flex-center">
        @if(!empty($success))
        {{ $success }}
        @else
        <a href="/zipcode" style="margin:20px;">zipcode</a>
        @endif
        @if(!empty($success1))
        {{ $success1 }}
        @else
        <a href="/zipcode1" style="margin:20px;">zipcode1</a>
        @endif
        @if(!empty($success2))
        {{ $success2 }}
        @else
        <a href="/zipcode2" style="margin:20px;">zipcode2</a>
        @endif
        @if(!empty($success3))
        {{ $success3 }}
        @else
        <a href="/zipcode3" style="margin:20px;">zipcode3</a>
        @endif
        @if(!empty($success4))
        {{ $success4 }}
        @else
        <a href="/zipcode4" style="margin:20px;">zipcode4</a>
        @endif
        @if(!empty($success5))
        {{ $success5 }}
        @else
        <a href="/zipcode5" style="margin:20px;">zipcode5</a>
        @endif
        @if(!empty($success6))
        {{ $success6 }}
        @else
        <a href="/zipcode6" style="margin:20px;">zipcode6</a>
        @endif
        @if(!empty($success7))
        {{ $success7 }}
        @else
        <a href="/zipcode7" style="margin:20px;">zipcode7</a>
        @endif
        @if(!empty($success8))
        {{ $success8 }}
        @else
        <a href="/zipcode8" style="margin:20px;">zipcode8</a>
        @endif
    </div>
    <div class="flex-center">
        @if(!empty($successdis))
        {{ $successdis }}
        @else
        <a href="/district" style="margin:20px;">district</a>
        @endif
        @if(!empty($successdis1))
        {{ $successdis1 }}
        @else
        <a href="/district1" style="margin:20px;">district1</a>
        @endif
        @if(!empty($successdis2))
        {{ $successdis2 }}
        @else
        <a href="/district2" style="margin:20px;">district2</a>
        @endif
        @if(!empty($successdis3))
        {{ $successdis3 }}
        @else
        <a href="/district3" style="margin:20px;">district3</a>
        @endif
        @if(!empty($successdis4))
        {{ $successdis4 }}
        @else
        <a href="/district4" style="margin:20px;">district4</a>
        @endif
        @if(!empty($successdis5))
        {{ $successdis5 }}
        @else
        <a href="/district5" style="margin:20px;">district5</a>
        @endif
        @if(!empty($successdis6))
        {{ $successdis6 }}
        @else
        <a href="/district6" style="margin:20px;">district6</a>
        @endif
        @if(!empty($successdis7))
        {{ $successdis7 }}
        @else
        <a href="/district7" style="margin:20px;">district7</a>
        @endif
        @if(!empty($successdis8))
        {{ $successdis8 }}
        @else
        <a href="/district8" style="margin:20px;">district8</a>
        @endif
    </div> -->
</body>

</html>