import { Component } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { HttpClient } from '@angular/common/http';
import { RouterLink, RouterOutlet } from '@angular/router';
import { error } from 'console';

@Component({
  selector: 'app-registrocliente',
  standalone: true,
  imports: [RouterOutlet, ReactiveFormsModule, RouterLink],
  templateUrl: './registrocliente.component.html',
  styleUrl: './registrocliente.component.css'
})
export class RegistroclienteComponent {

  form:FormGroup;

  constructor(private http: HttpClient){
    this.form = new FormGroup({
      idCliente: new FormControl(''),
      correoCliente: new FormControl(''),
      nombreCliente: new FormControl(''),
      apellidoCliente: new FormControl(''),
      telefonoCliente: new FormControl(''),
      contrasenaCliente: new FormControl('')
    });
  }

  onSubmit(){
    if (this.form.valid) {
      const datos = this.form.value;
      this.http.post('http://127.0.0.1:8000/api/cliente', datos)
      .subscribe({
        next: (respuesta) => {
          console.log('Datos enviados exitosamente', Response, datos);
          //maneja la respuesta aqui
        },
        error: (error) => {
          console.error('Error al enviar los datos', error);
          // maneja el error aqui
        }
      }); 
    } else{
      console.log('Formulario invalido');
    }
  }
}

