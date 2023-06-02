<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
td,th {
    padding: 5px;
}
    </style>
</head>
<body>
  <h4><a href="add">Add new</a></h4>
    <table border="1" style="padding:3px">
        <tr>
          <th>name</th>
          <th>email</th>
          <th>phone</th>
          <th>salary</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
        @foreach($members as $member)
        <tr>
          <td>{{$member['name']}}</td>
          <td>{{$member['email']}}</td>
          <td>{{$member['phone']}}</td>
          <td>{{$member['salary']}}</td>
          <td>
            <img src="uploads/members/{{$member['image']}}" style="width:50px; height:50px;"/> </td>
          <td>
            <a href="delete/{{$member['id']}}">Delete</a><br><br>
            <a href="update/{{$member['id']}}">Update</a>
          </td>
        </tr>
        @endforeach
        
      </table>
</body>
</html>