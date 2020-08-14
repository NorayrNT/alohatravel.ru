<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Alooha Travel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        </style>
    </head>
    <body>
        @if($desc)
            <div>
                @if($email)
                    <p>The message is sent from {{ $email }} </p>
                @endif
                <p>{{ $desc }}</p>
            </div>
        @endif
    </body>
</html>