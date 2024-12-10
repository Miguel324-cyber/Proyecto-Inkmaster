import { Component } from '@angular/core';
import { RouterLink, RouterModule } from '@angular/router';
import { AuthService } from '../../auth.service';
import { CommonModule } from '@angular/common';
import { DomSanitizer, SafeResourceUrl } from '@angular/platform-browser';

@Component({
  selector: 'app-cabecera',
  standalone: true,
  imports: [RouterLink, CommonModule, RouterModule],
  templateUrl: './cabecera.component.html',
  styleUrl: './cabecera.component.css'
})
export class CabeceraComponent {
  iframeSrc: SafeResourceUrl | null = null;

  constructor(private authService: AuthService, private sanitizer: DomSanitizer) {}

  // Obtiene el tipo de usuario desde el AuthService
  get userType(): 'cliente' | 'empleado' | null {
    return this.authService.getUserType();
  }

  // Verifica si el usuario está autenticado
  isAuthenticated(): boolean {
    return this.authService.isAuthenticated();
  }
  
  onLogout() {
    this.authService.logout();
  }

  // Carga una URL en el iframe
  loadIframe(url: string): void {
    this.iframeSrc = this.sanitizer.bypassSecurityTrustResourceUrl(url);
  }
}
