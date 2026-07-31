create database if not exists task3;

use task3;

create table if not exists product(
    id int primary key auto_increment,
    receiving_Date date,
    tracking_Number varchar(255),
    product_name varchar(255),
    cbm varchar(100),
    weight varchar(100)
    );
    
    insert into product(receiving_Date,tracking_Number,product_name,cbm,weight)values 
    ('2027-11-7','RED45678','DogFood','5GP','3KG'),
    ('2026-07-20','FRD45678','DogFood','5GP','5KG');
    
    -- update product set product_name ='Food' where id=1;
    
    -- delete from product where id=2;
    
    -- alter table product drop column employees;
    
	-- alter table product add column employees varchar(100);
    
    -- alter table product modify weight varchar(50);
    
    -- alter table product change cbm cubic_meter varchar(100);

    -- select id,receiving_Date from product order by id desc; --asc
    
	-- drop table products;    


    