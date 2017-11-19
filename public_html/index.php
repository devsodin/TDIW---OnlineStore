<DOCTYPE html>
    <hmtl>
        <head>
            <title>ENP</title>
            <meta lang="en" charset="UTF-8">
            <link rel="icon" href="a.ico" type="image/x-icon"/>
            <link rel=stylesheet href="./views/default/css/index.css"/>
            <link rel=stylesheet href="./views/default/css/navbar.css"/>

        </head>
        <body>
        <?php
        define('__ROOT__', __DIR__);

        function selectaction(){
            $option = $_GET['action'] ?? 'index';
            switch ($option){
                case ('categories'):
                    include __DIR__ . '/controllers/categories.php';
                    break;
                case ('products'):
                    include __DIR__.'/controllers/products.php';
                    break;
                case ('deals'):
                    include __DIR__.'/controllers/deals.php';
                    break;
                case 'login':
                    include __DIR__.'/controllers/login.php';
                    break;
                case ('register'):
                    include __DIR__.'/controllers/register.php';
                    break;
                default:
                    include __DIR__.'/controllers/index.php';
                    break;
            }
        }
        selectAction();
        ?>
        </body>
    </hmtl>