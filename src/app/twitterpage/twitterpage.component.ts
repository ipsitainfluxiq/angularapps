import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
@Component({
  selector: 'app-twitterpage',
  templateUrl: './twitterpage.component.html',
  styleUrls: ['./twitterpage.component.css']
})
export class TwitterpageComponent implements OnInit {

  constructor(private _http: HttpClient) { }

  ngOnInit() {
  }
call() {
    let link = 'http://demo.artistxp.com/assets/instagram/index_2.php';
    this._http.get(link)
        .subscribe(res => {
            let result: any;
            result = res;
            console.log(result);
        }, error => {
            console.log('Oooops!');
        });
}
}
