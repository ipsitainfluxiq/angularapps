import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TwitterpageComponent } from './twitterpage.component';

describe('TwitterpageComponent', () => {
  let component: TwitterpageComponent;
  let fixture: ComponentFixture<TwitterpageComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TwitterpageComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TwitterpageComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
