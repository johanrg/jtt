import { Injectable } from "@angular/core"
import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { ResponseData } from "../interfaces/response-data.interface"
import 'rxjs/add/operator/do';
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/catch';

@Injectable()
export class AuthenticationService {
  public token: string;

  constructor(private http: HttpClient) {
    let currentUser = JSON.parse(localStorage.getItem('currentUser'));
    this.token = currentUser && currentUser.token;
  }

  public login(username: string, password: string): Observable<boolean> {
    const headers = new HttpHeaders()
      .set('accept', 'application/json');
    const params = new HttpParams()
      .set('username', username)
      .set('password', password);

    return this.http
      .get<ResponseData>('http://localhost:8080/api/authenticate', {params: params, headers: headers})
      .catch((error: string) => {
        console.log('error:' + error);
        return Observable.of(false);
      })
      .do(response => {
        console.log(response);
      })
      .map((response: ResponseData) => {
        let token = response && <string>response.result.token;
        if (token) {
          this.token = token;
          localStorage.setItem('currentUser', JSON.stringify({username: username, token: token}));
          return true;
        } else {
          return false;
        }
      });
  }

  public logout(): void {
    this.token = null;
    localStorage.removeItem('currentUser');
  }
}