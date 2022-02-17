import { parseI18nMeta } from '@angular/compiler/src/render3/view/i18n/meta';
import { Injectable } from '@angular/core';


@Injectable({
  providedIn: 'root'
})
export class CartserviceService {
items: any =[];




  constructor() { }

  addToCart(print:any){
   

    if(this.items.length == 0){
      this.items.push(print);
    } else if(this.items.find((param: any)=>param.title == print.title)){
      print.qtty ++;
    }else{
      this.items.push(print);
    }

    
  }



  getItems() {
    return this.items;
  }

  clearCart() {
    this.items = [];
    return this.items;
  }
  total(){
    let total: number = 0;
    for(let val of this.items){
      total = total + (val.price * val.qtty);
      
    }
    return total;
  }

  discountTen(){
    let total: number = 0;
    let discount: number =0;
    for(let val of this.items){
       total = total + (val.price * val.qtty);
      discount = total *0.9
      
    }
    return discount;
  }

  discountTwen(){
    let total: number = 0;
    let discount: number =0;
    for(let val of this.items){
      total = total + (val.price * val.qtty);
      discount = total * 0.8
    }
    return discount;
    }


}
