import { Component, OnInit } from '@angular/core';
import {concerts} from '../image_card';
import{music} from '../image_card';

@Component({
  selector: 'app-events',
  templateUrl: './events.component.html',
  styleUrls: ['./events.component.scss']
})
export class EventsComponent implements OnInit {
concerts=concerts;
music=music;
  constructor() { }

  ngOnInit(): void {
  }

}
