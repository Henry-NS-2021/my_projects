import { Component, OnInit } from '@angular/core';
import { prints } from '../image_card';
import { CartserviceService } from '../cartservice.service';

@Component({
  selector: 'app-prints',
  templateUrl: './prints.component.html',
  styleUrls: ['./prints.component.scss']
})
export class PrintsComponent implements OnInit {
prints = prints;

  constructor(private cart: CartserviceService) { }

  ngOnInit(): void {
  }

  addToCart(print: any){
    window.alert('Your added a print to the cart!');
    this.cart.addToCart(print);
  }


}
