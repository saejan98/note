<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="_token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Styles -->
    <style lang="scss">
        body {
            font-family: 'Lato';
            background:#666;
            color:#fff;
        }
        *{
            margin:0;
            padding:0;
        }
        ul,li{
            list-style:none;
        }
        ul{
            display: flex;
            flex-wrap: wrap;
            /*justify-content: center;*/
        }
        ul li a{
            text-decoration:none;
            color:#000;
            background:#ffc;
            display:flex;
            flex-direction: column;
            height:15em;
            /*width:20em;*/
            padding:1em;
            line-break: anywhere;
        }
        ul li{
            margin:1em;
        }
        button {
            /*margin-top: 20px;*/
            width: 150px;
            background: #dfe3c2;
        }
        button span {
            color: #757526;
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
@include('layout.header')
<ul>
    @foreach($words as $key => $word)
        @if($word->status === 0)
        <li>
            <a href="#">
                <h2>#{{$key+1}} {{ ucfirst($word?->word) }} ({{ ucfirst($word?->word_type)}})</h2>
                <p>Spelling: {{ ucfirst($word?->spelling) }}</p>
                <p>Mean: {{ ucfirst($word?->mean) }}</p>
                <p>Example: {{ ucfirst($word?->example) }}</p>
            </a>
        </li>
        @else
            <li>
                <a href="#">
                    <h2>#{{$key+1}}</h2>
                    <p>Recipe: {{ ucfirst($word?->recipe) }}</p>
                    <p>Using: {{ ucfirst($word?->using) }}</p>
                    <p>Identification signs: {{ ucfirst($word?->identification_sign) }}</p>
                </a>
            </li>
        @endif
    @endforeach
</ul>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-secondary">
                <h5 class="modal-title" id="exampleModalLabel">Add new word</h5>
                <button style="" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('word.store') }}" method="post">
                    @csrf
                    <input value="1" hidden>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-secondary">Word</label>
                        <input type="text" name="word" class="form-control" id="word-word" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-secondary">Word type</label>
                        <input type="text" name="word_type" class="form-control" id="word-type" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-secondary">Mean</label>
                        <input type="text" name="mean" class="form-control" id="mean-word" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-secondary">Example</label>
                        <textarea rows="5" name="example" class="form-control" id="example-word"></textarea>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="create-word" type="button" class="btn btn-primary"><a href="">save</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
