import { Routes, RouterModule } from "@angular/router";
import {LoginComponent} from "./login/login.component";
import {HomeComponent} from "./home/home.component";
import {AuthGuard} from "./guards/auth.guard";

const appRoutes: Routes = [
  { path: 'login', component: LoginComponent},
  { path: '', component: HomeComponent, canActivate: [AuthGuard] },
  { path: '**', redirectTo: '' }
];

export const Routing = RouterModule.forRoot(appRoutes, { enableTracing: true });
