alter table product drop column serial_no;
alter table product add column code varchar(100);

alter table cart add column customer_id varchar(40);
alter table cart add column product_id varchar(40);

alter table cart add constraint cart_fk_1 FOREIGN KEY(customer_id)
REFERENCES customer(id);
alter table cart add constraint cart_fk_2 FOREIGN KEY(product_id)
REFERENCES product(id);

alter table orders add column customer_id varchar(40);
alter table orders add column product_id varchar(40);

alter table orders add constraint orders_fk_1 FOREIGN KEY(customer_id)
REFERENCES customer(id);
alter table orders add constraint orders_fk_2 FOREIGN KEY(product_id)
REFERENCES product(id);

drop table file;

alter table inquiry add COLUMN customer_id varchar(40);
alter table inquiry add constraint inquiry_fk_1 FOREIGN KEY(customer_id)
REFERENCES customer(id);

alter table product_sub_categories add COLUMN product_categories_id varchar(40);
alter table product_sub_categories add constraint product_categories_fk_1 FOREIGN KEY(product_categories_id)
REFERENCES product_sub_categories(id);

alter table feedback add COLUMN customer_id varchar(40);
alter table feedback add constraint feedback_fk_1 FOREIGN KEY(customer_id)
REFERENCES customer(id);

alter table employee add column type_id varchar(40);
alter table employee add constraint employee_fk_1 FOREIGN KEY(type_id)
REFERENCES employee_type(id);
