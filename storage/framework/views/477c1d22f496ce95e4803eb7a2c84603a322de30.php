<!-- Define que el documento esta bajo el estandar de HTML 5 -->
<!doctype html>

<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">
    
    <head>
        
        <meta charset="utf-8">
        <title>Iniciar Sesión</title>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="icon" type="image/png" href="<?php echo e(asset('assets/login/imagenes/logo_border.png')); ?>" />
        <meta name="author" content="SIS-HDB">
        <meta name="description" content="Hospital Daniel Bracamonte">
        <meta name="keywords" content="login,formulariode acceso html">
        
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="assets/login/css/login.css">
        
        <style type="text/css">
            
        </style>
        
        <script type="text/javascript">
        
        </script>
        
    </head>
    
    <body>
    
        <div id="contenedor">
            
            <div id="contenedorcentrado">
                <div id="login">
                  <form class="mt-4" method="POST" action="">
                    <?php echo csrf_field(); ?>
                        <label for="usuario">Usuario</label>
                        <input id="email" name="email"  type="text" name="usuario" required>
                        
                        <label for="password">Contraseña</label>
                        <input id="password" name="password" type="password" placeholder="Contraseña" name="password" required>
                        <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  

                    <div class="pie-form">      
                        <p style="color: red">* <?php echo e($message); ?></p>
                      </div>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                      <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg
                      text-white font-semibold p-2 my-3 hover:bg-indigo-600">Ingresar</button>           
                  </form>
                    
                </div>
                <div id="derecho">
                    <img src="assets/login/imagenes/logo2.png" width="300px" style="position: relative;">
                    <hr>
                    <div class="pie-form">
                        <div class="titulo">
                          Bienvenido Usuario
                        </div>
                        <hr>
                        <a href="#">Olvido su contraseña?</a>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html><?php /**PATH C:\xampp\htdocs\usuariosHB\resources\views/auth/login.blade.php ENDPATH**/ ?>