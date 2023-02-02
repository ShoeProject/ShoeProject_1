create table users(
    id varchar(40) NOT NULL DEFAULT uuid(),
    customer_id varchar(40),
    employee_id varchar(40),
    email varchar(40) not null,
    password varchar(15) not null    
);

alter table users add CONSTRAINT users_fk_1 FOREIGN KEY(customer_id) REFERENCES customer(id);
alter table users add CONSTRAINT users_fk_2 FOREIGN KEY(employee_id) REFERENCES employee(id);

alter table cart add column qty int;