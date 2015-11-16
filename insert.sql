create table crystal(
	id serial,
	content varchar not null,
	question varchar not null,
	primary key(id)
);

insert into crystal (content,question) values('足に関する診断', '足の指の長さはどれくらい？');
insert into crystal (content,question) values('手に関する診断', '手の形はどれが当てはまる？');
insert into crystal (content, question) values('手の指に関する診断', '指の長さはどれくらい？');
insert into crystal (content, question) values('腕に関する診断', '腕を組んだときどのタイプ？');

create table choices(
	id serial,
	choice varchar not null,
	answer varchar not null,
	q_id int references crystal(id),
	primary key(id)
);

insert into choices (choice, answer, q_id) values('1cm', '短い', 1);
insert into choices (choice, answer, q_id) values('3cm', '普通', 1);
insert into choices (choice, answer, q_id) values('5cm', '長い', 1);