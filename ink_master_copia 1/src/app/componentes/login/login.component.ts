import { HttpClient } from '@angular/common/http';
import { Component } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthService } from '../../auth.service';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [ReactiveFormsModule],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent {
  form: FormGroup;

  constructor(
    private http: HttpClient,
    private router: Router,
    private authService: AuthService
  ){
    this.form = new FormGroup({
      correo: new FormControl(''),
      contrasena: new FormControl('')
    });
  }

  onLogin() {
    if (this.form.valid) {
      const datos = this.form.value;
      this.http.post('http://localhost:8000/api/login', datos)
      .subscribe({
        next: (respuesta: any) => {
          console.log('Inicio de sesión exitosos', respuesta);
          this.authService.login(respuesta.token, respuesta.tipo);
          if (respuesta.tipo === 'cliente') {
            this.router.navigate(['/citas']);
          } else if (respuesta.tipo === 'empleado') {
            this.router.navigate(['/empleado']);
          }
        },
        error: (error) => {
          console.log('Error en el inicio de sesion', error);
        }
      });
    } else {
      console.log('Formulario no valido');
    }
  }
}
