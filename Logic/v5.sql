alter table customer DROP CONSTRAINT fk_order;
alter table customer drop column order_id;

alter table customer DROP CONSTRAINT fk_inquiry; 
alter table customer drop column inquiry_id;

alter table customer DROP CONSTRAINT fk_feedback; 
alter table customer drop column feedback_id;

alter TABLE users add constraint user_unique UNIQUE key(customer_id); 