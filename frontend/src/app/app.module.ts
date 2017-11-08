import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from "@angular/common/http"

import { Routing } from "./app.routing";
import { AuthenticationService } from "./services/authentication.service"
import { AppComponent } from './app.component';
import { LoginComponent } from "./login/login.component"

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
  ],
  imports: [
    Routing,
    BrowserModule,
    HttpClientModule,
  ],
  providers: [
    AuthenticationService
  ],
  bootstrap: [AppComponent]
})

export class AppModule { }
