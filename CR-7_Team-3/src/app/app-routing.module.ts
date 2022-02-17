import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { BioComponent } from './bio/bio.component';
import { CartComponent } from './cart/cart.component';
import { ContactComponent } from './contact/contact.component';
import { EventsComponent } from './events/events.component';
import { HomeComponent } from './home/home.component';
import { PeopleComponent } from './people/people.component';
import { PortfolioComponent } from './portfolio/portfolio.component';
import { PrintsComponent } from './prints/prints.component';
import { TestimonialsComponent } from './testimonials/testimonials.component';

const routes: Routes = [{
  path:"", component: HomeComponent
},
{
  path: "portfolio", component: PortfolioComponent
},
{
  path: "bio", component: BioComponent
},
{path: "testimonials", component: TestimonialsComponent
  
},
{path: "contact", component: ContactComponent
  
},
{path: "people", component: PeopleComponent
  
},
{path: "events", component: EventsComponent
  
},
{
path: "prints", component: PrintsComponent
},
{
  path: "cart", component: CartComponent
}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
