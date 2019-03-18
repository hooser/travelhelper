create table `person`
(
    `id` integer not null,
	`name` varchar(20) not null,
	`passwd` varchar(20) not null,
	`isadmin` integer,
	constraint pk_id primary key (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ---------------------
insert into person values(1,'root','1122',1);
insert into person values(2,'hsj','1122',0);
insert into person values(3,'xxc','1122',0);
insert into person values(4,'fzp','1122',0);

-- ---------------------
create table `place`
(
    `id` integer not null,
    `name` varchar(20) COLLATE utf8_unicode_ci not null,
	`core` float not null,
	`overview` varchar(150) COLLATE utf8_unicode_ci,
	constraint pk_id primary key (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ---------------------

-- ---------------------
create table `photo`
(
    `id` integer not null,
	`name` varchar(20) COLLATE utf8_unicode_ci not null,
	`kind` varchar(20) COLLATE utf8_unicode_ci not null,
	`p_id` integer,
	`u_id` integer,
	constraint pk_id primary key (id),
	constraint fk_pid1 foreign key (p_id) references person(id),
	constraint fk_uid1 foreign key (u_id) references place(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table `diary`
(
    `id` integer not null AUTO_INCREMENT,
	`name` varchar(20) COLLATE utf8_unicode_ci not null,
    `kind` varchar(20) COLLATE utf8_unicode_ci not null,
	`p_id` integer,
	`u_id` integer,
	constraint pk_id primary key (id),
	constraint fk_pid2 foreign key (p_id) references person(id),
	constraint fk_uid2 foreign key (u_id) references place(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table `mark`
(
    `p_name` varchar(20) not null,
	`p_id` integer not null,
	`grade` float,
	`num` integer,
	constraint fk_pid3 foreign key (p_id) references place(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table `makemark`
(
	`u_id` integer not null,
	`u_name` varchar(20) not null,
	`p_id` integer not null,
    `p_name` varchar(20) not null,
    `score` float not null	

)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
  
  
  
  
  
  