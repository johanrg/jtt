import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from "@angular/common/http"

import { Routing } from "./app.routing";
import { AuthenticationService } from "./services/authentication.service"
import { AppComponent } from './app.component';
import { LoginComponent } from "./login/login.component"
import {HomeComponent} from "./home/home.component";
import {AuthGuard} from "./guards/auth.guard";

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    HomeComponent
  ],
  imports: [
    Routing,
    BrowserModule,
    HttpClientModule,
  ],
  providers: [
    AuthenticationService,
    AuthGuard
  ],
  bootstrap: [AppComponent]
})

export class AppModule { }
