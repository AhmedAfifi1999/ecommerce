<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title></title>
</head>
<body>
<h2>Categories Title</h2>

<table>
    <thead>
    <th>id</th>
    <th>name</th>
    <th></th>
    <th></th>
    <th></th>
    </thead>
    <tbody>
    @foreach($categories as $category)
    <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->name}}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
