"use strict";
// ---------------------------------------- INSERT TEXT BEFORE THE BLOG ENTRIES
let section = document.createElement("section");
section.innerHTML = `
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
document.querySelector("main").prepend(section);
//---------------- LOCATIONS: defining a parent class
class Locations {
    constructor(name, street, zipCode, city, createdOn, img, website) {
        this.name = name;
        this.street = street;
        this.zipCode = zipCode;
        this.city = city;
        this.createdOn = createdOn;
        this.img = img;
        this.website = website;
    }
    //Splitting the card into two parts, then displying it entirely with the 3rd function
    displayTop() {
        return `
        <section class="card-group col-sm-12 col-md-6 col-lg-3 justify-content-center py-2 px-1 mx-auto">
        <div id="card_settings" class="card my-2">
            <img id="card_img" class="card-img-top rounded" src="${this.img}" alt="${this.name}">
            <div class="card-body">
                <h3 class="card-title rounded-3 text-center mb-3">${this.name}</h3>
                <p class="card-text">${this.street}<br>${this.zipCode} ${this.city}</p>`;
    }
    // format the dates
    convertDate(param) {
        return param.toLocaleString('de-AT', {
            hour12: false,
            timeZone: "Europe/Vienna",
            // date
            year: "numeric",
            month: "2-digit",
            day: "2-digit",
            // time
            hour: "numeric",
            minute: "numeric",
            second: "numeric"
        });
    }
    displayBottom() {
        return `
        </div> 
        <i class="card-footer"><small>Created on ${this.convertDate(this.createdOn)}
        </small></i> 
        </div>
        </section>
        `;
    }
    display() {
        return `${this.displayTop()} ${this.displayBottom()}`;
    }
}
//Objects from class Locations:
let church = new Locations("St. Charles Church", "Karlsplatz 1", 1010, "Vienna", new Date(2021, 10, 2, 10, 15, 43), "img/church.jpg");
let zoo = new Locations("Zoo Vienna", "Maxingstrasse 13b", 1130, "Wien", new Date(2015, 7, 31, 12, 30, 33), "img/zoo.jpg");
//---------------- RESTAURANTS: child class of Locations 
class Restaurants extends Locations {
    constructor(name, cuisine, street, zipCode, city, createdOn, img, website, phone) {
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
        `;
    }
}
// Objects from class Restaurants
let thai = new Restaurants("Lemon Leaf", "Thai Cuisine", "Kettenbrueckegasse 19", 1050, "Vienna", new Date(2019, 0, 1, 9, 0, 13), "img/thai_restaurant.png", "http://www.lemonleaf.at", "+43(1) 58 123 08");
let sixta = new Restaurants("Sixta", "Austrian Cuisine", "Schoenbrunner Strasse 21", 1050, "Wien", new Date(2020, 3, 22, 19, 15, 23), "img/sixta.png", "http://www.sixta-restaurant.at", "+43(1) 58 528 56 <br> +43(1) 58 528 56");
//---------------- EVENTS: child class of Locations
class Events extends Locations {
    constructor(name, street, zipCode, city, createdOn, img, website, eventDate, price) {
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
        <p class="text-end pt-4">Early bird tickets: <span class="fs-4 fw-bold">???${this.price}</p>
            </div>
            <i class="card-footer">Created on ${this.convertDate(this.createdOn)}</i>
        </div>
        </section>
        `;
    }
}
// Objects from the class Events 
let kravitz = new Events("Lenny Kravitz", "Wiener Stadthalle - Halle D <br> Roland Rainer Platz 12", 1150, "Wien", new Date(2020, 4, 24, 20, 15, 54), "img/kravitz.jpg", "https://www.lennykravitz.com", "Sat, 09.12.2029 - 19:30", 47.80);
let kristofferson = new Events("Kris Kristofferson", "Wiener Stadthalle, Halle F <br> Roland Rainer Platz 1", 1150, "Wien", new Date(2021, 8, 2, 23, 55, 58), "img/kristofferson.jpg", "http://kriskristofferson.com", "Fr., 15.11.2021. 20:00", 58.50);
//Create an array of all object, before displaying them in HTML with a for of loop
let eventsArray = [church, zoo, thai, sixta, kravitz, kristofferson];
for (let value of eventsArray) {
    document.getElementById("output").innerHTML += value.display();
}
// ---------------------------------------- SORTING BUTOTN
let sort_btn = document.getElementById("sort-btn");
// eventListener for sorting
sort_btn.addEventListener("change", () => {
    // empty the DOM from event cards
    document.getElementById("output").innerHTML = "";
    if (sort_btn.value === "A-Z") { // if option "A-Z" selected
        // sort array name property in ASCENDING order
        let arrayAZ = eventsArray.sort((a, b) => {
            if (a.name < b.name) {
                return -1;
            }
            else if (a.name > b.name) {
                return 1;
            }
            else {
                return 0;
            }
        });
        // loops through sorted array
        for (let event of arrayAZ) {
            document.getElementById("output").innerHTML += event.display();
        }
        // console.log(event)
        console.log("Order is set to Ascendant");
    }
    else if (sort_btn.value === "Z-A") { // if option "Z-A" selected
        // sort array name property in DESCENDING order
        let arrayZA = eventsArray.sort((a, b) => {
            if (a.name < b.name) {
                return 1;
            }
            else if (a.name > b.name) {
                return -1;
            }
            else {
                return 0;
            }
        });
        // loops through sorted array
        for (let value of arrayZA) {
            document.getElementById("output").innerHTML += value.display();
        }
        console.log("Order is set to Descendant");
    }
});
