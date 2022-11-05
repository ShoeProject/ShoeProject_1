create table product_categories(
    id VARCHAR(40) DEFAULT (uuid()) not null,
    name varchar(100),
    description text,
    created_date datetime,
    updated_date datetime,
    CONSTRAINT PK_product_categories PRIMARY KEY(id)
);
create table orders(
   id VARCHAR(40) DEFAULT (uuid()) not null,
   order_date datetime,
   order_time datetime, 
   CONSTRAINT PK_order PRIMARY KEY(id)
);

create table product_sub_categories(
    id VARCHAR(40) DEFAULT (uuid()) not null,
    name varchar(100),
    description text,
    created_date datetime,
    updated_date datetime,
    CONSTRAINT PK_Goods_receive_note PRIMARY KEY(id)
);

create table product(
    id VARCHAR(40) DEFAULT (uuid()) not null,
    name varchar(100),
    serial_no varchar(100),
    item_price decimal(28,2),
    item_color varchar(20),
    item_size INT,
    category_id varchar(40),
    sub_category_id varchar(40),
    created_date datetime,
    updated_date datetime,
    CONSTRAINT PK_Products PRIMARY KEY(id),
    CONSTRAINT FK_product_categories foreign key(category_id)
    references product_categories(id),
    CONSTRAINT FK_product_sub_categories foreign key(sub_category_id)
    references product_sub_categories(id)
);

create table news_And_Notification(
  id varchar(40) default (uuid()) not null,
  newsHeading varchar(300),
  newsBody varchar(300),
  CONSTRAINT PK_news_And_Notification PRIMARY KEY(id)
);

create table inquiry(
  id varchar(40) default (uuid()) not null,
  inquiry_subject varchar(200),
  inquiry varchar(200),
  CONSTRAINT PK_inquiry PRIMARY KEY(id)
);

create table feedback(
   id varchar(40) default (uuid()) not null,
   feedback varchar(200),
   CONSTRAINT PK_feedback PRIMARY KEY(id)
);

create table customer(
    id VARCHAR(40) DEFAULT (uuid()) not null,
    name varchar(100),
    address varchar(200),
    phone_no varchar(15),
    age smallint,
    created_date datetime,
    updated_date datetime,
    feedback_id varchar(20),
    order_id varchar(20),
    inquiry_id varchar(20),
    CONSTRAINT PK_Customer PRIMARY KEY(id),
    CONSTRAINT FK_feedback foreign key(feedback_id)
    references feedback(id),
    CONSTRAINT FK_inquiry foreign key(inquiry_id)
    references inquiry(id),
    CONSTRAINT FK_order foreign key(order_id)
    references orders(id)
);

create table employee(
    id VARCHAR(40) DEFAULT (uuid()) not null,
    name varchar(100),
    address varchar(200),
    phone_no varchar(15),
    age smallint,
    order_id varchar(),
    created_date datetime,
    updated_date datetime,
    CONSTRAINT PK_Employee PRIMARY KEY(id),
    CONSTRAINT FK_Employee foreign key(order_id)
    references orders(id)
);

create table employee_type(
  id VARCHAR(40) DEFAULT (uuid()) not null,
  designation varchar(40),
  CONSTRAINT PK_employee_type PRIMARY KEY(id)
);


create table cart(
    id varchar(40) default (uuid()) not null,
    created_date datetime,
    updated_date datetime,
    CONSTRAINT PK_Cart PRIMARY KEY(id)
);

create table file(
    id varchar(40) default (uuid()) not null,
    name varchar(100),
    url varchar(100),
    reference varchar(100),
    created_date datetime,
    updated_date datetime,
    CONSTRAINT PK_Goods_receive_note PRIMARY KEY(id)
);


