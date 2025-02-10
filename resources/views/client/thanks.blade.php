<x-app-login>
    
    <x-slot name="title">Thank you!</x-slot>

    <main class="login-page">
        <style>
            .button-banner {
                font-size: 14px;
                line-height: 14px;
                font-weight: 700;
                padding: 17px 31px;
                margin-top: 20px;
                background: #CEDEBD;
                color: #435334;
            }

            .logo{
                width: 100%;
                display: flex;
                justify-content: center;
            }
            .logo img{
                width: 300px;
            }
        </style>
        <!-- Contenido de la portada principal -->
        <div class="form-container" style="max-width: 450px; position: relative; margin: 0 10px; padding: 1.5rem">
            <div class="content-form">
                <div class="logo">
                    <a href="{{route("home")}}"><img src="/image/logo1.png" alt="Logo de la pagina"></a>
                </div>
                <div style="width: 100%;">
                    <h2 style="text-align: center">¡Gracias!</h2>
                </div>
                <div style="padding:5px;">
                    <p style="text-align: justify;overflow-wrap: anywhere;word-break: break-word;">Muchas gracias por su compra. Apreciamos su confianza en nuestros productos y servicios. Si tiene alguna pregunta, no dude en contactarnos. ¡Esperamos que disfrute de su compra y verle pronto de nuevo!</p>
                </div>
                <div style="display:flex; justify-content:center; width:100%">
                    <a class="button-banner" href="{{route("shopping")}}" style="background:#435334; color:#CEDEBD; padding:20px 10px; border-radius:10px">CONTINUAR COMPRANDO</a>
                </div>
            </div>
        </div>
    </main>
</x-app-login>
