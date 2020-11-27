-- This is database code for final project with dump data

create database if not exists `Classroom`;
use `Classroom`;

create table if not exists `Profile` (
	`id` int(11) not null auto_increment,
    `name` nvarchar (50) not null,
    `address` nvarchar (255) not null,
    `phone` varchar (10) not null,
    `birth` date not null,
    `email` varchar (255) not null,
    `image` varchar (255) not null,
    primary key (`id`)
);

-- role have 3 types: 'admin', 'teacher', 'sudent'
create table if not exists `Account`(
	`id` int (11) not null auto_increment,
    `username` varchar (20) not null unique,
    `password` varchar (20) not null,
    `role` varchar (10) not null,
    `id_profile` int (11) not null,
    primary key (`id`),
    foreign key (`id_profile`) references `Profile`(`id`)
);

create table if not exists `Class` (
	`id` int(11) not null auto_increment,
    `name` nvarchar (255) not null,
    `code` varchar (8) not null,
    `image` varchar (255) not null,
    `id_teacher` int (11),
    primary key (`id`),
    foreign key (`id_teacher`) references `Account`(`id`)
);

create table if not exists `Joining` (
	`id_class` int (11) not null,
    `id_account` int (11) not null,
    `date` datetime,
    primary key (`id_class`, `id_account`),
    foreign key (`id_class`) references `Class` (`id`),
    foreign key (`id_account`) references `Account` (`id`)
);

create table if not exists `Status` (
	`id` int (11) not null auto_increment,
    `date` datetime not null,
    `description` nvarchar (255),
    `id_class` int (11) not null,
    `id_account` int (11) not null,
    primary key (`id`),
    foreign key (`id_class`) references `Class` (`id`),
    foreign key (`id_account`) references `Account` (`id`)
);

create table if not exists `Comment` (
	`id` int (11) not null auto_increment,
    `date` datetime,
    `description` nvarchar (255),
    `id_status` int (11) not null,
    `id_account` int (11) not null,
    primary key (`id`),
    foreign key (`id_status`) references `Status` (`id`),
    foreign key (`id_account`) references `Account` (`id`)
);

create table if not exists `Assignment` (
	`id` int (11) not null auto_increment,
    `date` datetime not null,
    `due` datetime not null,
    `description` nvarchar (255),
    `id_class` int (11) not null,
    primary key (`id`),
    foreign key (`id_class`) references `Class`(`id`)
);

create table if not exists `UploadFileAssignment` (
	`id` int (11) auto_increment,
    `target_dir` varchar (255) not null,
    `id_assignment` int (11) not null,
    primary key (`id`),
    foreign key (`id_assignment`) references `Assignment` (`id`)
);

create table if not exists `UploadFile` (
	`id` int (11) not null auto_increment,
    `target_dir` varchar (255) not null,
    `id_status` int (11) not null,
    primary key (`id`),
    foreign key (`id_status`) references `Status`(`id`)
);

create table if not exists `SubmitFile` (
	`id` int (11) not null auto_increment,
    `target_dir` varchar (255) not null,
    `id_account` int (11) not null,
    primary key (`id`),
    foreign key (`id_account`) references `Account` (`id`)
);

insert into `Profile` (`name`, `address`, `phone`, `birth`, `email`,`image`) 
	values (N'Quản Trị', N'Local', '0000000001', '2020-01-01','admin@local.com' ,'uploads/avatar/defalut.png');
    
insert into `Profile` (`name`, `address`, `phone`, `birth`, `email`, `image`) 
	values (N'Giáo Viên', N'Local', '0000000002', '2020-01-02', 'teacher@local.com','uploads/avatar/defalut.png');
    
insert into `Profile` (`name`, `address`, `phone`, `birth`, `email`,`image`) 
	values (N'Sinh Viên', N'Local', '0000000003', '2020-01-03','student@local.com' , 'uploads/avatar/defalut.png')    ;

insert into `Account` (`username`, `password`, `role`, `id_profile`) 
	values ('admin', 'roottest', 'admin', 1);
    
insert into `Account` (`username`, `password`, `role`, `id_profile`) 
	values ('teacher', 'roottest', 'teacher', 2);

insert into `Account` (`username`, `password`, `role`, `id_profile`) 
	values ('student', 'roottest', 'student', 3);
    
