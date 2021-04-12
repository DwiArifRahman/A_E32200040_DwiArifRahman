<!DOCTYPE html> 
<html lang="{{ str_replace('_','-', app()->getlocale())}}"> 
<head>  
    <meta charset="utf-8">  
    <meta name="viewport" content="width-device-widh, initialscale1.0">  
    <meta http-equiv="X-UA-Compitable">  
    <title>{{ config('app.name')}}</title> 
</head> 
<body>  
    <div class="jumbotron jumbotron-fluid">   
        <div class="container">    
            @yield('content')   
        </div>  
    </div> 
</body> 
</html> 