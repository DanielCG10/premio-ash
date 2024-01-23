<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <?php require_once "scripts.php"; ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to bottom, #E67E22, #F7DC6F);
        }

        .login-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 400px;
            max-width: 100%;
            text-align: center;
        }

        .login-header {
            background-color: #566573;
            color: #fff;
            padding: 20px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-header h2 {
            margin: 0;
        }

        .login-header img {
            width: 30px; /* Ajusta el tamaño según tus necesidades */
            height: auto;
            margin-left: 10px; /* Ajusta el margen según tus necesidades */
        }

        .form-container {
            padding: 20px;
            box-sizing: border-box;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 8px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-group select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-group button {
            background-color: #2C3E50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .form-group button:hover {
            background-color: #566573;
        }

        .message {
            margin-top: 20px;
            font-size: 14px;
            color: #888;
        }

        .error-message {
            color: #f00;
            font-weight: bold;
        }
        .btn-regresar {
            position: fixed;
            bottom: 10px;
            left: 10px;
        }
        .login-container {
            margin-bottom: 50px; /* Ajusta el margen inferior para dejar espacio para el botón de regresar */
        }
    </style>
</head>

<body>

<div class="login-container">
    <div class="login-header">
        <h2>Login</h2>
        <img src="img/icono.png" alt="Logo"> <!-- Reemplaza 'ruta_de_tu_imagen.jpg' con la ruta correcta de tu imagen -->
    </div>
    <div class="form-container">
        <form>
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="button" id="entrarSistema" class="btn btn-primary">Iniciar sesión</button>
                <a href="index.html" class="btn btn-secondary" style="float: right;">Regresar</a>
            </div>
        </form>
        <div class="message">
        </div>
    </div>
   

</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>



<script type="text/javascript">
    $(document).ready(function () {
        $('#entrarSistema').click(function () {
            if ($('#username').val() == "") {
                alert("Debes agregar el usuario");
                return false;
            } else if ($('#password').val() == "") {
                alert("Debes agregar la contraseña");
                return false;
            }

            var cadena = "usuario=" + $('#username').val() +
                "&password=" + $('#password').val();

            $.ajax({
                type: "POST",
                url: "loginSrc.php",
                data: cadena,
                success: function (r) {
                    if (r === "postulante") {
                        window.location = "informacionPostulante.php";
                    } else if (r === "administrador") {
                        window.location = "index.php";
                    } else {
                        alert("Fallo al entrar :(");
                    }
                }
            });
        });
    });
</script>
</html>