// ---------------------------------------- INSERT TEXT BEFORE THE BLOG ENTRIES

let section: HTMLElement = document.createElement("section");
(section as HTMLElement).innerHTML = `
    <div id="intro">
    <h1>Travel-o-Matic Blog</h1>
    <p>Welcome to Austria, its various places, tastes, sounds and flavours</p>
    </div>
    <article>
      <h3>Lorem Ipsum</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique iure possimus sunt unde maxime nemo maiores quae! Facilis libero sunt asperiores consequuntur, voluptas tempore, corporis, corrupti dicta soluta nostrum ut!
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto eius eaque, officia esse molestiae ipsam in dolores ut consectetur incidunt eveniet quibusdam, aliquam dolorum error? Similique tempora mollitia sint eveniet.
    Ipsum, aliquid voluptate deleniti aperiam libero magni quae architecto vitae, quod ut amet, doloremque accusantium. Recusandae, ab vel. Recusandae, ipsam? Expedita nihil quia aliquam dolores? Dolorum explicabo ipsum perferendis ut!
    Dignissimos officia totam unde tenetur optio nihil voluptatem reiciendis cum soluta natus numquam corporis veniam adipisci obcaecati ullam sunt magni tempora, repudiandae, aperiam illo? Rerum quas unde ipsum facilis accusantium?</p>
    <p> soluta minima iure? Voluptas natus molestias saepe pariatur voluptatum illum nam, error, eveniet veniam laborum consequatur sint delectus itaque necessitatibus hic atque, reiciendis earum ullam harum aperiam! Cum, culpa.</p>
  </article>
`;

(document.querySelector("main") as HTMLElement).prepend(section);



// ---------------------------------------- CARDS TO INSERT INTO HTML PAGE
//creating an interface Tourism
interface Tourism {
    name: string;
    street: string;
    zipCode: number;
    city: string;
    createdOn: Date;
    img?: string;
    website?: string;
}

//---------------- LOCATIONS: defining a parent class
class Locations {
    name: string;
    street: string;
    zipCode: number;
    city: string;
    createdOn: Date;
    img?: string; //optional properties img and website
    website?: string;

    constructor (name: string, street: string, zipCode: number, city: string, createdOn: Date, img?: string, website?: string){
        this.name = name;
        this.street = street;
        this.zipCode = zipCode;
        this.city = city;
        this.createdOn = createdOn;
        this.img = img;
        this.website = website;
    }

    //Splitting the card into two parts, then displying it entirely with the 3rd function
    displayTop() { //upper part of the card
        return `
        <section class="card-group col-sm-12 col-md-6 col-lg-3 justify-content-center py-2 px-1 mx-auto">
        <div id="card_settings" class="card my-2">
            <img id="card_img" class="card-img-top rounded" src="${this.img}" alt="${this.name}">
            <div class="card-body">
                <h3 class="card-title text-center mb-3">${this.name}</h3>
                <p class="card-text">${this.street}<br>${this.zipCode} ${this.city}</p>`
    }
    
    // format the dates
    convertDate(param: Date) {
        return param.toLocaleString('de-AT', { 
            hour12: false, // time format
            timeZone: "Europe/Vienna",
            // date
            year: "numeric",
            month: "2-digit",
            day: "2-digit",
            // time
            hour: "numeric",    
            minute: "numeric",  
            second: "numeric"
        })
    }

    displayBottom() {//lower part of the card
        return `
        </div> 
        <i class="card-footer"><small>Created on ${this.convertDate(this.createdOn)}
        </small></i> 
        </div>
        </section>
        `
    }
    
    display() { // display the whole card
        return `${this.displayTop()} ${this.displayBottom()}`;
    }
}

//Objects from class Locations:
let church: any = new Locations ("St. Charles Church", "Karlsplatz 1", 1010, "Vienna", new Date(2021, 10, 2, 10, 15, 43), "img/church.jpg");
let zoo = new Locations ("Zoo Vienna", "Maxingstrasse 13b", 1130, "Wien", new Date(2015, 7, 31, 12, 30, 33), "img/zoo.jpg");


//---------------- RESTAURANTS: child class of Locations 
class Restaurants extends Locations {//additional property: phone
    phone: string; 
    cuisine: string;

    constructor (name: string, cuisine: string, street: string, zipCode: number, city: string, createdOn: Date, img: string, website: string, phone: string){
        super(name, street, zipCode, city, createdOn, img, website);
        this.phone = phone;
        this.cuisine = cuisine;
    }

    //Edited lower part of the card for the Restaurants class
    displayBottom() {
        return `
        <hr>
        <p class="text-center fst-italic text-muted p-0 m-0">(${this.cuisine})</p>
        <p class="pt-2"><b>Website</b> <br> <a href="${this.website}">${this.website}</a><br>
       <b>Phone <br> </b> ${this.phone}</p>
        </div>
        <i class="card-footer">Created on ${this.convertDate(this.createdOn)}</i>
        </div>
        </section>
        `        
    }
}

// Objects from class Restaurants
let thai = new Restaurants ("Lemon Leaf", "Thai Cuisine", "Kettenbrueckegasse 19", 1050, "Vienna", new Date(2019, 0, 1, 9, 0, 13), "img/thai_restaurant.png", "http://www.lemonleaf.at", "+43(1) 58 123 08");

let sixta = new Restaurants ("Sixta", "Austrian Cuisine", "Schoenbrunner Strasse 21", 1050, "Wien", new Date(2020, 3, 22, 19, 15, 23), "img/sixta.png", "http://www.sixta-restaurant.at", "+43(1) 58 528 56 <br> +43(1) 58 528 56")


//---------------- EVENTS: child class of Locations
class Events extends Locations {//additional properties: eventDate, price
    eventDate: any; 
    price: number; 

    constructor (name: string, street: string, zipCode: number, city: string, createdOn: Date, img: string, website: string, eventDate: any, price: number) {
        super(name, street, zipCode, city, createdOn, img, website);
        this.eventDate = eventDate;
        this.price = price;
    }

    //Edited lower part of the card for the Events class
    displayBottom() {
        return `
        <hr>
        <b class="fs-5">SHOW</b> <br> <span> ${this.eventDate}</span></p>
        <p><b class="fs-5">BOOKING</b> <a href="${this.website}">${this.website}</a><br>
        <p class="text-end pt-4">Early bird tickets: <span class="fs-4 fw-bold">€${this.price}</p>
            </div>
            <i class="card-footer">Created on ${this.convertDate(this.createdOn)}</i>
        </div>
        </section>
        `
    }
}

// Objects from the class Events 
let kravitz: Object = new Events ("Lenny Kravitz", "Wiener Stadthalle - Halle D <br> Roland Rainer Platz 12", 1150, "Wien", new Date(2020, 4, 24, 20, 15, 54), "img/kravitz.jpg", "https://www.lennykravitz.com", "Sat, 09.12.2029 - 19:30", 47.80);

let kristofferson: Object = new Events ("Kris Kristofferson", "Wiener Stadthalle, Halle F <br> Roland Rainer Platz 1", 1150, "Wien", new Date(2021, 8, 2, 23, 55, 58), "img/kristofferson.jpg", "http://kriskristofferson.com", "Fr., 15.11.2021. 20:00", 58.50);


//Create an array of all object, before displaying them in HTML with a for of loop
let eventsArray: Array<Locations> = [church, zoo, thai, sixta, kravitz, kristofferson];

for (let value of eventsArray){
    (document.getElementById("output")as HTMLElement).innerHTML += value.display();
}