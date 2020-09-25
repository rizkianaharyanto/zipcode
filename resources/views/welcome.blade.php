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
    <!-- <div class="flex-center">
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
    </div> -->
    <div class="flex-center">
        @if(!empty($province))
        <h1 style="color:blue">
            {{$nama}}
            {{ $province }}
        </h1>
        @endif
        
        @if(!empty($kab))
        <h1 style="color:blue">
            {{$nama}}
            {{ $kab }}
        </h1>
        @endif
        
        @if(!empty($kec))
        <h1 style="color:blue">
            {{$nama}}
            {{ $kec }}
        </h1>
        @endif
        
        @if(!empty($des))
        <h1 style="color:blue">
            {{$nama}}
            {{ $des }}
        </h1>
        @endif
    </div>
    <div class="flex-center">
        <h1>Province</h1>
        <form style="margin:20px" action="/province" method="get">
            @csrf
            nama file output : <input type="text" name="output">
            start : <input type="text" name="start">
            jumlah : <input type="text" name="jumlah">
            <button type="submit">run</button>
        </form>
    </div>
    
    <div class="flex-center">
        <h1>Kabupaten</h1>
        <form style="margin:20px" action="/kab" method="get">
            @csrf
            nama file input : <input type="text" name="output">
            nama file output : <input type="text" name="outputfix">
            <button type="submit">run</button>
        </form>
    </div>
    
    <div class="flex-center">
        <h1>Kecamatan</h1>
        <form style="margin:20px" action="/kec" method="get">
            @csrf
            nama file input : <input type="text" name="output">
            nama file output : <input type="text" name="outputfix">
            <button type="submit">run</button>
        </form>
    </div>
    
    <div class="flex-center">
        <h1>Desa</h1>
        <form style="margin:20px" action="/des" method="get">
            @csrf
            nama file input : <input type="text" name="output">
            nama file output : <input type="text" name="outputfix">
            <button type="submit">run</button>
        </form>
    </div>

</body>

</html>