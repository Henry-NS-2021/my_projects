// create calculateInvoice() function for one customer
function calculateInvoice(starterPrice, maindishPrice, dessertPrice, beveragePrice){
    let bill = starterPrice + maindishPrice + dessertPrice + beveragePrice;
    return "€" + bill;
}
calculateInvoice(3, 20, 36, 5);


// same function with the prices from my website
function calculateInvoice(a, b, c, d){
    let bill = a + b + c + d;
    return "€" + bill;
}
let tartare = 6.25;
let sushi = 17.95;
let syrniki = 6.5;
let fresh_juice = 3.95;
console.log(calculateInvoice(tartare, sushi, syrniki, fresh_juice));


/*  - calculate 3 invoices 
    - different dish combination 
    - 1 dish per category */

// 1st calculation
function calculateInvoice(jiaozi, pizza, cheesecake, beer){
    let bill = jiaozi + pizza + cheesecake + beer;
    console.log("€" + bill);
}
calculateInvoice(5.25, 16.5, 5.5, 6.25);

// 2nd calculation
function calculateInvoice(onionRings, burger, cremeBrulee, freshJuice){
    let bill = onionRings + burger + cremeBrulee + freshJuice;
    console.log("€" + bill);
}
calculateInvoice(4.95, 15.5, 6.0, 3.95);
    
// 3rd calculation
function calculateInvoice(olivier, plov, kaiserschmarren, tea){
    let bill = olivier + plov + kaiserschmarren + tea;
    console.log("€" + bill);
}
calculateInvoice(4.85, 24.95, 8.5, 4.25);

// BONUS_JS, arrow function:
let studentInvoice = (starter, mainCourse, dessert, beverage) => {
    let discount = (starter + mainCourse + dessert)*(1 - 0.1);
    let bill = discount + beverage;
    return "€" + bill;
}
//--- TO DO: print three different examples
console.log(studentInvoice(5.25, 16.5, 5.5, 6.25));
console.log(studentInvoice(4.95, 15.5, 6.0, 3.95));
console.log(studentInvoice(4.85, 24.95, 8.5, 4.25));
