select 'Создаем и заполняем таблицы ролей и статусов заказов';

-- create roles table
create table roles (
    id SERIAL PRIMARY KEY,
    name VARCHAR(64) NOT NULL UNIQUE
);

-- create statuses table
create table statuses (
    id SERIAL PRIMARY KEY,
    name VARCHAR(64) NOT NULL UNIQUE
);


-- fill roles table
insert into roles (name) values ('admin');
insert into roles (name) values ('user');
insert into roles (name) values ('manager');
insert into roles (name) values ('courier');

-- fill statuses table
insert into statuses (name) values ('Не подтвержден');
insert into statuses (name) values ('Подтвержден');
insert into statuses (name) values ('Доставка');
insert into statuses (name) values ('Доставлен');