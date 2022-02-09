<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="stylesheet" href="/css/products.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid p-0 overflow-hidden">
        <div class="row">
        <div class="col-12">
            <nav class="navbar bg-dark">
                    
            </nav>
        </div>
        </div>
        <h1>Notifications</h1>
        @if($notifications)
            @if($notifications->count() > 0)
                @foreach ($notifications as $notification)
                    <div class="alert alert-info" role="alert">[ {{$notification->created_at}} ] product {{$notification->data['name']}} is sold out!  
                        <a href="{{ route('markNotification', $notification->id) }}" class="float-right mark-as-read" id={{$notification->id}}>Mark as read</a>
                    </div>
                @endforeach
                <a href="{{ route('markNotification', $notification = "mark-all") }}"  class="mark-all">Mark all as read</a>
            @else
            <p>There are no new notifications</p>
            @endif
        @endif
        </div>
    </body>
</html>


