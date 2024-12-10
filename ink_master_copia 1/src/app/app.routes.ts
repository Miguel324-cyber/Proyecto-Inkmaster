import { Routes } from '@angular/router';
import { ClientesComponent } from './componentes/clientes/clientes.component';
import { InicioComponent } from './componentes/inicio/inicio.component';
import { TatuadoresComponent } from './componentes/tatuadores/tatuadores.component';
import { CitasComponent } from './componentes/citas/citas.component';
import { PrincipalComponent } from './componentes/principal/principal.component';
import { authGuard } from './auth.guard';
import { LoginComponent } from './componentes/login/login.component';
import { EmpleadoComponent } from './componentes/empleado/empleado.component';
import { RegistroclienteComponent } from './componentes/registrocliente/registrocliente.component';

export const routes: Routes = [
    {path:'',component:InicioComponent},
    {path:'inicio',component:InicioComponent},
    {path:'clientes',component:ClientesComponent},
    {path:'tatuadores',component:TatuadoresComponent},
    {path:'citas',component:CitasComponent},
    {path:'registrate',component:RegistroclienteComponent},
    {path: 'principal',component: PrincipalComponent},
    {path: 'empleado',component: EmpleadoComponent},
    {path: 'login',component: LoginComponent}
];