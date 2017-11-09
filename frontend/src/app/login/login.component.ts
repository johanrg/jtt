import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { AuthenticationService } from '../services/authentication.service';

@Component({
  templateUrl: 'login.component.html'
})

export class LoginComponent implements OnInit {
  model: any = {};
  loading: boolean = false;
  error: string = '';

  constructor(
    private router: Router,
    private authenticationService: AuthenticationService
  ) {}

  ngOnInit(): void {

  }

  login() {
    this.loading = true;
    this.authenticationService.login('johan', 'password')
      .subscribe(result => {
        if (result) {
          this.router.navigate(['/']);
        } else {
          this.error = 'Username or password is incorrect';
          this.loading = false;
        }
        console.log('login:' + result);
      });
  }

  logout() {
    this.authenticationService.logout();
  }
}