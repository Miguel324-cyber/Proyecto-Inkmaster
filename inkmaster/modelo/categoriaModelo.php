<?php
    class cliente{

					public $idCliente;
					public $correoCliente;
				    public $contrasenaCliente;
					public $nombreCliente;
					public $apellidoCliente;
					public $telefonoCliente;
                    
					function agregar(){
                                        $conet = new Conexion();
                                        $c = $conet->conectando();
                                        $query = "select * from cliente where idCliente = '$this->idCliente'";
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
											$contrasenaCliente = password_hash ($this->contrasenaCliente, PASSWORD_DEFAULT);
                                        	$insertar = "insert into cliente values(

																					'$this->idCliente',
																					'$this->correoCliente',
																					'$contrasenaCliente',
																					'$this->nombreCliente',
																					'$this->apellidoCliente',
																					'$this->telefonoCliente'
																					
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
									$sql = "select * from cliente where idCliente = '$this->idCliente'";
									$r = mysqli_query($cone,$sql);
									if(!mysqli_fetch_array($r))
																{
																	echo "<script>alert('el Cliente ya existe en el Sistema')</script>";
																}
																else{
																	$contrasenaCliente = password_hash ($this->contrasenaCliente, PASSWORD_DEFAULT);
																	$id = "update cliente set
																	    idCliente = '$this->idCliente',
																		correoCliente = '$this->correoCliente',
																	    contrasenaCliente = '$contrasenaCliente',
																		nombreCliente = '$this->nombreCliente',
																		apellidoCliente = '$this->apellidoCliente',
																		telefonoCliente = '$this->telefonoCliente'
                                                                        where idCliente = '$this->idCliente'";
																	mysqli_query($cone,$id);
																	echo $id;
																	//echo "<script>alert('el Cliente Fue Modificado en el Sistema')</script>";				
																}
				}

                     
                    
                    function eliminar(){
									try{   
									$c = new Conexion();
									$cone = $c->conectando();
									$sql= "delete from cliente where idCliente='$this->idCliente'";
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
