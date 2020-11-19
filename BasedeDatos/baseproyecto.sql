drop table if exists CATEGORIA;

drop table if exists PREGUNTA;

drop table if exists PUNTO;

drop table if exists RESPUESTA;

drop table if exists USUARIO;

create table CATEGORIA
(
   IDCATEGORIA          int not null,
   IDUSUARIO            varchar(50),
   NAMECATEGORIA        varchar(50) not null,
   primary key (IDCATEGORIA)
);

create table PREGUNTA
(
   IDPREGUNTA           int not null,
   IDUSUARIO            varchar(50),
   IDCATEGORIA          int,
   TITULO               varchar(255) not null,
   DESCRIPCIONPREGUNTA  text not null,
   ESTADO               bool not null,
   FECHACREACIONPREGUNTA datetime,
   primary key (IDPREGUNTA)
);

create table PUNTO
(
   IDPUNTO              int not null,
   IDUSUARIO            varchar(50),
   PUNTAJE              int not null,
   HISTORIAL            varchar(50),
   primary key (IDPUNTO)
);

create table RESPUESTA
(
   IDRESPUESTA          int not null,
   IDPREGUNTA           int,
   IDUSUARIO            varchar(50),
   DESCRIPCIONRESPUESTA text,
   ESTADORESPUESTA      bool not null,
   FECHACREACIONRESPUESTA1 datetime not null,
   primary key (IDRESPUESTA)
);

create table USUARIO
(
   IDUSUARIO            varchar(50) not null,
   NOMBRE               varchar(50) not null,
   APELLIDO             varchar(50) not null,
   FECHANACIMIENTO      datetime not null,
   CLAVE                varchar(60) not null,
   SEXO                 varchar(50) not null,
   EMAIL                varchar(255) not null,
   FOTO                 longblob,
   primary key (IDUSUARIO)
);

alter table CATEGORIA add constraint FK_USUARIO___CATEGORIA foreign key (IDUSUARIO)
      references USUARIO (IDUSUARIO) on delete restrict on update restrict;

alter table PREGUNTA add constraint FK_CATEGORIA___PREGUNTA foreign key (IDCATEGORIA)
      references CATEGORIA (IDCATEGORIA) on delete restrict on update restrict;

alter table PREGUNTA add constraint FK_USUARIO___PREGUNTA foreign key (IDUSUARIO)
      references USUARIO (IDUSUARIO) on delete restrict on update restrict;

alter table PUNTO add constraint FK_USUARIO___PUNTOS foreign key (IDUSUARIO)
      references USUARIO (IDUSUARIO) on delete restrict on update restrict;

alter table RESPUESTA add constraint FK_PREGUNTA___RESPUESTA foreign key (IDPREGUNTA)
      references PREGUNTA (IDPREGUNTA) on delete restrict on update restrict;

alter table RESPUESTA add constraint FK_USUARIO_RESPUESTA foreign key (IDUSUARIO)
      references USUARIO (IDUSUARIO) on delete restrict on update restrict;

