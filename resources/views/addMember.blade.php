<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Member</title>
</head>
<body>
    <form action="addData" method="post" enctype="multipart/form-data"> 
        @csrf
        <input type="text" id="name" name="name" value="John"><br>
        <input type="text" id="email" name="email" value="Doe"><br>
        @if(isset($error['email']))
            {{$error['email']}}<br>
        @endif
        <input type="text" id="phone" name="phone" value="01XXXXXXXXXX"><br>
        @if(isset($error['phone']))
            {{$error['phone']}}<br>
        @endif
        <input type="text" id="salary" name="salary" value="0000000"><br>
        @if(isset($error['salary']))
            {{$error['salary']}}<br>
        @endif
        <input type="file" id="image" name="image" value="image"><br><br>
        <input type="submit" value="Submit">
        @if(isset($error['empty']))
            {{$error['empty']}}<br>
        @endif
      </form>
</body>
</html>