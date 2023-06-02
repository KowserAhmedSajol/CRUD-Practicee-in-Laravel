<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
</head>
<body>
    <form action="/update" method="post" enctype="multipart/form-data"> 
        @csrf
        <input type="hidden" id="id" name="id" value="{{$member['id']}}"><br>
        <input type="text" id="name" name="name" value="{{$member['name']}}"><br>
        <input type="text" id="email" name="email" value="{{$member['email']}}"><br>
        @if(isset($error['email']))
            {{$error['email']}}<br>
        @endif
        <input type="text" id="phone" name="phone" value="{{$member['phone']}}"><br>
        @if(isset($error['phone']))
            {{$error['phone']}}<br>
        @endif
        <input type="text" id="salary" name="salary" value="{{$member['salary']}}"><br>
        @if(isset($error['salary']))
            {{$error['salary']}}<br>
        @endif
        <input type="file" id="image" name="image" value="image"><br><br>
        <input type="hidden" id="previmage" name="previmage" value="{{$member['image']}}"><br><br>
        <input type="submit" value="Submit">
        @if(isset($error['empty']))
            {{$error['empty']}}<br>
        @endif
      </form>
</body>
</html>