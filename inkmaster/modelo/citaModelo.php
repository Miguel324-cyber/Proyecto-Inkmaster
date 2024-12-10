<?php
    class cita{

					public $idCita;
					public $fechaCita;
				    public $horaCita;
					public $precioCita;
					public $idCliente;
					public $idEmpleado;
                    
					function agregar(){
                                        $conet = new Conexion();
                                        $c = $conet->conectando();
                                        $query = "select * from cita where idCita = '$this->idCita'";
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
                                        	$insertar = "insert into cita values(

																					'$this->idCita',
																					'$this->fechaCita',
																					'$this->horaCita',
																					'$this->precioCita',
                                                                                    '$this->idCliente',
																					'$this->idEmpleado'
																					
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
									$sql = "select * from cita where idCita = '$this->idCita'";
									$r = mysqli_query($cone,$sql);
									if(!mysqli_fetch_array($r))
																{
																	echo "<script>alert('la cita ya existe en el Sistema')</script>";
																}
																else{
																	$contrasenaEmpleado = password_hash ($this->contrasenaEmpleado, PASSWORD_DEFAULT);
																	$id = "update empleado set
																	    idCita = '$this->idCita',
																		fechaCita = '$this->fechaCita',
																	    horaCita = '$this->horaCita',
																		precioCita = '$this->precioCita',
																		idCliente = '$this->idCliente',
																		idEmpleado = '$this->idEmpleado'
                                                                        where idCita = '$this->idCita'";
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
									$sql= "delete from cita where idCita='$this->idCita'";
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
