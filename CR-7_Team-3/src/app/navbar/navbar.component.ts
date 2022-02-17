import { Component, OnInit } from '@angular/core';
import { HostListener } from '@angular/core';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.scss']
})
export class NavbarComponent implements OnInit {

  isScrolled = false;

  constructor() { }

  ngOnInit(): void {
  }

  @HostListener('window:scroll')
  onWindowScrollDown(){
    if(window.pageYOffset >= 50){
      this.isScrolled = true;
    }else{
      this.isScrolled = false;
    }
  }

}

