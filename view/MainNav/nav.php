<?php
    /* TODO: Rol 1 es de Usuario */
    if ($_SESSION["rol_id"]==1){
        ?>
            <nav class="side-menu" style="box-shadow: -2px 0px 16px 1px rgba(0,0,0,0.32);
                    -webkit-box-shadow: -2px 0px 16px 1px rgba(0,0,0,0.32);
                    -moz-box-shadow: -2px 0px 16px 1px rgba(0,0,0,0.32);">
                <ul class="side-menu-list">
                    <li class="red">
                        <a href="..\Home\">
                            <span class="glyphicon glyphicon-home"></span>
                            <span class="lbl">Inicio</span>
                        </a>
                    </li>
                    <li class="red">
                        <a href="..\NuevoTicket\">
                            <span class="glyphicon glyphicon-envelope"></span>
                            <span class="lbl">Nuevo Ticket</span>
                        </a>
                    </li>
                    <li class="red">
                        <a href="..\ConsultarTicket\">
                            <span class="glyphicon glyphicon-eye-open"></span>
                            <span class="lbl">Consultar Ticket</span>
                        </a>
                    </li>
                    <li class="red">
                        <a href="..\TotalPreventivos\">
                            <span class="glyphicon glyphicon-list-alt"></span>
                            <span class="lbl">Total de Equipos</span>
                        </a>
                    </li>
                    <li class="red">
                        <a href="..\TotalCorrectivos\">
                            <span class="glyphicon glyphicon-book"></span>
                            <span class="lbl">Historial Correctivos</span>
                        </a>
                    </li> 
                </ul>
            </nav>
        <?php
    }else{
        /* TODO: Rol 2 es de Administrador */
        ?>
            <nav class="side-menu" style="box-shadow: -2px 0px 16px 1px rgba(0,0,0,0.32);
                        -webkit-box-shadow: -2px 0px 16px 1px rgba(0,0,0,0.32);
                        -moz-box-shadow: -2px 0px 16px 1px rgba(0,0,0,0.32);">
                <ul class="side-menu-list">
                    <li class="red">
                        <a href="..\Home\">
                            <span class="glyphicon glyphicon-home"></span>
                            <span class="lbl">Inicio</span>
                        </a>
                    </li>
                    <li class="red">
                        <a href="..\NuevoTicket\">
                            <span class="glyphicon glyphicon-envelope"></span>
                            <span class="lbl">Nuevo Ticket</span>
                        </a>
                    </li>
                    <li class="red">
                        <a href="..\ConsultarTicket\">
                            <span class="glyphicon glyphicon-eye-open"></span>
                            <span class="lbl">Consultar Ticket</span>
                        </a>
                    </li>                    
                    <li class="red">
                        <a href="..\ConsultarMantenimientoPrev\">
                            <span class="glyphicon glyphicon-transfer"></span>
                            <span class="lbl">Gestión de Preventivos</span>
                        </a>
                    </li>                   
                    <li class="red">
                        <a href="..\ConsultarMantenimientoCorrect\">
                            <span class="glyphicon glyphicon-tasks"></span>
                            <span class="lbl">Gestión de Correctivos</span>
                        </a>
                    </li>
                    <li class="red">
                        <a href="..\TotalCorrectivos\">
                            <span class="glyphicon glyphicon-book"></span>
                            <span class="lbl">Historial Correctivos</span>
                        </a>
                    </li> 
                    <li class="red">
                        <a href="..\TotalPreventivos\">
                            <span class="glyphicon glyphicon-list-alt"></span>
                            <span class="lbl">Total de Equipos</span>
                        </a>
                    </li>                    
                    <li class="red">                        
                        <span class="dropright" class="lbl">  
                            <span class="glyphicon glyphicon-th-list"></span>                          
                            <span class="dropdown-toggle" data-toggle="dropdown">
                                Administrar
                            </span>
                            <span class="dropdown-menu">
                            <!-- Dropdown menu links -->
                                <a href="..\MntCategoria\">
                                    <span class="glyphicon glyphicon-tag"></span>
                                    <span class="lbl">Categorías</span>
                                </a>
                                <a href="..\MntSubCategoria\">
                                    <span class="glyphicon glyphicon-tags"></span>
                                    <span class="lbl">SubCategorias</span>
                                </a>                                                        
                                <a href="..\MntPrioridad\">
                                    <span class="glyphicon glyphicon-bookmark"></span>
                                    <span class="lbl">Prioridades</span>
                                </a> 
                                <a href="..\MntUsuario\">
                                    <span class="glyphicon glyphicon-user"></span>
                                    <span class="lbl">Usuarios</span>
                                </a>
                                <a href="..\MntSedes\">
                                    <span class="glyphicon glyphicon-map-marker"></span>
                                    <span class="lbl">Sedes</span>
                                </a>
                            </div>
                        </span>                        
                    </li>                  
                </ul>
            </nav>
        <?php
    }
?>
