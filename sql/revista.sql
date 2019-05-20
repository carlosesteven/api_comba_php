-- Table: public.revista

-- DROP TABLE public.revista;

CREATE TABLE public.revista
(
    rev_id integer NOT NULL DEFAULT nextval('revista_rev_id_seq'::regclass) ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    rev_serie text COLLATE pg_catalog."default",
    rev_nr text COLLATE pg_catalog."default",
    rev_area text COLLATE pg_catalog."default",
    rev_res text COLLATE pg_catalog."default",
    rev_url text COLLATE pg_catalog."default",
    rev_nom text COLLATE pg_catalog."default",
    rev_vol bigint,
    rev_idi text COLLATE pg_catalog."default",
    CONSTRAINT revista_pkey PRIMARY KEY (rev_id)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.revista
    OWNER to postgres;