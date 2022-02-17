-- 1. What products are available?
SELECT * FROM products;

-- 2. How many payments are above 100?
SELECT COUNT(*) FROM payments
WHERE order_price > 100;

-- 3. What isi the total sum of all payments?
SELECT SUM(order_price) FROM payments;

-- 4. Where does each user live?
SELECT f_name, l_name, street, zip, city, country FROM users
JOIN locations ON users.fk_location_id = locations.location_id;

-- 5. What is the status of the regustered users on famazon?
SELECT status, s_name, f_name, l_name  FROM famazon
LEFT JOIN users ON famazon.fk_user_id = users.user_id
LEFT JOIN suppliers ON famazon.fk_s_id = suppliers.s_id;

-- 6. What products and for how much does each supplier sell?
SELECT s_name, prod_name, price FROM suppliers
JOIN products ON suppliers.s_id = products.fk_s_id;


-----------------------------
-- Two extra queries with joins
-----------------------------
-- 1. Who bought which products (sort by user_id in a descending order)?
SELECT l_name, f_name, prod_name, price, description FROM users
JOIN orders ON users.user_id = orders.fk_user_id
JOIN order_details ON orders.order_id = order_details.fk_order_id
JOIN products ON order_details.fk_prod_id = products.prod_id
ORDER BY users.user_id ASC;

-- 2. How many products have been paid with a Master Card?
SELECT COUNT(*) FROM products
JOIN order_details ON products.prod_id = order_details.fk_prod_id
JOIN orders ON order_details.fk_order_id = orders.order_id
JOIN payment_methods ON orders.order_id = payment_methods.fk_order_id
WHERE payment_methods.pm_name = "Master Card";