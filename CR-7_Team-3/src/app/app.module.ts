import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { ReactiveFormsModule } from '@angular/forms';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavbarComponent } from './navbar/navbar.component';
import { FooterComponent } from './footer/footer.component';
import { PortfolioComponent } from './portfolio/portfolio.component';
import { ContactComponent } from './contact/contact.component';
import { BioComponent } from './bio/bio.component';

import { TestimonialsComponent } from './testimonials/testimonials.component';
import { HomeComponent } from './home/home.component';
import { PeopleComponent } from './people/people.component';
import { EventsComponent } from './events/events.component';
import { PrintsComponent } from './prints/prints.component';
import { CartComponent } from './cart/cart.component';

@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    FooterComponent,
    PortfolioComponent,
    ContactComponent,
    BioComponent,
    TestimonialsComponent,
    HomeComponent,
    PeopleComponent,
    EventsComponent,
    PrintsComponent,
    CartComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    ReactiveFormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
