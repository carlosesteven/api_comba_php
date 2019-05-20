-- Table: public.eventos

-- DROP TABLE public.eventos;

CREATE TABLE public.eventos
(
    eve_id integer NOT NULL DEFAULT nextval('evento_eve_id_seq'::regclass) ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    eve_pais_des text COLLATE pg_catalog."default",
    eve_pais_ori text COLLATE pg_catalog."default",
    eve_tip_mov text COLLATE pg_catalog."default",
    eve_val_apr bigint,
    eve_ent_ori text COLLATE pg_catalog."default",
    eve_ent_des text COLLATE pg_catalog."default",
    eve_tip_ben text COLLATE pg_catalog."default",
    eve_anio text COLLATE pg_catalog."default",
    eve_imp text COLLATE pg_catalog."default",
    eve_obj text COLLATE pg_catalog."default",
    eve_fec_ini text COLLATE pg_catalog."default",
    eve_fec_fin text COLLATE pg_catalog."default",
    CONSTRAINT evento_pkey PRIMARY KEY (eve_id)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.eventos
    OWNER to postgres;