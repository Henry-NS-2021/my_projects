import { Component, OnInit } from '@angular/core';
import {Graffity} from '../image_card';
import{StreetDance} from '../image_card';


@Component({
  selector: 'app-people',
  templateUrl: './people.component.html',
  styleUrls: ['./people.component.scss']
})
export class PeopleComponent implements OnInit {
Graffity=Graffity;
StreetDance=StreetDance;
  constructor() { }

  ngOnInit(): void {
  }

}
