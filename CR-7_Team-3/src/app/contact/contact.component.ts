import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.scss']
})
export class ContactComponent implements OnInit {

  isChecked = true;

  info = new FormGroup({
    name: new FormControl('', Validators.required ),
    email: new FormControl('', Validators.required, ),
    text: new FormControl('', Validators.required),
  })



  constructor() { }

  ngOnInit(): void {
  }

  onSubmit(submitData: any){
    if(this.info.valid){
      console.log(submitData)
      this.info.reset();
      window.alert('Your message has been sent');
    }
  }
}
