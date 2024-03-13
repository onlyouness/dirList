<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link  rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('notifJs/notify.js')}}"></script>
    <link  rel="stylesheet" href="{{asset('css/header.scss')}}">
</head>
<body>
    <div class="flex flex-col w-1/2 gap-4 mx-auto my-5">
        {{-- <p>Hello <span class="font-bold">{{Auth::user()->name}}</span></p> --}}
        <button class="font-bold w-20"><a href="/logout">Log Out</a></button>
    </div>
    @yield('sectionUser')








    
    <script>
        // Retrieve the notification data from URL parameters
var urlParams = new URLSearchParams(window.location.search);
// console.log(urlParams.get("message"))
var message = urlParams.get('message');
var type = urlParams.get('type');

// Display the notification based on retrieved data
if (message && type) {
    var notification = [
       message,
        type
    ]
    ;
    showNotification(notification);
     // Remove the notification data from the URL parameters after displaying the notification
     history.replaceState({}, document.title, window.location.pathname);
}

    </script>
  
</body>
</html>