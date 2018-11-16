import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';
import {appRoutingProviders, routing} from '../route';
import { AppComponent } from './app.component';
import { TwitterpageComponent } from './twitterpage/twitterpage.component';

@NgModule({
  declarations: [
    AppComponent,
    TwitterpageComponent
  ],
  imports: [
    BrowserModule,
      routing,
      HttpClientModule
  ],
  providers: [appRoutingProviders],
  bootstrap: [AppComponent]
})
export class AppModule { }
