<main class="contenedor seccion contenido-centrado">
    <div class="login-card-container espacio-arriba2">
        <div class="login-card">
            <div class="login-card-logo">
                <i class="fa-solid fa-house-user"></i>
            </div>
            
            <div class="login-card-header">
                <h1>Iniciar sesion</h1>
            </div>
            <form method="POST" action="">
                
                <div class="form-item">
                    <i class="fa-solid fa-user"></i>
                    <input type="email" name="email" placeholder="Tu email" id="email" value="<?php echo $admin->email; ?>">
                    
                    <?php
                       if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        if($admin->getError('email')){
                            ?>
                                <div class="campo-obligatorio">
                                    <p>Este campo es obligatorio</p>
                                </div>
                            <?php
                        } else if(!$admin->E_email && !$admin->hasErrors()){
                            ?>
                                <div class="campo-obligatorio">
                                    <p>Este correo no se encuentra registrado</p>
                                </div>
                            <?php
                        }
                    }
                        
                    ?>
                </div>
                <div class="form-item">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" placeholder="Tu password" id="password" value="<?php echo $admin->password; ?>">
                    <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            if($admin->getError('password')){
                                ?>
                                    <div class="campo-obligatorio">
                                        <p>Este campo es obligatorio</p>
                                    </div>
                                <?php
                            } else if(!$admin->E_password&& $admin->E_email && !$admin->hasErrors()){
                                ?>
                                    <div class="campo-obligatorio">
                                        <p>Contraseña incorrecta</p>
                                    </div>
                                <?php
                            }
                        }
                        
                        
                    ?>
                </div>
                <input type="submit" value="Iniciar sesion" class="login-btn">
            </form>
        </div>
    </div>    

        
</main>