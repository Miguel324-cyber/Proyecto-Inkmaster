import { Injectable } from '@angular/core';
import { Router } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  constructor(private router: Router) { }

  // Verifica si el usuario está autenticado
  isAuthenticated(): boolean {
    if (typeof window !== 'undefined' && window.localStorage) {
      return !!localStorage.getItem('token');
    }
    return false;
  }

  // Guarda el token y el tipo de usuario en el localStorage
  login(token: string, userType: 'cliente' | 'empleado') {
    if (typeof window !== 'undefined' && window.localStorage) {
      localStorage.setItem('token', token);
      localStorage.setItem('userType', userType);
    }
  }

  // Recupera el tipo de usuario desde el localStorage
  getUserType(): 'cliente' | 'empleado' | null {
    if (typeof window !== 'undefined' && window.localStorage) {
      return localStorage.getItem('userType') as 'cliente' | 'empleado' | null;
    }
    return null;
  }

  // Cierra sesión y redirige a la página de inicio
  logout() {
    if (typeof window !== 'undefined' && window.localStorage) {
      localStorage.removeItem('token');
      localStorage.removeItem('userType');
      console.log('Sesión cerrada y token eliminado');
    }
    this.router.navigate(['/inicio']);
  }
}
