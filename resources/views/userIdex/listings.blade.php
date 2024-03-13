<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <div>
            @foreach($dataList as $item)
            <h1>{{ $item->title }}</h1>
            <!-- Display other item details as needed -->
        @endforeach
       
        </div>
  
    </div>
    
</body>
</html>