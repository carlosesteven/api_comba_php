-- Table: public.facultad

-- DROP TABLE public.facultad;

CREATE TABLE public.facultad
(
    fac_id integer NOT NULL DEFAULT nextval('facultad_fac_id_seq'::regclass) ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    fac_pro text COLLATE pg_catalog."default",
    CONSTRAINT facultad_pkey PRIMARY KEY (fac_id)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.facultad
    OWNER to postgres;