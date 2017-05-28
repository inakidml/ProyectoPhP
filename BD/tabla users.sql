select * from blog.comentario;
select * from blog.entrada;

drop table users;

create table users(id int(5) not null primary key auto_increment,
user VARCHAR(25)not null,
pass VARCHAR(70)not null
);

desc users;

insert into blog.users values(0,'admin', '000000');

select * from users;
delete from users where id=2;
commit;

ALTER TABLE users
MODIFY COLUMN pass varchar(70); 