import { Routes, RouterModule } from "@angular/router";
import {LoginComponent} from "./login/login.component";

const appRoutes: Routes = [
  { path: 'login', component: LoginComponent},
  { path: '**', redirectTo: '' }
];

export const Routing = RouterModule.forRoot(appRoutes, { enableTracing: true });
