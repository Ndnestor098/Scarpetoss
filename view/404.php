<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404</title>
    <style>
        *{
            box-sizing: border-box;
            text-decoration: none;
            font-family: sans-serif;
            padding: 0;
            margin: 0;
        }
        .content-error{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
        }
        .info-error{
            display: flex;
            flex-direction: column;
            justify-content: start;
            align-items: center;
            padding: 40px 80px;
            background: #ccc;
            border-radius: 10px;
            gap: 30px;

            a{
                color: #ccc;
                background-color: #000;
                font-weight: 700;
                font-size: 18px;
                padding: 10px 20px;
                border-radius: 5px;
            }
        }
    </style>
</head>
<body>
    <main>
        <div class="content-error">
            <div class="info-error">
                <h1>Error - Pagina no existe</h1>
                <p>No se pudo encontrar la pagina</p>
                <div style="margin-top: 15px;">
                    <a href="/">Volver al Home</a>
                </div>
            </div>
            
        </div>
    </main>
</body>
</html>