<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') - laravel 4 </title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <style type="text/css" media="screen">
            *  {
                margin:0;
                padding:0;
            }
            
            html, body {height:100%;}
            
            .geral {
                min-height:100%;
                position:relative;
                width:800px;
            }
            
            .footer {
                position:absolute;
                bottom:0;
                height: 50px;
                width:100%;
                background-color: #222222
            }
        
            p {
                display: flex;
                color: #fff;
                justify-content: center;
            }

            .content {overflow:hidden;}
            .aside {width:200px;}
            .fleft {float:left;}
            .fright {float:right;}
    </style>

</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('tarefas.list')}}"> Home </a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ route('tarefas.add')}}"> Adicionar Tarefas </a>
        </ul>
    </nav>

    <section>
        @yield('content')
    </section>
    
    <footer>  <!-- Footer Bottom Area Start -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <br/>
                        <p> © All Rights Reserved by |<a href="#"> My Footer 2021 <i class="fa fa-love"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>