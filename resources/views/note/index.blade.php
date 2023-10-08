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
        ul li div{
            text-decoration:none;
            color:#000;
            background:#ffc;
            display:flex;
            flex-direction: column;
            /*height:10em;*/
            width:20em;
            /*padding:1em;*/
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
        .topic-detail {
            text-decoration: none;
            color: #666666;
        }
        /*ul li a{*/
        /*    transform: rotate(-6deg);*/
        /*}*/
        ul li:nth-child(even) a{
            transform:rotate(4deg);
            position:relative;
            top:5px;
        }
        ul li:nth-child(3n) a{
            transform:rotate(-3deg);
            position:relative;
            top:-5px;
        }
        ul li:nth-child(5n) a{
            transform:rotate(5deg);
            position:relative;
            top:-10px;
        }
        p {
            line-break: anywhere;
            padding: 0.5em;
        }
        h4 {
            padding: 0.5em;
        }
        .button-npte {
            padding: 0.5em;
            /*padding-bottom: 10px;*/
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
<button id="submit-form-note" data-bs-toggle="modal" data-bs-target="#modalCreateNote">
                    <span style="color: #757526;">
                        Add Note
                    </span>
</button>
    <ul>
        @foreach($notes as $key => $note)
        <li>
            <div >
                <div>
                    <a href="{{ route('get-word', [$note->id]) }}" class="topic-detail"><h4>{{ ucfirst($note?->topic) }} #{{$key+1}}</h4></a>
                </div>
                <p>Mean: {{ ucfirst($note?->mean) }}</p>
                <div class="button-npte">
                    <button id="submit-form" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id-note="{{ $note->id  }}">
                        <span style="color: #757526;">
                            Add new word
                        </span>
                    </button>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
<!-- modal create note -->
<div class="modal" id="modalCreateNote" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-secondary">
                <h5 class="modal-title" id="exampleModalLabel">Add note</h5>
                <button style="" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('note.store') }}" method="post">
                    @csrf
                    <input value="1" hidden>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-secondary">Topic</label>
                        <input type="text" name="toppic" class="form-control" id="topic" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-secondary">Mean</label>
                        <input type="text" name="mean" class="form-control" id="mean" aria-describedby="emailHelp">
                    </div>
                    <select id="status-note" name="status" class="form-select" aria-label="0">
                        <option value="0">New word</option>
                        <option value="1">Grammar</option>
                    </select>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="create-note" type="button" class="btn btn-primary text-secondary"><a href="">save</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-secondary">
                    <h5 class="modal-title" id="exampleModalLabel">Add new word</h5>
                    <button style="" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <form action="{{ route('note.store') }}" method="post">
                       @csrf
                       <input value="1" hidden>
                       <select id="status-word" name="status" class="form-select" aria-label="0">
                           <option selected>Select menu</option>
                           <option value="0">New word</option>
                           <option value="1">Grammar</option>
                       </select>
                       <div class="mb-3 new-word" id="new-word">
                           <label for="exampleInputEmail1" class="form-label text-secondary">Word</label>
                           <input type="text" name="word" class="form-control" id="word-note" aria-describedby="emailHelp">
                       </div>
                       <div class="mb-3 new-word" id="new-word1">
                           <label for="exampleInputEmail1" class="form-label text-secondary">Word type</label>
                           <input type="text" name="word_type" class="form-control" id="word-type" aria-describedby="emailHelp">
                       </div>
                       <div class="mb-3 new-word" id="new-word2">
                           <label for="exampleInputEmail1" class="form-label text-secondary">Mean</label>
                           <input type="text" name="mean" class="form-control" id="mean-note" aria-describedby="emailHelp">
                       </div>
                       <div class="mb-3" id="grammar">
                           <label for="exampleInputEmail1" class="form-label text-secondary">Recipe</label>
                           <textarea rows="5" name="recipe" class="form-control" id="recipe"></textarea>
                       </div>
                       <div class="mb-3" id="grammar1">
                           <label for="exampleInputEmail1" class="form-label text-secondary">Using</label>
                           <textarea rows="5" name="using" class="form-control" id="using"></textarea>
                       </div>
                       <div class="mb-3" id="grammar2">
                           <label for="exampleInputEmail1" class="form-label text-secondary">Identification signs</label>
                           <input type="text" name="identification_sign" class="form-control" id="identification" aria-describedby="emailHelp">
                       </div>
                       <div class="mb-3" id="grammar3">
                           <label for="exampleInputEmail1" class="form-label text-secondary">Example</label>
                           <textarea rows="5" name="example" class="form-control" id="example-note"></textarea>
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
<script>
    $(document).ready(function() {
        $('#submit-form').click(function() {
            const noteId = $(this).data('id-note');
            console.log(noteId);
            $('select').change(function ()
            {
                const checkStatus = $(this).val();
                console.log(checkStatus)
                if(checkStatus == 1) {
                    document.getElementById('new-word').remove()
                    document.getElementById('new-word1').remove()
                    document.getElementById('new-word2').remove()
                    document.getElementById('status-word').remove()
                } else {
                    document.getElementById('grammar').remove()
                    document.getElementById('grammar1').remove()
                    document.getElementById('grammar2').remove()
                    document.getElementById('grammar3').remove()
                    document.getElementById('status-word').remove()
                }
            });
            $('#create-word').click(function(){

                const status = document.getElementById('status-word').value;

                let example = '';
                example = document.getElementById('example-note').value ?? null;
                console.log(example);
                if(checkStatus == 1) {
                    const recipe = document.getElementById('recipe').value
                    const using = document.getElementById('using').value
                    const identification = document.getElementById('identification').value
                } else {
                    const word = document.getElementById('word-note').value;
                    const wordType = document.getElementById('word-type').value;
                    const mean = document.getElementById('mean-note').value;
                }
                console.log(word,wordType, mean, example);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '{{ route('word.store') }}',
                    data: {
                        'word': word,
                        'word_type': wordType,
                        'mean': mean,
                        'example': example,
                        'note_id': noteId,
                        'recipe': recipe,
                        'using': using,
                        'identification_sign': identification,
                        'status': status,
                    },
                    success:function(data){
                        console.log(data)
                        // document.getElementById('modalCreateNote').hidden
                        // location.reload()
                    }
                });
            })
        });

        $('#create-note').click(function(){
            const topic = document.getElementById('topic').value;
            const mean = document.getElementById('mean').value;
            const status = document.getElementById('status-note').value;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                url: '{{ route('note.store') }}',
                data: {
                    'topic': topic,
                    'mean': mean,
                    'status': status,
                },
                success:function(data){
                        document.getElementById('modalCreateNote').hidden
                        location.reload()
                }
            });
        })
    });
</script>
