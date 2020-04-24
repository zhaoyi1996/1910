<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('/index/Doadd')}}" method="post">
    @csrf
        <tr>
            <td>姓名:</td>
            <td><input type="text" name="name" value="{{$name}}"></td>
        </tr>
        <tr>
            <td>密码:</td>
            <td><input type="password" name="pwd"></td>
        </tr>
        <tr>
            <td><input type="submit"  id=""></td>
        </tr>
    </form>
</body>
</html>