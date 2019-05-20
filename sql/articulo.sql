-- Table: public.articulo

-- DROP TABLE public.articulo;

CREATE TABLE public.articulo
(
    art_id integer NOT NULL DEFAULT nextval('articulo_art_id_seq'::regclass) ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    art_issn text COLLATE pg_catalog."default",
    art_doi text COLLATE pg_catalog."default",
    art_ind text COLLATE pg_catalog."default",
    art_idi text COLLATE pg_catalog."default",
    art_area text COLLATE pg_catalog."default",
    art_tit text COLLATE pg_catalog."default",
    art_pre_anio bigint,
    art_pre_mes bigint,
    art_pag_ini bigint,
    art_pag_fin bigint,
    art_urt text COLLATE pg_catalog."default",
    CONSTRAINT articulo_pkey PRIMARY KEY (art_id)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.articulo
    OWNER to postgres;