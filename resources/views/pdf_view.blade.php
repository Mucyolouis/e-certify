<!DOCTYPE html>
<html>
<head>
    <title>{{ $data->name }}</title>
</head>
<body>
    <h1>{{ $data->address }}</h1><br>
    <h1>{{ $data->mother_name }}</h1><br>
    <h1>{{ $data->father_name }}</h1><br>
    <h1>{{ $data->godparent }}</h1><br>
    <h1>{{ $data->clergy_name }}</h1><br>
    <h1>{{ $data->church_name }}</h1><br>
    <h1>{{ $data->date }}</h1><br>
    
    <p>This PDF document is generated using domPDF in Laravel.</p>
</body>
</html>