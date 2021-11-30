-- *********************************************
-- * Standard SQL generation                   
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec  4 2018              
-- * Generation date: Tue Nov 30 14:43:13 2021 
-- * LUN file: C:\Users\Utente\OneDrive\Desktop\Università\tecnologie_web\progetto\E-R\db-tecweb.lun 
-- * Schema: db-sito/SQL 
-- ********************************************* 


-- Database Section
-- ________________ 

create database db-sito;


-- DBSpace Section
-- _______________


-- Tables Section
-- _____________ 

create table Carrello (
     CodiceCarrello char(5) not null,
     IdUtente char(1) not null,
     NumeroProdotti char(1) not null,
     TotaleProvvisorio char(1) not null,
     constraint ID_Carrello_ID primary key (CodiceCarrello),
     constraint SID_Carre_Utent_ID unique (IdUtente));

create table Carta (
     Numero varchar(16) not null,
     Scadenza date not null,
     Codice varchar(3) not null,
     Titolare varchar(50) not null,
     IdUtente char(5) not null,
     constraint ID_Carta_ID primary key (Numero));

create table Categoria (
     NomeCategoria char(30) not null,
     constraint ID_Categoria_ID primary key (NomeCategoria));

create table composizioneOrdine (
     NumeroOrdine char(10) not null,
     CodiceProdotto char(5) not null,
     quantita numeric(3) not null,
     constraint ID_composizioneOrdine_ID primary key (CodiceProdotto, NumeroOrdine));

create table Indirizzo (
     Via varchar(20) not null,
     NumeroCivico char(3) not null,
     Citta varchar(10) not null,
     CAP varchar(5) not null,
     IdUtente char(5) not null);

create table inserimentoCarrello (
     CodiceCarrello char(5) not null,
     CodiceProdotto char(5) not null,
     quantita numeric(3) not null,
     constraint ID_inserimentoCarrello_ID primary key (CodiceCarrello, CodiceProdotto));

create table Ordine (
     NumeroOrdine char(10) not null,
     IndirizzoSpedizione varchar(50) not null,
     IndirizzoFatturazione varchar(50) not null,
     DataElaborazione date not null,
     DataSpedizione date not null,
     MetodoPagamento varchar(20) not null,
     PrezzoTotale numeric(5,2) not null,
     Stato varchar(30) not null,
     IdUtente char(5) not null,
     constraint ID_Ordine_ID primary key (NumeroOrdine));

create table Prodotto (
     CodiceProdotto char(5) not null,
     Disponibilita numeric(3) not null,
     Descrizione varchar(30) not null,
     Prezzo numeric(5,2) not null,
     NomeCategoria char(30) not null,
     IdUtente char(5) not null,
     constraint ID_Prodotto_ID primary key (CodiceProdotto));

create table Utente (
     Nome varchar(20) not null,
     Cognome varchar(20) not null,
     IdUtente char(5) not null,
     Password varchar(20) not null,
     NumeroDiTelefono varchar(50) not null,
     E_mail varchar(50) not null,
     Partita_IVA varchar(11),
     constraint ID_Utente_ID primary key (IdUtente));


-- Constraints Section
-- ___________________ 

alter table Carrello add constraint ID_Carrello_CHK
     check(exists(select * from inserimentoCarrello
                  where inserimentoCarrello.CodiceCarrello = CodiceCarrello)); 

alter table Carrello add constraint SID_Carre_Utent_FK
     foreign key (IdUtente)
     references Utente;

alter table Carta add constraint REF_Carta_Utent_FK
     foreign key (IdUtente)
     references Utente;

alter table Categoria add constraint ID_Categoria_CHK
     check(exists(select * from Prodotto
                  where Prodotto.NomeCategoria = NomeCategoria)); 

alter table composizioneOrdine add constraint EQU_compo_Prodo
     foreign key (CodiceProdotto)
     references Prodotto;

alter table composizioneOrdine add constraint EQU_compo_Ordin_FK
     foreign key (NumeroOrdine)
     references Ordine;

alter table Indirizzo add constraint EQU_Indir_Utent_FK
     foreign key (IdUtente)
     references Utente;

alter table inserimentoCarrello add constraint EQU_inser_Prodo_FK
     foreign key (CodiceProdotto)
     references Prodotto;

alter table inserimentoCarrello add constraint EQU_inser_Carre
     foreign key (CodiceCarrello)
     references Carrello;

alter table Ordine add constraint ID_Ordine_CHK
     check(exists(select * from composizioneOrdine
                  where composizioneOrdine.NumeroOrdine = NumeroOrdine)); 

alter table Ordine add constraint REF_Ordin_Utent_FK
     foreign key (IdUtente)
     references Utente;

alter table Prodotto add constraint ID_Prodotto_CHK
     check(exists(select * from inserimentoCarrello
                  where inserimentoCarrello.CodiceProdotto = CodiceProdotto)); 

alter table Prodotto add constraint ID_Prodotto_CHK
     check(exists(select * from composizioneOrdine
                  where composizioneOrdine.CodiceProdotto = CodiceProdotto)); 

alter table Prodotto add constraint EQU_Prodo_Categ_FK
     foreign key (NomeCategoria)
     references Categoria;

alter table Prodotto add constraint REF_Prodo_Utent_FK
     foreign key (IdUtente)
     references Utente;

alter table Utente add constraint ID_Utente_CHK
     check(exists(select * from Carrello
                  where Carrello.IdUtente = IdUtente)); 

alter table Utente add constraint ID_Utente_CHK
     check(exists(select * from Indirizzo
                  where Indirizzo.IdUtente = IdUtente)); 


-- Index Section
-- _____________ 

create unique index ID_Carrello_IND
     on Carrello (CodiceCarrello);

create unique index SID_Carre_Utent_IND
     on Carrello (IdUtente);

create unique index ID_Carta_IND
     on Carta (Numero);

create index REF_Carta_Utent_IND
     on Carta (IdUtente);

create unique index ID_Categoria_IND
     on Categoria (NomeCategoria);

create unique index ID_composizioneOrdine_IND
     on composizioneOrdine (CodiceProdotto, NumeroOrdine);

create index EQU_compo_Ordin_IND
     on composizioneOrdine (NumeroOrdine);

create index EQU_Indir_Utent_IND
     on Indirizzo (IdUtente);

create unique index ID_inserimentoCarrello_IND
     on inserimentoCarrello (CodiceCarrello, CodiceProdotto);

create index EQU_inser_Prodo_IND
     on inserimentoCarrello (CodiceProdotto);

create unique index ID_Ordine_IND
     on Ordine (NumeroOrdine);

create index REF_Ordin_Utent_IND
     on Ordine (IdUtente);

create unique index ID_Prodotto_IND
     on Prodotto (CodiceProdotto);

create index EQU_Prodo_Categ_IND
     on Prodotto (NomeCategoria);

create index REF_Prodo_Utent_IND
     on Prodotto (IdUtente);

create unique index ID_Utente_IND
     on Utente (IdUtente);

