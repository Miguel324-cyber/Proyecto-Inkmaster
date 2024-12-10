<?php
    class empleado{

					public $idEmpleado;
					public $nombreEmpleado;
				    public $correoEmpleado;
					public $contrasenaEmpleado;
					public $telefonoEmpleado;
					public $idCargo;
                    
					function agregar(){
                                        $conet = new Conexion();
                                        $c = $conet->conectando();
                                        $query = "select * from empleado where idEmpleado = '$this->idEmpleado'";
                                        $ejecuta = mysqli_query($c, $query);
                                        if(mysqli_fetch_array($ejecuta)){
											echo '<script>	Swal.fire({
												position: "top",
												icon: "info",
												title: "El Registro ya Existe en el Sistema",
												showConfirmButton: false,
												timer: 3000
											});</script>';
                                        }else{
											$contrasenaEmpleado = password_hash ($this->contrasenaEmpleado, PASSWORD_DEFAULT);
                                        	$insertar = "insert into empleado values(

																					'$this->idEmpleado',
																					'$this->nombreEmpleado',
																					'$this->correoEmpleado',
                                                                                    '$contrasenaEmpleado',
																					'$this->telefonoEmpleado',
																					'$this->idCargo'
																					
                                        )";
                                        echo $insertar;
                                        mysqli_query($c,$insertar);
                                        echo '<script>	Swal.fire({
											position: "top",
											icon: "success",
											title: "El Registro Fue Almacenado en el Sistema",
											showConfirmButton: false,
											timer: 3000
										});</script>';
                                            
                                        }

                    }

                    function modificar(){
                                    $c = new Conexion();
								    $cone = $c->conectando();
									$sql = "select * from empleado where idEmpleado = '$this->idEmpleado'";
									$r = mysqli_query($cone,$sql);
									if(!mysqli_fetch_array($r))
																{
																	echo "<script>alert('el Empleado ya existe en el Sistema')</script>";
																}
																else{
																	$contrasenaEmpleado = password_hash ($this->contrasenaEmpleado, PASSWORD_DEFAULT);
																	$id = "update empleado set
																	    idEmpleado = '$this->idEmpleado',
																		nombreEmpleado = '$this->nombreEmpleado',
																	    correoEmpleado = '$this->correoEmpleado',
																		contrasenaEmpleado = '$this->contrasenaEmpleado',
																		telefonoEmpleado = '$this->telefonoEmpleado',
																		idCargo = '$this->idCargo'
                                                                        where idEmpleado = '$this->idEmpleado'";
																	mysqli_query($cone,$id);
																	echo $id;
																	echo '<script>	Swal.fire({
																		position: "top",
																		icon: "success",
																		title: "El Registro Fue Actualizado en el Sistema",
																		showConfirmButton: false,
																		timer: 3000
																	  });</script>';			
																}
				}

                     
                    
                    function eliminar(){
									try{   
									$c = new Conexion();
									$cone = $c->conectando();
									$sql= "delete from cliente where idEmpleado='$this->idEmpleado'";
									mysqli_query($cone,$sql);
								    echo $sql;
									echo '<script>	Swal.fire({
										position: "top",
										icon: "success",
										title: "El Registro Fue Eliminado del Sistema",
										showConfirmButton: false,
										timer: 3000
									});</script>';

									}catch(Exception $e){
										echo'<script> Swal.fire({
											position: "top",
											icon: "warning",
											title: "El Registro no se Puede Eliminar Porqué Tiene Datos Relacionados",
											showConfirmButton: false,
											timer: 3000
										});</script>';
									}
								}

    }

                    
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
