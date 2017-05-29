
drop table users;

create table users(id int(5) not null primary key auto_increment,
user VARCHAR(25)not null,
pass VARCHAR(70)not null
);

desc users;

select * from users;

commit;
