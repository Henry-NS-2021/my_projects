import { Component, OnInit } from '@angular/core';
import { CartserviceService } from '../cartservice.service';
import { FormControl,FormGroup,Validators } from '@angular/forms';



@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.scss']
})
export class CartComponent implements OnInit {

  items: any;
  sum: any;
  sumTen: any;
  sumTwen: any;
  

  info = new FormGroup({
    fName: new FormControl('',Validators.required),
    lName: new FormControl('',Validators.required),
    adress: new FormControl('',Validators.required),
    mail: new FormControl('',Validators.required)

  });



  constructor(private cart: CartserviceService) { }

  ngOnInit(): void {
    this.items = this.cart.getItems();
    this.sum = this.cart.total();
    this.sumTen = this.cart.discountTen();
    this.sumTwen = this.cart.discountTwen();
  }

  onSubmit(purchaseData: any){
    

    if(this.info.valid){
      console.warn('Your order has been submitted', purchaseData);
      window.alert('Your order has been submitted');
      
      this.items = this.cart.clearCart();

      this.info.reset();
      this.sum = 0;
   } 

}

onClear(){
  this.items = this.cart.clearCart();
  this.sum = 0;
}


}
